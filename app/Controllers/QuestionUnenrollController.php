<?php

class QuestionUnenrollController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //A model will be needed for the indec page so do as follows
        return new Model(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
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


        //Now set template
        $this -> view -> registerTemplate(TEMPLATE_DIR . '/questionunenroll.tpl.php'); // change variable name 

        //And finally display the page
        $this -> view -> display();
    }

}