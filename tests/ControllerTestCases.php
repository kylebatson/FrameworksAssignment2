<?php
require '../app/Controllers/IndexController.php';
//require '../app/Models/IndexModel.php';
require '../framework/Model.php';
require '../framework/View.php';
require '../config.php';


use PhpUnit\Framework\TestCase;

class ControllerTestCases extends TestCase{

    private $indexObj;

    public function setUp():void{
        $this -> indexObj = new IndexController();
    }


   //Tests if a valid object was created
    public function testIndexControllerObjectCreated() { 
        $this -> assertIsObject($this -> indexObj);
    }

    //test the getModel method
    public function testGetModel(){
        $result = "Not empty";
        $result = $this -> indexObj -> getModel();
        $this -> assertEmpty($result,'Getmodel didnt overwrite result with null that model is initialised to');
    }

    //test the getView method
    public function testGetView(){
        $result = "Not empty";
        $result = $this -> indexObj -> getView();
        $this -> assertEmpty($result,'Getview didnt overwrite result with null that view is initialised to');
    }

    //test that setModel does as its supposed to
    public function testSetModel(){
        $this -> indexObj -> setModel($this->getMockForAbstractClass('Model'));
        $model = $this -> indexObj -> getModel();
        $this -> assertNotEmpty($model,"The Model is still null");//test if model is not null still
        $this -> assertEquals($this->getMockForAbstractClass('Model'),$model,'Not the same');//test if view objects match 
        $this -> assertIsObject($model);//test that view is now an object of class view
    }

    //cant test set model for invalid input as there are no parameters

    //test that setView does as its supposed to
    public function testSetView(){
        $this -> indexObj -> setView(new View());
        $view = $this -> indexObj -> getView();
        $this -> assertNotEmpty($view,"The Model is still null");//test if view is not null still
        $this -> assertEquals(new View(),$view,'Not the same');//test if view objects match 
        $this -> assertIsObject($view);//test that view is now an object of class view
    }

    //cant test set view for invalid input as there are no parameters

    public function testRun(){
        $this -> indexObj -> run();
        //data member view should not be null as 
        //the index page uses a view
        //so test if view is still null after calling run()
        $this -> assertNotEmpty($this -> indexObj -> getView());
        $this -> assertIsObject($this -> indexObj -> getView());//assert view is now a object
    }

    //cant test run for invalid input as there are no parameters

    
}


?>