<?php

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();

// Twig as template engine
$container['view'] = function ($container)
{
    $view = new \Slim\Views\Twig('../app/views', [
        'cache' => false
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));
};

$app->get("/", function ($request, $response, $args)
{
    return $this->view->render($response, 'main.twig', [
        
    ]);

})->setName('home');

$app->run();

?>
