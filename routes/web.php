<?php

$routes = [
    // this is where our routes will go

    // route to homepage (default)
    'homepage' => [
        'controller' => 'blackjackController', 
        'action' => 'index'
    ],

    'play' => [
        'controller' => 'blackjackController', 
        'action' => 'play'
    ],

    // route to games list
    'games' => [
        'controller' => 'gamesController', 
        'action' => 'listing'
    ]
];