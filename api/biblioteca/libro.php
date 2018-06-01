<?php 

class libro {
    
    private $mysql;
    
    // Constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    public function get($id){
        $sql="SELECT tbl_libro.*,tbl_editoriales.editorial
            FROM tbl_libro
            LEFT JOIN tbl_editoriales ON tbl_editoriales.id=tbl_libro.id_editoriales
            WHERE tbl_libro.id=$id    ";
            $rsLibros=$this->mysql->query($sql);
            $arrLibro=$rsLibros->fetch_assoc();
            return json_encode($arrLibro);
    }
    
    public function getAll (){
        $sql="SELECT tbl_libro.*,tbl_editoriales.editorial 
            FROM tbl_libro
            LEFT JOIN tbl_editoriales ON tbl_editoriales.id=tbl_libro.id_editoriales  ";
        $rsLibros=$this->mysql->query($sql);
        $arrLibros=array();
        while($arrLibro=$rsLibros->fetch_assoc()){
            $arrLibros[]=$arrLibro;
        }
        return json_encode($arrLibros);
        
    }
    
    public function insert($data){
        foreach($data as $key=>$value){
            $fields[]=$key;
            $values[]="'".str_replace("'","''",$value)."'";
        }
        $sql="INSERT INTO tbl_libro (".implode(",",$fields).") VALUES (".implode(",",$values)."); ";
        $this->mysql->query($sql);
        
        return $this->get($this->mysql->insert_id);
    }
    
    public function update($id , $data){
        
        foreach($data as $key=>$value){
            $fields[]=$key ."="."'".str_replace("'","''",$value)."'";
        }
        $sql="UPDATE tbl_libro SET ".implode(",", $fields)." WHERE id=$id ;";
        
        $this->mysql->query($sql);
        return $this->get($id);
    }
    
    public function delete($id){
        
        
        
        $sql="DELETE FROM tbl_autor_libro  WHERE id_libro=$id ;";
        $this->mysql->query($sql);
        $sql="DELETE FROM tbl_tema_libro  WHERE id_libro=$id ;";
        $this->mysql->query($sql);
        $sql="DELETE FROM tbl_libro  WHERE id=$id ;";
        $this->mysql->query($sql);
        return json_encode(array("id"=>$id,"msg"=>"Deleted"));
    }
    
}


?>