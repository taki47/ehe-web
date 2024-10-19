<?php

namespace App\Http\Controllers;

class Helper extends Controller
{
    public static function CheckCaptcha($token)
    {
        //check captcha
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];

        $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".env("GCAPTCHA_SECRET_KEY")."&response=".$token."&remoteip=".$remoteip);
        $resultJson = json_decode($result);

        if( intval($resultJson->success) !== 1 ) {
            return false;
        } else {
            return true;
        }
        
        return false;
    }
}