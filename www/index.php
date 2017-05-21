<?php

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();

// Twig as template engine
$container['view'] = function ($c)
{
    $view = new \Slim\Views\Twig('../app/views', [
        'cache' => false
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $view;
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c)
{
    return function ($request, $response) use ($c) {
        return $c['view']->render($response, '404.twig', [
        ]);
    };
};

$app->get("/", function ($request, $response, $args)
{
    return $this->view->render($response, 'home.twig', []);

})->setName('home');

$app->get("/contact", function ($request, $response, $args)
{
    return $this->view->render($response, 'contact.twig', []);

})->setName('contact');

$app->get("/faq" , function ($request, $response, $args)
{
    return $this->view->render($response, 'faq.twig', []);
})->setName('faq');

$app->run();

?>
