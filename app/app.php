<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();
// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app['twig'] = $app->extend('twig', function(Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    return $twig;
});
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => function () use ($app) {
                return new BlogJF\DAO\UserDAO($app['db']);
            },
        ),
    ),
    'security.role_hierarchy' => array(
        'ROLE_ADMIN' => array('ROLE_USER'),
    ),
    'security.access_rules' => array(
        array('^/admin', 'ROLE_ADMIN'),
    ),
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../var/logs/blogJF.log',
    'monolog.name' => 'BlogJF',
    'monolog.level' => $app['monolog.level']
));

// Register services
$app['dao.article'] = function ($app) {
    return new BlogJF\DAO\ArticleDAO($app['db']);
};
$app['dao.user'] = function ($app) {
    return new BlogJF\DAO\UserDAO($app['db']);
};

$app['dao.contact'] = function ($app) {
    return new BlogJF\DAO\ContactDAO($app['db']);
};

$app['dao.news'] = function ($app) {
    return new BlogJF\DAO\NewsletterDAO($app['db']);
};



$app['dao.comment'] = function ($app) {
    $commentDAO = new BlogJF\DAO\CommentDAO($app['db']);
    $commentDAO->setArticleDAO($app['dao.article']);
    $commentDAO->setUserDAO($app['dao.user']);
    
    return $commentDAO;
};

$app['dao.reply'] = function ($app) {
    $replyDAO = new BlogJF\DAO\ReplyDAO($app['db']);
    $replyDAO->setArticleDAO($app['dao.article']);
    $replyDAO->setUserDAO($app['dao.user']);
    $replyDAO->setCommentDAO($app['dao.comment']);
    return $replyDAO;
};


// Register error handler
$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    switch ($code) {
        case 403:
            $message = 'Access denied.';
            break;
        case 404:
            $message = 'The requested resource could not be found.';
            break;
        default:
            $message = "Something went wrong.";
    }
    return $app['twig']->render('error.html.twig', array('message' => $message));
});


