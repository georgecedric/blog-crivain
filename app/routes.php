<?php

use Symfony\Component\HttpFoundation\Request;
use BlogJF\Domain\Comment;
use BlogJF\Domain\Article;
use BlogJF\Domain\Reply;
use BlogJF\Domain\User;
use BlogJF\Form\Type\CommentType;
use BlogJF\Form\Type\replyType;
use BlogJF\Form\Type\ArticleType;
use BlogJF\Form\Type\UserType;

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('index.html.twig', array('articles' => $articles));
})->bind('home');


// Article details with comments

$app->match('/article/{id}', function ($id, Request $request) use ($app) {
    $article = $app['dao.article']->find($id);
    

        
        $comment = new Comment();
        $comment->setArticle($article);
        $reply = null;
    
    if(isset($_POST['valider'])){
        $app->match('/comment/{commentid}', function ($id, Request $request) use ($app) {
    $comment = $app['dao.comment']->find($id);
    
    

        $reply = new Reply();
        $reply->setComment($comment);

       $commentForm = $app['form.factory']->create(CommentType::class, $reply);
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $app['dao.reply']->save($reply);
            
        }
        $commentFormView = $commentForm->createView();
  
    $replies = $app['dao.reply']->findAllByComment($id);
    
    
    
    
    return $app['twig']->render('reply.html.twig', array(
        'comment' => $comment,
        'replies' => $replies,
        'commentForm' => $commentFormView));
    })->bind('reply');
    
}

        $commentForm = $app['form.factory']->create(CommentType::class, $comment);
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $app['dao.comment']->save($comment);
            $app['session']->getFlashBag()->add('success', 'Your comment was successfully added.');
            
        }
        $commentFormView = $commentForm->createView();
        $comments = $app['dao.comment']->findAllByArticle($id);

        
    
    
    return $app['twig']->render('article.html.twig', array(
        'article' => $article, 
        'comments' => $comments,
        'commentForm' => $commentFormView));
})->bind('article');;




// comment details with replies

$app->match('/comment/{id}', function ($id, Request $request) use ($app) {
    $comment = $app['dao.comment']->find($id);
    
    

        $reply = new Reply();
        $reply->setComment($comment);

       $commentForm = $app['form.factory']->create(CommentType::class, $reply);
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $app['dao.reply']->save($reply);
            
        }
        $commentFormView = $commentForm->createView();
  
    $replies = $app['dao.reply']->findAllByComment($id);
    
    
    
    
    return $app['twig']->render('reply.html.twig', array(
        'comment' => $comment,
        'replies' => $replies,
        'commentForm' => $commentFormView));
    })->bind('reply');;



// presentation
$app->get('/intro', function () use ($app) {
    return $app['twig']->render('introduce.html.twig');
})->bind('intro');

// contact
$app->get('/contact', function () use ($app) {
    return $app['twig']->render('contact.html.twig');
})->bind('contact');


// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');


// Admin home page
$app->get('/admin', function() use ($app) {
    $articles = $app['dao.article']->findAll();
    $comments = $app['dao.comment']->findAll();
    $users = $app['dao.user']->findAll();
    $replies =$app['dao.reply']->findAll();
    return $app['twig']->render('admin.html.twig', array(
        'articles' => $articles,
        'comments' => $comments,
        'users' => $users,
        'replies' => $replies));
})->bind('admin');

// Add a new article
$app->match('/admin/article/add', function(Request $request) use ($app) {
    $article = new Article();
    $articleForm = $app['form.factory']->create(ArticleType::class, $article);
    $articleForm->handleRequest($request);
    if ($articleForm->isSubmitted() && $articleForm->isValid()) {
        $app['dao.article']->save($article);
        $app['session']->getFlashBag()->add('success', 'The article was successfully created.');
    }
    return $app['twig']->render('article_form.html.twig', array(
        'title' => 'New article',
        'articleForm' => $articleForm->createView()));
})->bind('admin_article_add');

// Edit an existing article
$app->match('/admin/article/{id}/edit', function($id, Request $request) use ($app) {
    $article = $app['dao.article']->find($id);
    $articleForm = $app['form.factory']->create(ArticleType::class, $article);
    $articleForm->handleRequest($request);
    if ($articleForm->isSubmitted() && $articleForm->isValid()) {
        $app['dao.article']->save($article);
        $app['session']->getFlashBag()->add('success', 'The article was successfully updated.');
    }
    return $app['twig']->render('article_form.html.twig', array(
        'title' => 'Edit article',
        'articleForm' => $articleForm->createView()));
})->bind('admin_article_edit');

// Remove an article
$app->get('/admin/article/{id}/delete', function($id, Request $request) use ($app) {
    // Delete all associated comments
    $app['dao.comment']->deleteAllByArticle($id);
    // Delete the article
    $app['dao.article']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The article was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_article_delete');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', function($id, Request $request) use ($app) {
    $comment = $app['dao.comment']->find($id);
    $commentForm = $app['form.factory']->create(CommentType::class, $comment);
    $commentForm->handleRequest($request);
    if ($commentForm->isSubmitted() && $commentForm->isValid()) {
        $app['dao.comment']->save($comment);
        $app['session']->getFlashBag()->add('success', 'The comment was successfully updated.');
    }
    return $app['twig']->render('comment_form.html.twig', array(
        'title' => 'Edit comment',
        'commentForm' => $commentForm->createView()));
})->bind('admin_comment_edit');

// Remove a comment
$app->get('/admin/comment/{id}/delete', function($id, Request $request) use ($app) {
    $app['dao.comment']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The comment was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_comment_delete');


// Add a user
$app->match('/admin/user/add', function(Request $request) use ($app) {
    $user = new User();
    $userForm = $app['form.factory']->create(UserType::class, $user);
    $userForm->handleRequest($request);
    if ($userForm->isSubmitted() && $userForm->isValid()) {
        // generate a random salt value
        $salt = substr(md5(time()), 0, 23);
        $user->setSalt($salt);
        $plainPassword = $user->getPassword();
        // find the default encoder
        $encoder = $app['security.encoder.bcrypt'];
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());
        $user->setPassword($password); 
        $app['dao.user']->save($user);
        $app['session']->getFlashBag()->add('success', 'The user was successfully created.');
    }
    return $app['twig']->render('user_form.html.twig', array(
        'title' => 'New user',
        'userForm' => $userForm->createView()));
})->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', function($id, Request $request) use ($app) {
    $user = $app['dao.user']->find($id);
    $userForm = $app['form.factory']->create(UserType::class, $user);
    $userForm->handleRequest($request);
    if ($userForm->isSubmitted() && $userForm->isValid()) {
        $plainPassword = $user->getPassword();
        // find the encoder for the user
        $encoder = $app['security.encoder_factory']->getEncoder($user);
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());
        $user->setPassword($password); 
        $app['dao.user']->save($user);
        $app['session']->getFlashBag()->add('success', 'The user was successfully updated.');
    }
    return $app['twig']->render('user_form.html.twig', array(
        'title' => 'Edit user',
        'userForm' => $userForm->createView()));
})->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', function($id, Request $request) use ($app) {
    // Delete all associated comments
    $app['dao.comment']->deleteAllByUser($id);
    // Delete the user
    $app['dao.user']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The user was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_user_delete');


// Edit an existing reply
$app->match('/admin/reply/{id}/edit', function($id, Request $request) use ($app) {
    $reply = $app['dao.reply']->find($id);
    $replyForm = $app['form.factory']->create(ReplyType::class, $reply);
    $replyForm->handleRequest($request);
    if ($replyForm->isSubmitted() && $replyForm->isValid()) {
        $app['dao.reply']->save($reply);
        $app['session']->getFlashBag()->add('success', 'The comment was successfully updated.');
    }
    return $app['twig']->render('reply_form.html.twig', array(
        'title' => 'Edit reply',
        'replyForm' => $replyForm->createView()));
})->bind('admin_reply_edit');

// Remove a reply
$app->get('/admin/reply/{id}/delete', function($id, Request $request) use ($app) {
    $app['dao.reply']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The comment was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_reply_delete');