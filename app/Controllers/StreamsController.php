<?php

class StreamsController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //A model will be needed for the indec page so do as follows
        return new StreamsModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
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


        $auth = new Authenticate();
        if($auth -> isUserLoggedIn()){
            //get data from the database
            $data = $this -> model -> findAll('streams', $_POST);
            $instructors = $this -> model -> findAll('instructors', $_POST);
            $stream_instructors = $this -> model -> findAll('stream_instructor', $_POST);
            
            //Now append data to the view using import vars (add all one time)
            $this -> view -> importVar('data',$data);
            $this -> view -> importVar('instructors',$instructors);
            $this -> view -> importVar('stream_instructors',$stream_instructors);

            //Now set template
            $this -> view -> registerTemplate(TEMPLATE_DIR . '/streams.tpl.php'); // change variable name 

             //And finally display the page
            $this -> view -> display();

        }else{
            //if no user logged in send to index page
            header('Location:index.php');
        }

        

        
    }

}