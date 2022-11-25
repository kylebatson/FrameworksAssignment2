<?php

class IndexModel extends Model implements ReaderInterface{
    public function find(string $tablename, array $ids): array{
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

    public function findAll(string $tablename, array $ids): array{
        //I'll be using this to return all records so implementation is neccessary
        $resultArray = [];
        $queryString = "SELECT * FROM  $tablename ";
        $result = $this->mysqli->query($queryString);

        while($row = $result -> fetch_assoc()){
                $resultArray[] = $row;
            }
            

        //Instead of returning the array we will section out the popular from recommended
       
        //in here we will get a list of 8 most popular and 8 most recommended courses

        //initial step - create a copy of the json_data array so that we can return two sub arrays after
        //using one array will do both sort on that same arry leading to undesired results
        $copyArray = $resultArray;

        //firstly cut out the columns we want and sort them
        $recommended_col = array_column($resultArray,'course_recommendation_count'); //This takes out the recommenddation count column from the array
        $popular_col = array_column($resultArray,'course_access_count'); //This takes out the access count column from the array
        
        
        //now sort the data in the original and copy arrays using the columns extracted
        array_multisort($recommended_col, SORT_DESC,$resultArray);
        array_multisort($popular_col, SORT_DESC,$copyArray);

        //and slice out only 8 of them
        $recommended = array_slice($resultArray,0,8);
        $popular = array_slice($copyArray,0,8);


        //Now return the array
        return [$recommended,$popular];
    

    }

}