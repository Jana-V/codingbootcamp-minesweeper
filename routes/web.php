<?php

$routes = [
    // this is where our routes will go

    // route to homepage
    'homepage' => [
        'controller' => 'indexController', 
        'action' => 'index'
    ],

    // route to games list
    'games' => [
        'controller' => 'gamesController', 
        'action' => 'listing'
    ]
];