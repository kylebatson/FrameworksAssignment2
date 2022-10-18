<?php
//include '../../framework/SessionClass.php';
class SignUpController extends AbstractController{
    

    //'what makes the whole thing run'
    public function run(){
        //step 1 - create the view and assign to view
        $this -> setView(new View()); 
 
        //no model needed only a view

        //step 2 - set template
        $this -> view -> setTemplate(TEMPLATE_DIR . '/signup.tpl.php');

        //step 3 - display the page
        $this -> view -> display();
    }

}