<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        //Carreguem el model "application/model/User_model"
        $this->load->model('user_model');
    }
    
    public function index(){
        // Si la variable de sessió no existeis redirigeix al mètode "cpanel/login"
        if(! $this->session->userdata('user')){
            redirect('/cpanel/login');exit;
        }
        // Si l'usuari no te el rol d'adminiatrdor
        if(! $this->user_model->is_admin($this->session->userdata('user')['id'])){
            redirect('/cpanel/login');exit;
        }
        
        $this->output->set_template('cpanel/default');
        
        $data=array(
            'name' => $this->session->userdata('user')['nombre'].' '.$this->session->userdata('user')['apellidos'],
            'foto' => $this->session->userdata('user')['foto']
        );
        
        // Titol de la plantilla
        $this->output->set_title('Cpanel - Cifo');
        // Secció barra superior
        $this->load->section('top_navigation', 'sections/cpanel/top_navigation' , $data);
        // Secció menú vertical esquerra
        $this->load->section('left_navigation', 'sections/cpanel/left_navigation' , $data);
        
        $data['heading']    = "Benvinguts al Site de CIFO!";
        $this->load->view('cpanel/main_index', $data);
    }
    
    public function logout(){
        
        $this->output->unset_template();
        $this->session->unset_userdata('user', $user);
        redirect('/cpanel/login'); 
    }
    
    public function login(){
        
        if($this->input->method(TRUE)=='POST'){
            
            $email      =$this->input->post('email');
            $password   =$this->input->post('password');
            
            if($user=$this->user_model->login($email,$password)){
                if($this->user_model->is_admin($user['id'])){
                    $this->session->set_userdata('user', $user);
                    redirect('/cpanel/'); exit;
                }else{
                    $this->session->set_flashdata('error_msg', 'no disposes de privilegis suficients.');
                    redirect('/cpanel/login'); exit;
                }
                
                
            }else{
                $this->session->set_flashdata('error_msg', 'Direcció de correu o contrasenya errònea.');
                redirect('/cpanel/login'); exit;
            }
        }else{
            $this->output->set_template('cpanel/simple');
        
            $this->load->view('cpanel/main_login');
        }
        
        
        
    }
    
}
?>