<?php

class StreamsModel extends Model implements ReaderInterface{
    public function find(string $tablename, array $ids): array{
        //I'm not using this so i'll will just return an empty array
        return [];
    }

    public function findAll(string $tablename, array $ids): array{
        //I'll be using this to return all records so implementation is neccessary
        $resultArray = [];
        $queryString = "SELECT * FROM  $tablename ";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $resultArray[] = $row;
            }

        //Now return the array
        return $resultArray;
    

    }

}