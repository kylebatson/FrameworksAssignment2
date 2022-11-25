<?php
class Model{
    protected $mysqli = null;

    //Creates a database connection
    public function __construct(string $user, string $pass, string $db, string $host){
        $this -> mysqli = new mysqli($host, $user, $pass, $db);
    }

}