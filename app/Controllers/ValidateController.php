<?php

class ValidateController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //
        return new AuthenticateModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    }
    
    
    //Step 2 - set the view
    protected function makeView(): View{
        return new View();
    }

    //Step 3 - Do all the validations using the validate class.
    
    //'what makes the whole thing run'
    //Step 4 - Setup the start method (Set view and model and get any data from the model then pass to view and display)
    public function start(){
        //Set the model and view
        $this -> model = $this -> makeModel();
        $this -> view = $this -> makeView();


        $vc = new Validate();
        $checker1 = true;
        $checker2 = true; 
        $checker3 = true;

        //check if data user entered is correct
        if(!$vc -> isNameValid($_POST['name']))//validate name
        $checker1 = false;

        if(!$vc -> isEmailValid($_POST['email']))//validate email
        $checker2 = false;

        if(!$vc -> isPasswordValid($_POST['password'],true,$_POST['passwordconfirm']))//validate passwords
        $checker3 = false;

        if($checker1 == false){
            $this -> view -> importVar("Error","Invalid Name");
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        }else  if($checker2 == false){
            $this -> view -> importVar("Error","Invalid Email");
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        }else  if($checker3 == false){
            $this -> view -> importVar("Error","Invalid/Mis matching Passwords");
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');
        }else{//if there is no bad input
            //now call find all and use that data to check if user is in database already
            if($vc -> areCredentialsValid($_POST)){
                $this -> view -> importVar("Error","Already Registered Or Email taken!");
                $this -> view -> registerTemplate(TEMPLATE_DIR . '/signup.tpl.php');
            }else{//add user to database after all validations
                $this -> model -> add("users",$_POST);
                $this -> view -> importVar("Message","Successfully Registered");
                $this -> view -> registerTemplate(TEMPLATE_DIR . '/login.tpl.php');
            }
        }

        //And finally display the page
        $this -> view -> display();

    }

}