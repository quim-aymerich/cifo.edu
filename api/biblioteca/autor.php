<?php 

class autor {
    
    private $mysql;
    
    // Constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    public function get($id){
        $sql="SELECT * FROM tbl_autor WHERE id=$id ";
        $rsAutores=$this->mysql->query($sql);
        return json_encode( $rsAutores->fetch_assoc() );
    }
    
    public function getAll(){
        $sql="SELECT * FROM tbl_autor";
        $rsAutores=$this->mysql->query($sql);
        $arrAutores=array();
        while($arrAutor=$rsAutores->fetch_assoc()){
            $arrAutores[]=$arrAutor;
        }
        return json_encode($arrAutores);
    }
    
    public function insert($data){
        foreach($data as $key=>$value){
            $fields[]=$key;
            $values[]="'".str_replace("'","''",$value)."'";
        }
        $sql="INSERT INTO tbl_autor (".implode(",",$fields).") VALUES
             (".implode(",",$values)."); ";
        $this->mysql->query($sql);
        
        return $this->get($this->mysql->insert_id);
    }
    
    public function update($id,$data){
        foreach($data as $key=>$value){
            $fields[]=$key ."="."'".str_replace("'","''",$value)."'";
        }
        $sql="UPDATE tbl_autor SET ".implode(",", $fields)." WHERE id=$id ;";
        
        $this->mysql->query($sql);
        return $this->get($id);
    }
    
    public function delete($id){
        $sql="DELETE FROM tbl_autor_libro  WHERE id_autor=$id ;";
        $this->mysql->query($sql);
        $sql="DELETE FROM tbl_autor  WHERE id=$id ;";
        $this->mysql->query($sql);
        return json_encode(array("id"=>$id,"msg"=>"Deleted"));
    }
}