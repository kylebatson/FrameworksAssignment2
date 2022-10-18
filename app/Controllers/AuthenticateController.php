<?php
class AuthenticateController extends AbstractController{
    
    //'what makes the whole thing run'
    public function run(){

        //step 1 - set model
        $this -> setModel(new AuthenticateModel('users'));
        
        //step 2 - get users data so we can check on it with the post data
        $users = $this -> model -> getAll();

        //step 3 - compare login details
        $email = $_POST['email'];
        $password = $_POST['password'];
        $match = false;
        $id = null;
        
        //if there is a match
        foreach($users as $user){       
            if ($user['Email'] == $email){ 
                if (password_verify($password, $user['Password'])){
                    $match = true;
                    $id = $user['User_id'];
                }           
            }
        }


        
        

        //if there was a match then start session
        if ($match == true){
            $sess = new SessionClass();
            $sess -> create();//create session
            $sess -> add("Email",$email);//add whatever needs to be added to session
            $sess -> add("ID",$id);//add whatever needs to be added to session

            
            //call profile.php page
            header("Location: profile.php");
            exit();
        }

        //if there was no match 
        if($match == false){
            //call login page but with errors (Create a login view and call if with errors)
            $this -> setView(new View()); 

            $this -> view -> addVar("Error","Invalid Email/Password");

            $this -> view -> setTemplate(TEMPLATE_DIR . '/login.tpl.php');

            $this -> view -> display();

            exit();

        }

        

    }
}