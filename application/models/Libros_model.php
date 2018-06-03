<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Libros_model extends CI_Model {

    function __construct() {
        
        parent::__construct();
    }
    
    /************************************************************************************
     * Execute select statement for one libro
     * @param $id integer (id tbl_libros )
     * @return mixed array
     *************************************************************************************/
    public function get($id){
        
        $this->db->select('l.*');
        $query = $this->db->get_where('tbl_libro AS l', array('l.id' => $id));
        return $query->row();
        
    }
    
    /*************************************************************************************
     * Execute select all statement for a set of libros
     * @param $limit integer
     * @param $start integer 
     * @param $order_field string 
     * @param $id_tema integer ( id tbl_temas)
     * @param $id_autor integer (id tbl_autores)
     * @return mixed array
     **************************************************************************************/
    public function getAll($limit=5, $start=0, $order_field='', $id_tema=0, $id_autor=0){
        
        $this->db->select('l.*,e.editorial');
        $this->db->from('tbl_libro AS l');
        $this->db->join('tbl_editoriales AS e', 'e.id = l.id_editoriales','left');
        
        if($id_tema!=0 && $id_autor==0){
            $this->db->select('l.*,e.editorial,t.titulo AS tema');
            $this->db->join('tbl_tema_libro AS tl', 'tl.id_libro = l.id','inner');
            $this->db->join('tbl_tema AS t', 'tl.id_tema = t.id','inner');
            $this->db->where('t.id',$id_tema);
            
        }elseif($id_tema==0 && $id_autor!=0){
            
            $this->db->select('l.*,e.editorial,a.*');
            $this->db->join('tbl_autor_libro AS al', 'al.id_libro = l.id','inner');
            $this->db->join('tbl_autor AS a', 'al.id_autor = a.id','inner');
            $this->db->where('a.id',$id_autor);
            
        }elseif($id_tema!=0 && $id_autor!=0){
            $this->db->select('l.*,e.editorial,t.titulo AS tema');
            $this->db->join('tbl_tema_libro AS tl', 'tl.id_libro = l.id','inner');
            $this->db->join('tbl_tema AS t', 'tl.id_tema = t.id','inner');
            $this->db->join('tbl_autor_libro AS al', 'al.id_libro = l.id','inner');
            $this->db->join('tbl_autor AS a', 'al.id_autor = a.id','inner');
            
            $this->db->where(Array('t.id'=>$id_tema,'a.id'=>$id_autor));
        }
        
        if($limit!=0){
            $this->db->limit($limit, $start);
        }
        
        if($order_field!=''){
            $this->db->order_by($order_field,'ASC');
        }else{
            $this->db->order_by('l.id','ASC');
        }
        $query = $this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
        
    }
    
    /****************************************
     * Delete libro row
     * @param integer $id
     * @return boolean
     *****************************************/
    public function delete($id){
        $status=$this->db->delete('tbl_libro', array('id' => $id));
        if( $status ){
            // Deletes aux tables tbl_tema_libro, tbl_autor_libro
            $this->db->delete('tbl_tema_libro', array('id_libro' => $id));
            $this->db->delete('tbl_autor_libro', array('id_libro' => $id));
            
        }
        return $status;
    }
    
    /****************************************
     * Set libro data
     * @param array(assoc) libro data
     * @return boolean
     *****************************************/
    public function save($data){
        $this->db->where('id', $data['id']);
        return $this->db->update('tbl_libro', $data);
    }
    
    /****************************************
     * insert libro data
     * @param array libro
     * @return integer id 
     *****************************************/
    public function insert($data){
        $this->db->insert('tbl_libro', $data);
        return $this->db->insert_id();
    }
}
