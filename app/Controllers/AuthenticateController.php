<?php

 class AuthenticateController extends AbstractController{
    //Return authenticate model since connecting to db
    protected function makeModel(): Model{
     return new AuthenticateModel(DB_USER, DB_PASSWORD,DB_NAME, DB_HOST);
    }

    //Create an empty view since the authenticateController does not need one
    protected function makeView():View{
        $v = new View();
        return $v;
    }

    public function start(){
        $this -> model = $this -> makeModel();
    }

    public function returnModelResults($tablename,$arr):array{
        $data = $this -> model -> findAll($tablename,$arr);
        if(!$data){
            return []; //return an empty array
        }else{
            return $data; //return the data
        }
    }
 }