<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    $twig->addGlobal('sitename', 'Gazoo');
    return $twig;
}));

$app->get('/', function() use ($app) {
    return $app['twig']->render('index.twig');
});

$app->run();
