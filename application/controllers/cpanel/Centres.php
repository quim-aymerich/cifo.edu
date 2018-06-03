<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Centres extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        //Carreguem el model "application/model/User_model"
        $this->load->model('user_model');
        
        // Si la variable de sessió no existeis redirigeix al mètode "cpanel/login"
        if(! $this->session->userdata('user')){
            redirect('/cpanel/login');exit;
        }
        // Si l'usuari no te el rol d'adminiatrdor
        if(! $this->user_model->is_admin($this->session->userdata('user')['id'])){
            redirect('/cpanel/login');exit;
        }
        //Carreguem el model "application/model/Centres_model"
        
        $this->output->set_template('cpanel/default');
        
        $data=array(
            'name' => $this->session->userdata('user')['nombre'].' '.$this->session->userdata('user')['apellidos'],
            'foto' => $this->session->userdata('user')['foto']
        );
        
        
        // Secció barra superior
        $this->load->section('top_navigation', 'sections/cpanel/top_navigation' , $data);
        // Secció menú vertical esquerra
        $this->load->section('left_navigation', 'sections/cpanel/left_navigation' , $data);
    
    }
    
    public function index(){
        // Titol de la plantilla
        $this->output->set_title('Centres - Cpanel - Cifo');
        $this->load->view('cpanel/centres/centres_index');
        
    }
}