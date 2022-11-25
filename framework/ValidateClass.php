<?php
class Validate{
    public function areCredentialsValid(array $user_info): bool{
        //Takes the email and password and searches the users table for the matcing pair
        //login btn -> validate contoller -> validate class -> validates data -> calls home page for logged in user        
        $controller = new AuthenticateController();
        $controller -> start();
        $results = $controller -> returnModelResults('users',[]);

        if(!$results){
            return false;
        }
        
        //compare if user_info found in results returned from db
        for($i = 0; $i < count($results);$i++){//if user has already signed up
            if($user_info['email'] == $results[$i]['email'] AND $user_info['password'] == $results[$i]['password']){
                return true;
            }

            if($user_info['email'] == $results[$i]['email']){//if email already taken
                return true;
            }
        }
        return false;
    }

    //function created because for registration we also want to check if email has been taken, instead trying to do 
    //an insert with a duplicate email key.
    public function areCredentialsValidLogin(array $user_info): bool{
        //Takes the email and password and searches the users table for the matcing pair
        //login btn -> validate contoller -> validate class -> validates data -> calls home page for logged in user        
        $controller = new AuthenticateController();
        $controller -> start();
        $results = $controller -> returnModelResults('users',[]);
        
        //compare if user_info found in results returned from db
        for($i = 0; $i < count($results);$i++){
            if($user_info['email'] == $results[$i]['email'] AND $user_info['password'] == $results[$i]['password']){
                return true;
            }
        }
        return false;
    }

    public function isEmailValid(string $email):bool{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function isPasswordValid(string $password, bool $retyped=false, string $retyped_pass=''):bool{
        if($retyped == true){  //if the password has been retyped check to make sure it matches original password
            if($password != $retyped_pass){
                return false;
            }
        }

            if((strlen($password) < 8)){//make sure password more than 8 characters long
                return false;
            } 

            $Uppercase = preg_match('/[A-Z]/',$password);
            $Lowercase = preg_match('/[a-z]/',$password);
            $number = preg_match('/[0-9]/',$password);

            if(!$Uppercase or !$number or !$Lowercase){//check if password contains a number and lowercase and uppercase letter
                return false;
            }

            return true;
        
    }

    public function isNameValid(string $name):bool{
        //find the seperator between names
        $parts = explode(" ", $name); //separate names based on space - only the first two will be taken
        //I could return them sepearted if i wanted to insert into db, but db only has one name col
        $firstname = $parts[0];

        if(!isset($parts[1])){
            return false;
        }

        $lastname = $parts[1];

        $onlyCharsFname = preg_match("/^[a-zA-Z]+$/",$firstname);
        $onlyCharsLname = preg_match("/^[a-zA-Z]+$/",$lastname);

        if (!$onlyCharsLname or !$onlyCharsFname){
            return false;
        }else{
            return true;    
        }
    }
}