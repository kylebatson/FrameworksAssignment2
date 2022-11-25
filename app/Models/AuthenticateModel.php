<?php

class AuthenticateModel extends Model implements ReaderInterface, WriterInterface{
    public function find(string $tablename, array $ids): array{
        $queryString = "SELECT name FROM  $tablename WHERE email = '$ids[email]' ";
        $result = $this->mysqli->query($queryString);
        $array = [];
        if($result -> num_rows <> 1){
            return array("Empty results");
        }else{
            while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
            return $array;
        }
    }

    public function findAll(string $tablename, array $ids): array{
        //I'll be using this to return all records so implementation is neccessary
        $array = [];
        $queryString = "SELECT * FROM  $tablename ";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
            return $array;
    }

    public function add(string $tables, array $fields){
        $queryString = "INSERT into $tables VALUES 
        ('".$fields['name']."','" . $fields['email'] ."','". $fields['password'] ."')";

        $result = $this->mysqli->query($queryString);
    }
}