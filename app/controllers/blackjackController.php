<?php

namespace app\controllers;

use \codingbootcamp\tinymvc\request;
use \codingbootcamp\tinymvc\view;
use theleftovers\blackjack\game;
use theleftovers\blackjack\database;

class blackjackController
{
    public function index()
    {
        if($_POST) // if the form was submitted
        {
            $game = new game();
            $game->generateDeck();
            $game->shuffleDeck();
            $json = $game->toJson();

            // create a new game
            database::query("
                INSERT
                INTO `games`
                (`started_at`, `data`)
                VALUES
                (NOW(), ?)
            ", [$json]);

        }

        // form to start new game
        $new_game_form = new view('blackjack/new_game_form');

        $list_of_games = new view('blackjack/list_of_games');
        $statement = database::query("
            SELECT *
            FROM `games`
            WHERE `games`.`finished_at` IS NULL
            ORDER BY `games`.`started_at` DESC
        ");
        $games = $statement->fetchAll();
        $list_of_games->games = $games;
        
        // the document
        $document = new view('document');
        $document->content = $new_game_form;
        $document->list_of_games = $list_of_games;

        return $document;
    }

    public function play()
    {
        $game_id = request::get('id', null);

        $statement = database::query("
            SELECT *
            FROM `games`
            WHERE `games`.`id` = ?
            LIMIT 0, 1
        ", [$game_id]);

        $game_array = $statement->fetch();

        //var_dump($game_array);

        $game = new game();
        $game->fromJson($game_array['data']);
        
        $game->displayDeck();
    }

    public function test()
    {
        // try everything here

        $game = new game();

        // generating the deck
        //$game->generateDeck();

        // shuffling the deck
        //$game->shuffleDeck();

        $json = '{"deck":[{"suit":"spades","value":"4","blackjack_value":4},{"suit":"clubs","value":"10","blackjack_value":10},{"suit":"diamonds","value":"4","blackjack_value":4},{"suit":"clubs","value":"A","blackjack_value":11},{"suit":"diamonds","value":"Q","blackjack_value":10},{"suit":"hearts","value":"J","blackjack_value":10},{"suit":"diamonds","value":"5","blackjack_value":5},{"suit":"spades","value":"K","blackjack_value":10},{"suit":"clubs","value":"7","blackjack_value":7},{"suit":"hearts","value":"9","blackjack_value":9},{"suit":"spades","value":"7","blackjack_value":7},{"suit":"spades","value":"Q","blackjack_value":10},{"suit":"diamonds","value":"6","blackjack_value":6},{"suit":"hearts","value":"6","blackjack_value":6},{"suit":"clubs","value":"3","blackjack_value":3},{"suit":"clubs","value":"Q","blackjack_value":10},{"suit":"clubs","value":"9","blackjack_value":9},{"suit":"diamonds","value":"3","blackjack_value":3},{"suit":"spades","value":"A","blackjack_value":11},{"suit":"spades","value":"10","blackjack_value":10},{"suit":"spades","value":"5","blackjack_value":5},{"suit":"hearts","value":"4","blackjack_value":4},{"suit":"diamonds","value":"J","blackjack_value":10},{"suit":"spades","value":"8","blackjack_value":8},{"suit":"hearts","value":"3","blackjack_value":3},{"suit":"spades","value":"9","blackjack_value":9},{"suit":"spades","value":"3","blackjack_value":3},{"suit":"hearts","value":"10","blackjack_value":10},{"suit":"diamonds","value":"8","blackjack_value":8},{"suit":"diamonds","value":"10","blackjack_value":10},{"suit":"hearts","value":"2","blackjack_value":2},{"suit":"clubs","value":"2","blackjack_value":2},{"suit":"clubs","value":"J","blackjack_value":10},{"suit":"hearts","value":"Q","blackjack_value":10},{"suit":"diamonds","value":"K","blackjack_value":10},{"suit":"hearts","value":"5","blackjack_value":5},{"suit":"clubs","value":"6","blackjack_value":6},{"suit":"spades","value":"6","blackjack_value":6},{"suit":"hearts","value":"8","blackjack_value":8},{"suit":"diamonds","value":"7","blackjack_value":7},{"suit":"diamonds","value":"9","blackjack_value":9},{"suit":"hearts","value":"7","blackjack_value":7},{"suit":"diamonds","value":"2","blackjack_value":2},{"suit":"spades","value":"2","blackjack_value":2},{"suit":"clubs","value":"8","blackjack_value":8},{"suit":"hearts","value":"A","blackjack_value":11},{"suit":"clubs","value":"5","blackjack_value":5},{"suit":"clubs","value":"4","blackjack_value":4},{"suit":"diamonds","value":"A","blackjack_value":11},{"suit":"spades","value":"J","blackjack_value":10},{"suit":"hearts","value":"K","blackjack_value":10},{"suit":"clubs","value":"K","blackjack_value":10}],"player_cards":[]}';

        $game->fromJson($json);

        // displaying the deck
        $game->displayDeck();


        //$json_string = $game->toJson();

        //echo $json_string;
    }
}