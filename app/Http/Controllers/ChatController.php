<?php
namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;

class ChatController extends Controller
{
    function getData()
    {
        $text = $_GET['text'];
        $text = strtolower($text);

        if (strpos($text, 'my name is') === FALSE) {
         } else { 
            $search = 'my name is' ;
            $name = str_replace($search, ' ', $text);
            $name = ucwords($name);
            $replay= 'ohh what a cool name, i will remember it!';
            $_SESSION['name'] = $name;
            return $replay;
        }

        if (strpos($text, 'whats my name') === FALSE) {
        } else {
           $replay= 'Your name is '.$_SESSION['name'].'. see? i told ya i will remeber it ;)';
           return $replay;
       }
    }
}
