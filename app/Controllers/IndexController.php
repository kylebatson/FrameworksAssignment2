<?php

class IndexController extends AbstractController{

    //Step 1 - set the model
    protected function makeModel() : Model{
        //A model will be needed for the indec page so do as follows
        return new IndexModel(DB_USER,DB_PASSWORD,DB_NAME,DB_HOST);
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


        //get data from the database
        $data = $this -> model -> findAll('courses', $_POST);
        $instructors= $this -> model -> find('instructors', $_POST);

        //Now append data to the view using import vars (add all one time)
        $this -> view -> importVars($data);
        $this -> view -> importVar('instructors',$instructors);

        //Now set template
        $this -> view -> registerTemplate(TEMPLATE_DIR . '/index.tpl.php'); // change variable name 

        //And finally display the page
        $this -> view -> display();
    }

}