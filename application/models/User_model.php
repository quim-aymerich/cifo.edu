<?php
class User_model extends CI_model{
    
    public function register($data){
        
        $this->db->set('nombre'             , $data['nombre']);
        $this->db->set('apellidos'          , $data['apellidos']);
        $this->db->set('password'           ,'PASSWORD("'.$data['password'].'")', FALSE );
        $this->db->set('email'              , $data['email']);
        $this->db->set('id_roles'           , $data['id_roles'] , FALSE );
        $this->db->set('id_municipios'      , $data['id_municipios'],  FALSE );
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
    
    public function is_admin($id){
        $this->db->select('*');
        $this->db->from('tbl_usuarios');
        $conditions=array(
            'id'        => $id,
            'id_roles'  => 1
        );
        $this->db->where($conditions);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    
}
?>