<?php

class CoursesModel extends Model implements ReaderInterface{
    public function find(string $tablename, array $ids): array{
        $array = [];
        $queryString = "SELECT * FROM  $tablename where course_id in ($ids[sql]) order by course_id";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $array[] = $row;
            }
            return $array;
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
}