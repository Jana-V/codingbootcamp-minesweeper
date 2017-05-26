<?php

namespace app\controllers;

use \codingbootcamp\tinymvc\view as view;

class indexController
{
    // index action of index controller
    public function index()
    {
        // here it would ask model for data

        $submitted_text = $_GET['something'];

        // here it would give the data to the views and get the result
        $homepage_view = new view('homepage/homepage');
        

        $document = new view('document');
        $document->title = 'Homepage';
        $document->articles = ['First', 'Second'];
        $document->text = $submitted_text;
        $document->content = $homepage_view;

        // here the result gets returned
        return $document->render();
    }
}