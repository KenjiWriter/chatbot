<?php
namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;

class ChatController extends Controller
{
    function ask($question, $reply) {

    }
    function getData()
    {
        $text = $_GET['text'];
        $text = strtolower($text);

        if (strpos($text, 'my name is') === FALSE) {
         } else { 
            $search = 'my name is' ;
            $name = str_replace($search, ' ', $text);
            $name = ucwords($name);
            $name = preg_replace('/\s+/', '', $name);
                if(empty($name)){
                    $reply= "You don't have a name? or just trying to trick me? not this time. <br>";
                    echo $reply;
                    $reply= "Can you give me your name again?";
                    $_SESSION['question'] = 'name';
                    return $reply;
                }
            $reply= 'ohh what a cool name, i will remember it!';
            $_SESSION['name'] = $name;
            return $reply;
        }

        if(isset($_SESSION['question'])){
            $question= $_SESSION['question'];

            if($question= 'name'){
                if($text == 'yes' or 'sure'){
                    unset($_SESSION['question']);
                    $reply= 'Ok then type your name.';
                    $_SESSION['nr2_question'] = 'name';
                    return $reply;
                } else {
                    unset($_SESSION['question']);
                }
            }
            if($question= 'insert_name') {
                $name = ucwords($text);
                $name = preg_replace('/\s+/', '', $name);
                if(empty($name)){
                    unset($_SESSION['question']);
                    return 'Again...?';
                } else {
                    unset($_SESSION['question']);
                    $_SESSION['name']= $name;
                    return 'Oh cool name, i will remember it!';
                }
            }
        }
        if(isset($_SESSION['nr2_question'])){
            $question= $_SESSION['nr2_question'];
            if($question= 'name') {
                $name = ucwords($text);
                $name = preg_replace('/\s+/', '', $name);
                if(empty($name)){
                    unset($_SESSION['nr2_question']);
                    return 'Again...?';
                } else {
                    unset($_SESSION['nr2_question']);
                    $_SESSION['name']= $name;
                    return 'Oh cool name, i will remember it!';
                }
            }
        }
       
        switch($text) 
       {
           case strpos($text,'hi'):
                if(isset($_SESSION['name'])){
                    $reply= $_SESSION['name']." what's up?";
                } else {
                    $reply= 'HI, im chatbot, wanna tell me your name?';
                }
                return $reply;
               break;
            case strpos($text,'whats my name'):
                if(isset($_SESSION['name'])){
                    $reply= 'Your name is '.$_SESSION['name'].'. see? i told ya i will remeber it ;)';
                    return $reply;
                    break;
                }
                $reply= "You didnt told me your name yet.";
                return $reply;
                break;
            case 'question':
                if(isset($_SESSION['question'])){
                    return $_SESSION['question'];
                    break;
                } else {
                    return 'No question in que';
                    break;
                }
           default:
               $reply= 'Sorry im not able to understand you!';
               return $reply;
               break;
       }
    }
}
