<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config['displayErrorDetails'] = true; # display errors in dev
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(['settings' => $config]);

# dependency injection container used to load dependencies for the app
$container = $app->getContainer();

# configure logging
$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/tapir.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

$app->get('/ping', function (
    Request $request,
    Response $response,
    array $args
) {
    $this->logger->addInfo('ping');
    $data = ['name' => 'Rob', 'age' => 40];
    return $response->withJson(
        ['msg' => 'OK', 'data' => ['message' => 'pong']],
        200
    );
});
$app->run();
