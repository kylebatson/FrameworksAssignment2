<?php
require '../framework/View.php';
require '../config.php';

use PhpUnit\Framework\TestCase;

class ViewTestCases extends TestCase{

    private $viewObj;

    public function setUp():void{
        $this -> viewObj = new View();
    }


    public function testViewObjectCreated():void {
        $this -> assertIsObject($this -> viewObj);
    }

    //tests if my defined function getData works
    public function testgetData():void{
        $this -> assertEmpty($this -> viewObj -> getVars()); //it should be empty
    }

    //tests if add vars is functionning as it should.
    public function testaddVars():void{
        $this -> viewObj -> addVar('Error','This is an error');
        $this -> assertNotEmpty($this -> viewObj -> getVars());
    }

     //tests for invalid input in addvars
     public function testaddVarsInvalidInput():void{
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('Empty Input in one or more parameters');
        $this -> viewObj -> addVar('','');
    }

    //tests if setTemplate is functioning as it should -test for empty filename first(Blank string)
    public function testsetTemplateEmpty():void{
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('View Error: No template file given');
        $this -> viewObj -> setTemplate('');
    }

    //tests if setTemplate is functioning as it should -test for invalid filename 
    public function testsetTemplateInvalidFile():void{
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('View Error: file does no exist');
        $this -> viewObj -> setTemplate('invalidfilename');
    }

    //tests if setTemplate is functioning as it should 
    public function testsetTemplate():void{
        $this -> viewObj -> setTemplate(TEMPLATE_DIR . '/index.tpl.php');
        $this -> assertNotEmpty($this -> viewObj -> getTpl());
        $this -> assertEquals(TEMPLATE_DIR . '/index.tpl.php',$this -> viewObj -> getTpl(),"Course id does not match!");  //Test if the id of 1st record returned matches 1
    }

    public function testDisplayViewTemplate():void{
        //have no idea how to test
    }

    
    

}


?>