<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->output->set_template('site/default');
       
    }
    
    public function index(){
        
        //Delete the last Captcha created
        if(is_file($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg')){
            unlink($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg');
        }
        
        if($this->input->method(TRUE)=='POST'){
            
            $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            
            $this->form_validation->set_rules('name',   'Nombre',   'required');
            $this->form_validation->set_rules('email',  'Email',    'required|valid_email');
            $this->form_validation->set_rules('subject','Asunto',   'required');
            $this->form_validation->set_rules('message','Mensaje',   'required');
            $this->form_validation->set_rules('captcha','Código de la imagen',   'required|callback_captcha_check');
            
            
            if ($this->form_validation->run() == TRUE){
                // Load email library and passing configured values to email library
                $this->load->library('email');
                // Sender email address
                $this->email->from($this->input->post('email'), $this->input->post('name'));
                // Receiver email address
                $this->email->to('quim.aymerich@gmail.com');
                // Subject of email
                $this->email->subject($this->input->post('subject'));
                // Message in email
                $this->email->message($this->input->post('message'));
                //$this->email->print_debugger();
                if ($this->email->send()) {
                    $data['success_msg']= 'Correo enviado correctamente !';
                    $this->form_validation->clear_field_data();
                } else {
                   $data['error_msg']='Disculpas, No ha sido posible enviar el mensaje, pruebe mas tarde !';
                    
                }
            }
            
        }
        
        $this->load->helper('captcha');
        // Titol de la plantilla
        $this->output->set_title( 'Conatct | Cifo');
        // Secció de META
        $this->output->set_meta('description','Web de Formació dels Cifo\'s');
        $this->output->set_meta('keywords','Internet, web, formació, gratuït');
        // Secció barra superior
        $this->load->section('navigation', 'sections/site/main_navigation' );
        // Secció barra superior
        $this->load->section('footer', 'sections/site/main_footer' );
        // Arxius de Script per la vista
        $this->load->js('/assets/site/js/contact.js');
        // Arxius de CSS per la vista
        $this->load->css('/assets/site/css/contact.css');
        
        // Captcha configuration
        $config = array(
            'img_path'      => 'assets/media/captcha/',
            'img_url'       => base_url().'assets/media/captcha',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->unset_userdata('captchaTime');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        $this->session->set_userdata('captchaTime', $captcha['time']);
        
        // Send captcha image to view
        $data['captchaImg'] = $captcha['image'];
        
        $this->load->view('contact/contact_index',$data);
        
    }
    
    public function refresh(){
        
        $this->output->unset_template('site/default');
        
        $this->load->helper('captcha');
        // Captcha configuration
        $config = array(
            'img_path'      => 'assets/media/captcha/',
            'img_url'       => base_url().'assets/media/captcha',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 16
        );
        $captcha = create_captcha($config);
        if(is_file($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg')){
            unlink($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg');
        }
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->unset_userdata('captchaTime');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        $this->session->set_userdata('captchaTime', $captcha['time']);
        
        // Display captcha image
        echo $captcha['image'];
    }
    
    
    public function captcha_check($userCaptcha=''){
        $wordCaptcha = $this->session->userdata('captchaCode');
            
        if (strcmp(strtoupper($userCaptcha),strtoupper($wordCaptcha)) != 0) {
            $this->form_validation->set_message('captcha_check', 'El camp de captcha no és vàlid' );
            return FALSE;
        } else {
            return TRUE;
        }
        
    }
    
    
}