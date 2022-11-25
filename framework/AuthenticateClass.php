<?php
session_start();   
class Authenticate{
    //This creates a session and stores data
    public function loginUser(array $data){
        $_SESSION['session_user'] = $data;
    }

    public function isUserLoggedIn():bool{
        if(!isset($_SESSION['session_user']['email'])){
            return false;
        }else{
            //check for valid email address
            if(!filter_var($_SESSION['session_user']['email'], FILTER_VALIDATE_EMAIL)){
                return false;
            }
        }
        return true;
    }

    public function getUserInfo(string $field):string{
        switch ($field) {
            case 'em':
                return $_SESSION['session_user']['email'];
                break;
            case 'pass':
                return $_SESSION['session_user']['password'];
                break;
            case 'name':
                return $_SESSION['session_user']['name'];
                break;
            case 'time':
                return $_SESSION['session_user']['time'];
                break;
            default;
                return 'Invalid Input';
                break;
        }
    }

    public function logOutUser(){
        session_unset(); 
        session_destroy(); 
    }


}