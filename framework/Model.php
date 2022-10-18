<?php

 abstract class Model{
    protected $json_data;

    //Creates a connection to JSON file and stores data as array
    public function __construct($filename){
        // Read the JSON file 
        $json = file_get_contents(ROOT_DIR . '/data/'.$filename.'.json');
                            
        // Decode the JSON file
        $this -> json_data = json_decode($json,true);
    }

    public function getAll(): array{
        return $this -> json_data;
    }

    public function getRecord(string $id): array{
        if(is_numeric($id) != 1){
            throw new \InvalidArgumentException('The input must be a number');
        }

       

        foreach ($this -> json_data as $course) {
            if($course['course_id'] == $id){
                return $course;
            }
        }
    }

    //method to add something to the json data store
    //public function addRecord($int )

}
 /*
$m = new Model();
$m -> getRecord('Invaslid');
*/

