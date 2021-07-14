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

       switch($text) 
       {
           case strpos($text,'hi'):
                if(isset($_SESSION['name'])){
                    $replay= $_SESSION['name']." what's up?";
                } else {
                    $replay= 'HI, im chatbot, wanna tell me your name?';
                }
                return $replay;
               break;
            case strpos($text,'whats my name'):
                $replay= 'Your name is '.$_SESSION['name'].'. see? i told ya i will remeber it ;)';
                return $replay;
                break;
           default:
               $replay= 'Sorry im not able to understand you!';
               return $replay;
               break;
       }
    }
}
