<?php
//require '../framework/AbstractController.php';

class ProfileController extends AbstractController{


    //'what makes the whole thing run'
    public function run(){
        //step 1 - set view
        $this -> setView(new View()); 

       

        //step 2 - check if user is even allowed to access page
        $sess = new SessionClass();
        $sess -> create();
        if ($sess -> checkSess()){
            if($sess -> accesible($_SESSION['Email'],'Profile')){

                //step 3 - set model
                $this -> setModel(new ProfileModel('user_courses'));

                //step 4 - set template
                $this -> view -> setTemplate(TEMPLATE_DIR . '/profile.tpl.php');
                
                //step 5 - attach profile view as a observer
                $this -> model -> attach($this -> view);  

                //step 6 - get data
                $vars = $this -> model -> getAll(); //retuns an array with two sub arrays popular and reccomended

                //step 7 - update the data
                $this -> model -> updateTheChangedData($vars);
        
                //step 8 - notify all other observers
                $this -> model -> notify();        
            }else{//user is valid but and can create session but not allowed to access the pages (Not added to acces array)
                //if the user is not supposed to access the page then redirect to login with an error
                //step 1 - set template
                $this -> view -> setTemplate(TEMPLATE_DIR . '/login.tpl.php');

                //Step 2 - assign errors to vars variable
                $vars = array("Error" => "Access Not Allowed - User does not have permission");
                
                //Step 3 - add vars to view 
                $this -> view -> addVars($vars);

                //step 4 - display the page
                $this -> view -> display();
            }
        }else{
            //if there is no session redirect
            //step 1 - set template
            $this -> view -> setTemplate(TEMPLATE_DIR . '/login.tpl.php');

            //Step 2 - assign errors to vars variable
            $vars = array("Error" => "Access Not Allowed - Login First");
            
            //Step 3 - add vars to view 
            $this -> view -> addVars($vars);

            //step 4 - display the page
            $this -> view -> display();
        }
    
    }

}