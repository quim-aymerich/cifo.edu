<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Carga el "municipio_model" en el controller
        $this->load->model('municipio_model');
    }
    
    public function index($page=0){
        
        if(   $this->input->method(TRUE)=='POST'   ){
            //echo "aqui entramos por POST"; exit;
            // Capturar variable $_POST['per_page']
            $per_page = $this->input->post('per_page');
            
        }
        if( isset($per_page)) {
            $_SESSION['per_page']=$per_page;
        }elseif( ! isset( $_SESSION['per_page'] )  ){
            $_SESSION['per_page']=20;
        }
        // Num total de registros
         $total= count(   $this->municipio_model->getAll()  );
        
        $rsMunicipios=$this->municipio_model->getAll($_SESSION['per_page'],$page);
        
        $this->load->library('pagination');
        
        $config['base_url']     = '/municipio/index/';
        $config['total_rows']   = $total;
        $config['per_page']     = $_SESSION['per_page'];
        // inicializar parametros de la libreria de paginacion
        $this->pagination->initialize($config);
        // Crear los enlaces
        $pagination= $this->pagination->create_links();
        
        $por_page=(isset($_SESSION['per_page']))? $_SESSION['per_page'] : 20 ;
        
        $data=array(
            'rsMunicipios'      => $rsMunicipios,
            'pagination'        => $pagination,
            'por_page'          => $por_page
        );
        $this->load->view('municipio/municipio_index',$data);
    }
}