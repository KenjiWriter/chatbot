<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    function getData()
    {
        $text = $_GET['text'];

        switch($text) 
        {
            case 'hi':
                $replay= 'hello there!';
                echo $replay;
                break;
            default:
                $replay= 'Sorry im not able to understand you!';
                echo $replay;
                break;
        }
    }
}
