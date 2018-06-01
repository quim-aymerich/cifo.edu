<?php

class productora {
    
    private $mysql;
    
    //constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    public function get($id){
        $sql="SELECT * FROM tbl_productora
              WHERE id=$id";
        $rsProductora=$this->mysql->query($sql);
        $arrProductora=$rsProductora->fetch_assoc();
        return json_encode($arrProductora);
    }
    
    public function getAll(){
        $sql="SELECT * FROM tbl_productora";
        $rsProductora=$this->mysql->query($sql);
        $arrProductoras=array();
        while($arrProductora=$rsProductora->fetch_assoc()){
            $arrProductoras[]=$arrProductora;
        }
        return json_encode($arrProductoras);
    }
    
}