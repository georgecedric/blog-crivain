<?php

use Symfony\Component\HttpFoundation\Request;
use BlogJF\Domain\Comment;
use BlogJF\Form\Type\CommentType;

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('index.html.twig', array('articles' => $articles));
})->bind('home');

// Article details with comments
$app->get('/article/{id}', function ($id) use ($app) {
    $article = $app['dao.article']->find($id);
    $comments = $app['dao.comment']->findAllByArticle($id);
    return $app['twig']->render('article.html.twig', array('article' => $article, 'comments' => $comments ));
})->bind('article');;


// presentation
$app->get('/intro', function () use ($app) {
    return $app['twig']->render('introduce.html.twig');
})->bind('intro');

// contact
$app->get('/contact', function () use ($app) {
    return $app['twig']->render('contact.html.twig');
})->bind('contact');

