<?php

class nacionalidad {
    
    private $mysql;
    
    //constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    
    public function get($id){
        $sql="SELECT * FROM tbl_nacionalidad
              WHERE id=$id";
        $rsNacionalidad=$this->mysql->query($sql);
        $arrNacionalidad=$rsNacionalidad->fetch_assoc();
        return json_encode($arrNacionalidad);
    }
    
    public function getAll(){
        $sql="SELECT * FROM tbl_nacionalidad";
        $rsNacionalidad=$this->mysql->query($sql);
        $arrNacionalidades=array();
        while($arrNacionalidad=$rsNacionalidad->fetch_assoc()){
            $arrNacionalidades[]=$arrNacionalidad;
        }
        return json_encode($arrNacionalidades);
    }
    
}