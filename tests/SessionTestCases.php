<?php

require '../framework/SessionClass.php';

use PhpUnit\Framework\TestCase;

class SessionTestCases extends TestCase{

    private $obj;

    public function setUp():void{
        
        $this -> obj = new SessionClass(); 

    }

    //test if a valid object is created
    public function testSessionObjectCreated() {
        $this -> assertIsObject($this -> obj);
    }

    //test if the create method is doing what it should 
    public function testCreateWorking(){
        $result = $this -> obj -> testcreate();
        $this -> assertIsArray($result,"Session has not been created!"); //When session has started will return an array
        $this -> assertEquals("true",$result["session_started"],"sesion not started");
    }

    //no invalid input to test for in create method - so continue

    //test my defined function testget
    public function testGet(){
        $this -> obj -> testcreate();
        $result = $this -> obj -> testget('session_started');
        $this -> assertNotEmpty($result,$result . " is empty");
    }

    //test if add method is doing what it should
    public function testAddWorking(){
        $this -> obj -> testcreate();
        $this -> obj -> testadd("Test","Add is working");
        $result = $this -> obj -> testget('Test');
        $this -> assertNotEmpty($result,$result . " is empty");//test if result has something in it
        $this -> assertEquals("Add is working",$result,'The results returned does not match');
    }

    //test add moethd for invalid input - no possible way becase arrays can hold empty input


    //test remove method functions as it should 
    public function testRemove(){
        $this -> obj -> testcreate();
        $this -> obj -> testremove('session_started');
        $this -> assertEmpty(@$this -> obj -> testget('session_started'),'The session is still valid');
    }

    //no way to test for invalid input as array kay can be anything

    //test destroy method works as it should
    public function testDestroy(){
        $this -> obj -> testcreate();
        $this -> obj -> testdestroy();
        $this -> assertEmpty(@$this -> obj -> testget('session_started'),'The session is still valid');
    }

    //no way to test for invalid input for function that takes no parameters
    

   





    
   
}


?>