<?php

class connection
{
    public $conn;

    function connectdb($name){
        $this->conn = oci_connect($name,$name,'localhost/xe') ;
        if (!$this->conn) return 0;
        else return 1;
    }

    function execute($args){
        if (!$this->conn) return 0;
        $stmt=oci_parse($this->conn,$args);
        oci_execute($stmt);
        return 1;
    }

    function select($args){
        if (!$this->conn) return 0;
        $stmt=oci_parse($this->conn,$args);
        oci_execute($stmt);
        return $stmt;
    }

}

