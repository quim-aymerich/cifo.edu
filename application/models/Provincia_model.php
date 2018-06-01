<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function getAll(){
        $this->db->select(' pro.*');
        $this->db->from('tbl_provincias AS pro');
        $query = $this->db->get();
        if( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            return array();
        }
    }
}