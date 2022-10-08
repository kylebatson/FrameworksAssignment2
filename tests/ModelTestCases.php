<?php
require '../framework/Model.php';
require '../config.php';

use PhpUnit\Framework\TestCase;

class ModelTestCases extends TestCase{

    private $stub;

    public function setUp():void{
        $this -> stub = $this->getMockForAbstractClass('Model');
    }

    
    //just a test to make sure stuff is operating
   public function testThatStringsMatch(){
    $string = "testing";
    $string2 = "testing";

    $this -> assertSame($string,$string2);
   }

    public function testModelObjectCreated() {
       
        $this -> assertIsObject($this -> stub);
    }

    //tests if the correct output is returned from getRecord() method
    public function testModelGetRecord(){  
        $result = $this -> stub -> getRecord(1);
        

        $this -> assertEquals(1,$result['course_id'],"Course id does not match!");  //Test if the id of 1st record returned matches 1
        $this -> assertEquals(2,$result['course_id'],"Course id does not match!"); //this should fail because 1 != 2
        $this -> assertEquals('Comp 112 - Test',$result['course_name'],"Course name does not match!"); //Test if course name returned matches 

        $arr = array( "course_id"=>1,
        "course_name"=>"Comp 112 - Test",
        "course_description"=>"Loremsian aiosnd iaoundf",
        "course_recommendation_count"=>25,
        "course_access_count"=>25,
        "course_image"=>"../images/review.png");

        //Now test the whole array against what is returned 
        $this -> assertSame($arr,$result,"The arrays do not match!");
    }

    //tests if an array was really returned from getRecord
    public function testModelGetRecordIsArray(){
        $result = $this -> stub -> getRecord(2);

        $this -> assertIsArray($result,"Array was not returned!");
    }

    //tests if an array was really returned from getAll
    public function testModelGetAllIsArray(){
        $result = $this -> stub -> getAll();

        $this -> assertIsArray($result,"Array was not returned!");
    }

    //tests if correct output was recieved from getAll()
    public function testModelGetAll(){
        $result = $this -> stub -> getAll();
    
        foreach ($result as $course) {
            $counter = 1;
            $this -> assertEquals($counter,$course['course_id'],'Course id does not match');
            $counter = $counter + 1;
        }
    }

    //tests if valid input was input into the getRecord() method - This one should pass
    public function testModelGetReocordValidInput(){
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('The input must be a number');
        $this -> stub -> getRecord('Invalid Input');
    }

    //tests if valid input was input into the getRecord() method - This one should fail
    public function testModelGetReocordValidInput2(){
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('The input must be a number');
        $this -> stub -> getRecord('1');
    }

    /*
    //tests if valid input was input into the getAll) method
    public function testModelGetAllValidInput(){
        $this->expectException(\InvalidArgumentException::class);
        $this -> expectExceptionMessage('The input must be a number');
        $this -> stub -> getRecord('Invalid Input');
    }*/


}


?>