<?php

class UnenrollModel extends Model implements DeleterInterface{
    public function del(string $tablename, array $ids){
        $queryString = "DELETE FROM  $tablename where email = '$ids[email]' AND course_id = $ids[course_num]";
        $result = $this->mysqli->query($queryString);

        if($result){
            return array("Result"=>"You have successfully dropped the course.");
        }
        else{
            return array("Result"=>"There was an error");
        }

    }
}