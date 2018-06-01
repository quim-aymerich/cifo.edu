<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_model{
        
        public function get($id=0){
            
            $query =$this->db->select('*')->from('tbl_usuarios')->where('id',$id)->get();
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
        }
        
        public function set($data, $id){
            $this->db->update('tbl_usuarios', $data, "id = ".$id);
        }
        
        public function register($data){
            $this->db->set('nombre' , $data['nombre']);
            $this->db->set('apellidos' , $data['apellidos']);
            $this->db->set('password' ,'PASSWORD("'.$data['password'].'")', FALSE);
            $this->db->set('email' , $data['email']);
            $this->db->set('id_roles' , $data['id_roles'] , FALSE );
            $this->db->set('id_municipios' , $data['id_municipios'], FALSE );
            $this->db->insert('tbl_usuarios');
            return $this->db->insert_id();
        }
        
        public function login($email,$pass){
            $this->db->select('*');
            $this->db->from('tbl_usuarios');
            $this->db->where('email',$email);
            $this->db->where('password','PASSWORD("'.$pass.'")', FALSE);
            if($query=$this->db->get()){
                return $query->row_array();
            }else{
                return false;
            }
        }
        
        public function email_check($email){
            $this->db->select('*');
            $this->db->from('tbl_usuarios');
            $this->db->where('email',$email);
            $query=$this->db->get();
            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }
        
    }
?>