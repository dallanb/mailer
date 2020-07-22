<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
    ],
]);

require __DIR__ . '/src/config/dependencies.php';

require __DIR__ . '/src/routes/ping.php';

$app->run();
