<?php

namespace Models;

class LoginModel extends Model{
//override get record as the get all in the Model super class cannot work for users, only for courses
    public function getRecord(string $id): array{
        if(is_numeric($id) != 1){
            throw new \InvalidArgumentException('The input must be a number');
        }

        foreach ($this -> json_data as $user) {
            if($user['User_id'] == $id){
                return $user;
            }
        }
    }
}