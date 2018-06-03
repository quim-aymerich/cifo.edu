<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Municipios_model extends CI_Model {

    function __construct() {
        
        parent::__construct();
    }
    
    /************************************************************************************
     * Execute select statement for one municipio
     * @param $id integer (id tbl_municipios )
     * @return mixed
     *************************************************************************************/
    public function get($id){
        
        $this->db->select('m.*');
        $query = $this->db->get_where('tbl_municipios AS m', array('m.id' => $id));
        return $query->row();
        
    }
    
    /*************************************************************************************
    * Execute select all statement for a set of municipios
    * @param $limit integer, $start integer 
    * @param $order_field string 
    * @param $id_provincias integer ( id tbl_provincias)
	* @param $id_comunidades integer (id tbl_comunidades) 
    * @return mixed array
    **************************************************************************************/
    public function getAll($limit=5, $start=0,$order_field='',$id_provincias=0,$id_comunidades=0){
            
        $this->db->select('m.*, p.nombre AS provincia, c.nombre AS comunidad');
        $this->db->from('tbl_municipios AS m');
        $this->db->join('tbl_provincias AS p', 'p.id = m.id_provincias','inner');
        $this->db->join('tbl_comunidades AS c', 'c.id = p.id_comunidades','inner');
        
        if($id_provincias!=0 && $id_comunidades==0){
           $this->db->where('p.id',$id_provincias);
        }elseif($id_provincias==0 && $id_comunidades!=0){
           $this->db->where('c.id',$id_comunidades);
        }elseif($id_provincias!=0 && $id_comunidades!=0){
           $this->db->where(Array('p.id'=>$id_provincias,'m.id'=>$id_comunidades));
        }
        
        if($limit!=0){
            $this->db->limit($limit, $start);
        }
        if($order_field!=''){
            $this->db->order_by($order_field,'ASC');
        }else{
            $this->db->order_by('m.id','ASC');
        }
        $query = $this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
        
   }
   
   /****************************************
    * Delete municipio row
    * @param integer $id
    * @return boolean
    *****************************************/
   public function delete($id){
       $status=$this->db->delete('tbl_mnicipios', array('id' => $id));
       return $status;
   }
   
   /****************************************
    * Set municipio data
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
?>