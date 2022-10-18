<?php



class RegisterModel extends ObservableModel{
//create a function to append data onto current json file
    public function addUser($name,$email,$password):bool{
        //iterate though json_contents and get the largest id field
        $id = 1;
       foreach($this -> json_data as $count){
        $id++;
       }

        $data = array("User_id" => $id,"Name" => $name, "Email" => $email, "Password" => $password);
        array_push($this -> json_data, $data);

        $jsonData = json_encode($this -> json_data);
        if (file_put_contents(ROOT_DIR . '/data/users.json', $jsonData) == 1){
            return true;
        }else{
            return false;
        }
        
    }

    //function to check if that email is taken
    public function checkEmail($email):bool{
        for($i = 0; $i < count($this -> json_data);$i++){
            if($email == $this -> json_data[$i]['Email'])
            return false;
        }

        return true;
    }
    
}