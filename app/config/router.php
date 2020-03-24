<?php

$router = $di->getRouter();

// Define your routes here

$router->add(
    '/index/index',
    [
        'controller' => 'index',
        'action'     => 'index',
    ]
);

$router->add(
    '/index/start',
    [
        'controller' => 'index',
        'action'     => 'start',
    ]
);

$router->add(
    '/index/stop',
    [
        'controller' => 'index',
        'action'     => 'stop',
    ]
);

$router->handle();