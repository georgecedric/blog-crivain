<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1'
));


// Register services
$app['dao.article'] = function ($app) {
    return new BlogJF\DAO\ArticleDAO($app['db']);
};
$app['dao.user'] = function ($app) {
    return new BlogJF\DAO\UserDAO($app['db']);
};


$app['dao.comment'] = function ($app) {
    $commentDAO = new BlogJF\DAO\CommentDAO($app['db']);
    $commentDAO->setArticleDAO($app['dao.article']);
    $commentDAO->setUserDAO($app['dao.user']);
    
    return $commentDAO;
};

$app['dao.reponse'] = function ($app) {
    $reponseDAO = new BlogJF\DAO\ReponseDAO($app['db']);
    $reponseDAO->setUserDAO($app['dao.user']);
    $reponseDAO->setCommentDAO($app['dao.comment']);
    return $reponseDAO;
};