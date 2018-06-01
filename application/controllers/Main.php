<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->output->set_template('site/default');
    }

    public function index()
    {
        // Titol de la plantilla
        $this->output->set_title('Cifo');
        // Secció de META
        $this->output->set_meta('description', 'Web de Formació dels Cifo\'s');
        $this->output->set_meta('keywords', 'Internet, web, formació, gratuït');
        // Secció barra superior
        $this->load->section('navigation', 'sections/site/main_navigation');
        // Secció barra superior
        $this->load->section('footer', 'sections/site/main_footer');
        // Arxius de Script per la vista
        $this->load->js('/assets/site/js/main.js');
        // Preparem la vista
        $data['heading'] = "Pàgina d'inici del CIFO!";
        $this->load->view('main/main_index', $data);
    }
}
?>
