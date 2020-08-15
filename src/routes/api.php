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

$app->post('/send', function (Request $request, Response $response) {
    $this->logger->addInfo('send');

    $body = $request->getParsedBody();
    $val = json_decode($body['data']);

    if (!$val->to || !$val->subject || !$val->html) {
        $this->logger->addError('missing required field');
        return $response->withJson(
            [
                'msg' => 'Bad Request',
                'data' => false,
            ],
            400
        );
    }

    Mailer::send($val->to, $val->to, $val->subject, $val->html, $val->text);

    return $response->withJson(
        [
            'msg' => 'OK',
            'data' => false,
        ],
        200
    );
});
