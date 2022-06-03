<?php

//create connection class
class connection{
    public $servername="localhost";
    public $username="root";
    public $password="";
    public $dbname="ha07";
    public $connection;

    //connect construct
    function __construct(){
        $this->connection= new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }
}