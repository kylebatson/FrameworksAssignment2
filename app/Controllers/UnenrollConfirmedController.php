<?php

class UnenrollConfirmedController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //A model will be needed for the indec page so do as follows
        return new UnenrollModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
    }
    
    
    //Step 2 - set the view
    protected function makeView(): View{
        return new View();
    }

    
    //'what makes the whole thing run'
    //Step 3 - Setup the start method (Set view and model and get any data from the model then pass to view and display)
    public function start(){
        //Set the model and view
        $this -> model = $this -> makeModel();
        $this -> view = $this -> makeView();

        //Create auth object to get user details
        $auth = new Authenticate();

        //run the deleter in the model - create array to pass into deleter
        $array = array("email"=>$auth -> getUserInfo('em'),"course_num"=>$_GET['courseid'],"course_name"=>$_GET['coursename']);
        $result = $this -> model -> del("user_courses",$array);

        //Now append data to the view using import vars (add all one time)
        $this -> view -> importVars($result);

        //Now set template
        $this -> view -> registerTemplate(TEMPLATE_DIR . '/unenrollconfirmed.tpl.php');

        //And finally display the page
        $this -> view -> display();
    }

}