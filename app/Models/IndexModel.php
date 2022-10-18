<?php

class IndexModel extends ObservableModel{
    public function getAll(): array{
        //in here we will get a list of 8 most popular and 8 most recommended courses

        //initial step - create a copy of the json_data array so that we can return two sub arrays after
        //using one array will do both sort on that same arry leading to undesired results
        $copy = $this -> json_data;

        //firstly cut out the columns we want and sort them
        $recommended_col = array_column($this -> json_data,'course_recommendation_count'); //This takes out the recommenddation count column from the array
        $popular_col = array_column($this -> json_data,'course_access_count'); //This takes out the access count column from the array
        
        
        //now sort the data in the original and copy arrays using the columns extracted
        array_multisort($recommended_col, SORT_DESC,$this -> json_data);
        array_multisort($popular_col, SORT_DESC,$copy);

        //and slice out only 8 of them
        $recommended = array_slice($this -> json_data,0,8);
        $popular = array_slice($copy,0,8);


        return [$recommended,$popular];
    }
   
}