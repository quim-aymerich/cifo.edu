<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function getAll( $page=0, $start=0, $order_field='',$id_provincias=0, $id_comunidades=0){
        
        $this->db->select('mun.* , pro.nombre AS provincia, com.nombre AS comunidad');
        $this->db->from('tbl_municipios AS mun');
        $this->db->join('tbl_provincias AS pro',' mun.id_provincias=pro.id ', 'inner');
        $this->db->join('tbl_comunidades AS com',' pro.id_comunidades=com.id ', 'inner');
        
        if($page!=0){  $this->db->limit($page,$start); } // LIMIT %page , %start 
        
        if($order_field!=''){ $this->db->order_by($order_field, 'ASC'); }
        
        if($id_provincias!=0){ $this->db->where('pro.id',$id_provincias); }
        if($id_comunidades!=0){ $this->db->where('com.id',$id_comunidades); }
        
        $query = $this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get($id){
        $query =$this->db->select('*')->from('tbl_municipios')->where('id',$id)->get();
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
        }
    }
    
    public function insert($data){
        $this->db->insert('tbl_municipios',$data);
        return $this->db->insert_id();
    }
    
    public function update($data){
        $this->db->where('id', $data['id']);
        return $this->db->update('tbl_municipios',$data);
    }
    
    public function delete($id){
        return $status=$this->db->delete('tbl_municipios', array('id' => $id));
    }
}