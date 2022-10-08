<?php
//include '../../framework/SessionClass.php';
class LoginController extends AbstractController{
    
    public function login(){

    }

    //'what makes the whole thing run'
    public function run(){
        //step 1 - create the view and assign to view
        $this -> view = $this -> setView(new View()); 

        //step 2 - create a session
        $sess = new SessionClass();
        $sess -> create();

        //step3 - do validations and stuff
        $this -> login();

        //step3 - display the page
        $this -> view -> display();
    }

}