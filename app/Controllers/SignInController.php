<?php

class SignInController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //return an empty base model since it will not be needed
        return new AuthenticateModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    }
    
    
    //Step 2 - set the view
    protected function makeView(): View{
        return new View();
    }

    
    //'what makes the whole thing run'
    //Step 3 - Setup the start method (Set view and model and get any data from the model then pass to view and display)
    public function start(){
        //Set the view
        $this -> view = $this -> makeView();
        $this -> model = $this -> makeModel();

        //use validate class to check if data returned from database matches what user sent in
        $vc = new Validate();
        if($vc -> areCredentialsValidLogin($_POST)){
            //create session store details - but how to get first and last name?
            //ask the model again (-_-)
            $auth = new Authenticate();

            $names = $this -> model -> find("users",$_POST);

            //now join first and last name to post data
            $concatData = array('name' => $names[0]['name'],'email' => $_POST['email'],'password' => $_POST['password'],
            'time' => date('d-m-y h:i:s'));

            $auth -> loginUser($concatData);

            //now call the profile page
            header('Location: profile.php');
            exit();
        }else{//no matches found
            $this -> view -> importVar("Error","Invalid Credentials");
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/login.tpl.php');
            //And finally display the page
            $this -> view -> display();
        }

        
    }

}