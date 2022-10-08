<?php
require '../framework/AbstractController.php';

class IndexController extends AbstractController{


    //'what makes the whole thing run'
    public function run(){
        //step 1 - set view
        $this -> setView(new View()); 

        //step 2 - set model
        //$this -> setModel(new IndexModel);

        //step2 - set template
        $this -> view -> setTemplate(TEMPLATE_DIR . '/index.tpl.php');
        
        //step3 - display the page
        $this -> view -> display();

    }

}