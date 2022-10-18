<?php
class SessionClass{
    private $sess_arr;

    private $access = ['Profile' => ['tester@comp3170.com','tester2@mail.com']];
    

    public function create(){
        //if($this -> _sessionStarted == false){
           session_start();
           //$this -> _sessionStarted = true; 
        //}
        
    }

    public function checkSess(){
        if(isset($_SESSION['Email'])){
            return true;
        }
        return false;
    }

    public function destroy(){
        //if($this -> _sessionStarted == true){
            session_unset(); 
            session_destroy(); 
            //$this -> _sessionStarted = false; 
       // }
    }

    public function add($name, $value){
        //$this -> assertSame(session_status(),2,"Session has not been created!"); //When session has started will return 1
        
        $_SESSION[$name] = $value;
    }

    public function remove($name){
        unset($_SESSION[$name]);
    }

    public function accesible($user, $page):bool{
        if(in_array($user,$this -> access[$page])){
            return true;
        }
        
        return false;
    }

    //all extra methods for testing purposes only (mock array)

    public function testcreate(){
        if(empty($this -> sess_arr)){
            $this -> sess_arr = array( "session_started"=>"true");
            return $this -> sess_arr;
        }
    }

    public function testdestroy(){
            unset($this -> sess_arr); 
    }

    public function testadd($name, $value){
        if(!empty($this -> sess_arr['session_started'])){
            $temparr = array($name => $value);
            $this -> sess_arr = array_merge($this -> sess_arr,$temparr);
        }else{
             return "Session is empty!";
        }
        
    }

    public function testremove($name){
        if(!empty($this -> sess_arr['session_started'])){
            unset($this -> sess_arr[$name]);
        }else{
             return "Session is already empty";
        }
        
    }

    public function testaccesible($user, $page):bool{
        return true;    
    }

    public function testget($name){
        $result = $this -> sess_arr[$name];
        return $result;
    }
}

