<?php

class EnrollModel extends Model implements WriterInterface{
    public function add(string $tablename, array $ids){
        //format data properly before inserting into sql query
        $email = $ids['email'];
        $email = "'" . $email ."'";
        $course_num = $ids['course_num'];

        //before inserting check if record is there already
        $queryString = "select * from $tablename where email = $email AND course_id = $course_num";

        $result = $this -> mysqli -> query($queryString);

       if(mysqli_num_rows($result) == 0){
        $queryString = "insert into  $tablename 
                        VALUES (". $email. "," . $course_num . ")";
                        
        $result = $this->mysqli->query($queryString);   

        if($result){
            return array("Result"=>"You have successfully enrolled for $ids[course_name]");
        }
        else{
            return array("Result" => "There was an error");
        }

       }else{
        return array("Result" => "You have already registered for that course.");
       }
        
        
    }
}