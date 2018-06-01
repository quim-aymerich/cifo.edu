<?php

class pelicula {
    
    private $mysql;
    
    // Constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    public function get($id){
        $sql="SELECT tbl_pelicula.*,tbl_productora.productora, tbl_nacionalidad.nacionalidad
        FROM tbl_pelicula
        LEFT JOIN tbl_nacionalidad ON tbl_pelicula.id_nacionalidad=tbl_nacionalidad.id
        LEFT JOIN tbl_productora ON tbl_pelicula.id_productora=tbl_productora.id
        WHERE tbl_pelicula.id=$id";
        $rsPelicula=$this->mysql->query($sql);
        $arrPelicula=$rsPelicula->fetch_assoc();
        return json_encode($arrPelicula);
    }
    
    public function getAll (){
        $sql="SELECT tbl_pelicula.*,tbl_productora.productora, tbl_nacionalidad.nacionalidad
        FROM tbl_pelicula
        LEFT JOIN tbl_nacionalidad ON tbl_pelicula.id_nacionalidad=tbl_nacionalidad.id
        LEFT JOIN tbl_productora ON tbl_pelicula.id_productora=tbl_productora.id
        WHERE 1";
        $rsPeliculas=$this->mysql->query($sql);
        $arrPeliculas=array();
        while($arrPelicula=$rsPeliculas->fetch_assoc()){
            $arrPeliculas[]=$arrPelicula;
        }
        return json_encode($arrPeliculas);
        
    }
    
    public function insert($data){
        foreach($data as $key=>$value){
            $fields[]=$key;
            $values[]="'".$value."'";
        }
        $sql="INSERT INTO tbl_pelicula (".implode(",",$fields).") VALUES (".implode(",",$values)."); ";
        
        $this->mysql->query($sql);
        
        return $this->get($this->mysql->insert_id);
    }
    
    public function update($id , $data){
        
        foreach($data as $key=>$value){
            $fields[]=$key ."="."'".$value."'";
        }
        $sql="UPDATE tbl_pelicula SET ".implode(",", $fields)." WHERE id=$id ;";
        
        $this->mysql->query($sql);
        return $this->get($id);
    }
    
    public function delete($id){
        
        
        $sql="DELETE FROM tbl_pelicula  WHERE id=$id ;";
        $this->mysql->query($sql);
        return json_encode(array("id"=>$id,"msg"=>"Deleted"));
    }
    
}


?>