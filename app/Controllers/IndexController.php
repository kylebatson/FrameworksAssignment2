<?php
//require '../framework/AbstractController.php';

class IndexController extends AbstractController{


    //'what makes the whole thing run'
    public function run(){
        //step 1 - set view
        $this -> setView(new View()); 
 
        $this -> view -> setTemplate(TEMPLATE_DIR . '/index.tpl.php');

        //step 2 - set model
        $this -> setModel(new IndexModel('courses'));

        $sess = new SessionClass();
        $sess -> create();

        $this -> model -> attach($this -> view);
        
        //step 3 - get courses data so we can pass it into the view for displaying
        $vars = $this -> model -> getAll();//retuns an array with two sub arrays popular and reccomended

        $this -> model -> updateTheChangedData($vars);

        $this -> model -> notify();

        //step 4 - add vars to view 
        //$this -> view -> addVars($vars);

        //step5 - set template
        
        //step6 - display the page
        //$this -> view -> display();

    }

}