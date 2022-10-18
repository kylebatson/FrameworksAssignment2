<?php
//require '../framework/AbstractController.php';

class RegisterController extends AbstractController{


    //'what makes the whole thing run'
    public function run(){
        //First thing is to do validations - get post data
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $passwordconfirm = $_POST['passwordconfirm'];
        $fail = false;
        //set view
        $this -> setView(new View()); 

         //check for empty fields
         if((empty($email)) or (empty($password)) or (empty($name) )or (empty($passwordconfirm))){
            //assign errors to vars variable
            $vars = array("Error" => "One or more fields empty");
            //add vars to view 
            $this -> view -> addVars($vars);
            //set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            //display the page
            $this -> view -> display();

            exit();
        }

        $Uppercase = preg_match('/[A-Z]/',$password);
        $number = preg_match('/[0-9]/',$password);

        //Check if password contains at least one upper case letter and one number
        if(!$Uppercase or !$number){
            $vars = array("Error" => "Password must contain one uppercase and one number");
            //add vars to view 
            $this -> view -> addVars($vars);
            //set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            //display the page
            $this -> view -> display();

            exit();
        }

        //verify password matches criteria
        if((strlen($password) < 10)){
            $vars = array("Error" => "Password be 10 characters long");
            //add vars to view 
            $this -> view -> addVars($vars);
            //set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            //display the page
            $this -> view -> display();

            exit();
        }

       

        //check if it is a valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //assign errors to vars variable
            $vars = array("Error" => "Invalid Email");
            //add vars to view 
            $this -> view -> addVars($vars);
            //set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            //display the page
            $this -> view -> display();

            exit();
        }

        //if passwords dont match
        if($password != $passwordconfirm){
             //assign errors to vars variable
             $vars = array("Error" => "Passwords don't match");
             //add vars to view 
             $this -> view -> addVars($vars);
             //set template
             $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
             //display the page
             $this -> view -> display();
             exit();
        }

        



       
        //now set the model and append user to the json file
        $this -> setModel(new RegisterModel('users'));


        //check if anyusers with same email exsits first
        if($this -> model -> checkEmail($email) == false){
            //assign errors to vars variable
            $vars = array("Error" => "Email already taken");
            //add vars to view 
            $this -> view -> addVars($vars);
            //set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            //display the page
            $this -> view -> display();
            exit();
        }

        //now just hash the password and then add to the json
        $this -> model -> addUser($name,$email,password_hash($password,PASSWORD_DEFAULT));
        
        //assign data to vars variable
        $vars = array("Message" => "Sign Up Successful, please login above");
        //add vars to view 
        $this -> view -> addVars($vars);
        //set template
        $this -> view -> setTemplate(TEMPLATE_DIR . '/login.tpl.php');
        //display the page
        $this -> view -> display();
        

       
        
       

        

        
        
        

    }

}