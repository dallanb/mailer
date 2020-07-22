<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/ping', function (Request $request, Response $response) {
    $this->logger->addInfo('ping');

    return $response->withJson(
        [
            'msg' => 'OK',
            'data' => [
                'message' => 'pong',
            ],
        ],
        200
    );
});
