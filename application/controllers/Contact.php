<?php defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller{

    function __construct() {
        parent::__construct();    
    }
    public function index(){
       
       $this->load->library('form_validation');
       $this->form_validation->set_rules('name', 'Nombre', 'required');
       $this->form_validation->set_rules('email', 'Dir.Correo', 'required|valid_email');
       $this->form_validation->set_rules('subject', 'Asunto', 'required');
       $this->form_validation->set_rules('message', 'Mensaje', 'required');
       $this->form_validation->set_rules('captcha', 'Codigo de imagen', 'required|callback_captcha_check');
       
       if( $this->form_validation->run()  ){    
           
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
           
           if ($this->email->send()) {
               $this->session->set_flashdata('success_msg', 'El mensaje se envio correctamente');
               redirect('/contact');
           } else {
               echo $this->email->print_debugger(); exit;
               //$this->session->set_flashdata('error_msg','Disculpas, No ha sido posible enviar el mensaje, pruebe más tarde !');
               
           }
           
           
           
       }
       
       $this->load->helper('captcha');
       $captcha_conf = array(
           'img_path'       => 'assets/media/captcha/',
           'img_url'        => base_url().'assets/media/captcha',
           'img_width'      => 150,
           'img_height'     => 50,
           'word_length'    => 8,
           'font_size'      => 16,
           'expiration'     => 1
           
        );
       $captcha=create_captcha($captcha_conf);
       
       $this->session->unset_userdata('captchaCode');
       $this->session->set_userdata('captchaCode', $captcha['word']);
       
       $data['captcha_image'] = $captcha['image'];
       $this->load->view('contact/contact_index',$data);
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