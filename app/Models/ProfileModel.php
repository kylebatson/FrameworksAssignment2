<?php

class ProfileModel extends Model implements ReaderInterface{
    public function find(string $tablename, array $ids): array{
        $array = [];
        $extracted_ids = "";
        for ($i = 0; $i < count($ids); $i++){
            $extracted_ids = $extracted_ids . $ids[$i]['course_id'] . ","; 
        }

        //There will be an extra comma at the end that will make the query fail so just cut it off
        $extracted_ids = rtrim($extracted_ids,",");

        $queryString = "SELECT * FROM  $tablename where course_id in ($extracted_ids)";
        
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
        
        return $array;
    }

    public function findAll(string $tablename, array $ids): array{
        //I'll be using this to return all records so implementation is neccessary
        $array = [];
        $queryString = "SELECT course_id FROM  $tablename where email = '$ids[email]'";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
        
        return $array;
    }

    public function getFacultyIds(string $tablename, array $ids){
        $array = [];
        $queryString = "SELECT * FROM  $tablename where course_id in ($ids[sql]) order by course_id";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
        
            return $array;
    }

    public function find1(string $tablename, array $ids){
        $array = [];
        $queryString = "SELECT * FROM  $tablename";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
        
            return $array;
    }


    
}