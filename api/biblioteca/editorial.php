<?php 

class editorial {
    
    private $mysql;
    
    // Constructor
    function __construct() {
        $this->mysql =  new mysqli('localhost','u_cifo','12345','cifo');
        $this->mysql->set_charset("utf8");
    }
    
    public function get($id){
        $sql="SELECT * FROM tbl_editoriales WHERE id=$id ";
        $rsEditoriales=$this->mysql->query($sql);
        return json_encode( $rsEditoriales->fetch_assoc() );
    }
    
    public function getAll(){
        $sql="SELECT * FROM tbl_editoriales ";
        $rsEditoriales=$this->mysql->query($sql);
        $arrEditoriales=array();
        while($arrEditorial=$rsEditoriales->fetch_assoc()){
            $arrEditoriales[]=$arrEditorial;
        }
        return json_encode($arrEditoriales);
    }
    
    public function insert($data){
        foreach($data as $key=>$value){
            $fields[]=$key;
            $values[]="'".str_replace("'","''",$value)."'";
        }
        $sql="INSERT INTO tbl_editoriales (".implode(",",$fields).") VALUES
             (".implode(",",$values)."); ";
        $this->mysql->query($sql);
        
        return $this->get($this->mysql->insert_id);
    }
    
    public function update($id,$data){
        foreach($data as $key=>$value){
            $fields[]=$key ."="."'".str_replace("'","''",$value)."'";
        }
        $sql="UPDATE tbl_editoriales SET ".implode(",", $fields)." WHERE id=$id ;";
        
        $this->mysql->query($sql);
        return $this->get($id);
    }
    
    public function delete($id){
        
        $sql="DELETE FROM tbl_editoriales  WHERE id=$id ;";
        $this->mysql->query($sql);
        return json_encode(array("id"=>$id,"msg"=>"Deleted"));
    }
}