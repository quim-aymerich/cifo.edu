<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
    }
    
    public function login(){
        
        if($this->input->method(TRUE)=='POST'){
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
           
            if($user=$this->user_model->login($email,$password)){
                $this->session->set_userdata('user', $user);
                redirect('/'); exit; 
            }else{
               $this->session->set_flashdata('error_msg', $this->lang->line('Controllers_User_Login_Error'));
               redirect('/user/login'); exit;
            }
        }else{
        
            $this->output->set_template('site/simple');
            // Titol de la plantilla
            $this->output->set_title( 'Login | Cifo ');
            // Secció de META
            $this->output->set_meta('description','Inici de sessió');
            $this->output->set_meta('keywords','Internet, web, formació, gratuït');
            // Arxius de CSS per la vista
            $this->load->css('/assets/site/css/login.css');
            // Preparem la vista
            $this->load->view('user/login');
        }
    }
    
    public function logout(){
        $this->session->unset_userdata('user');
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function register(){
        //Delete the last Captcha created 
        if(is_file($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg')){
            unlink($_SERVER['DOCUMENT_ROOT'].'/assets/media/captcha/'.$this->session->userdata('captchaTime').'.jpg');
        }
        if($this->input->method(TRUE)=='POST'){
            // Comprovavión de Email duplicado
            if(  !$this->user_model->email_check($this->input->post('email'))){
                $this->session->set_flashdata('error_msg', $this->lang->line('Controllers_User_Register_EmailError'));
                redirect('/user/register');
                exit;
            }
            //Comprobación de contrasenyas
            if(   $this->input->post('password')!=$this->input->post('repassword')  ){
                $this->session->set_flashdata('error_msg', $this->lang->line('Controllers_User_Register_PasswordError'));
                redirect('/user/register');
                exit;
            }
            // Comprobación de Captcha
            if(   $this->input->post('captcha')!=$this->session->userdata('captchaCode')    ){
                $this->session->set_flashdata('error_msg', $this->lang->line('Controllers_User_Register_CaptchaError'));
                redirect('/user/register');
                exit;
            }
            // Prepare register.
            $data= array(
                'nombre'    => $this->input->post('nombre'      ,TRUE),
                'apellidos' => $this->input->post('apellidos'   ,TRUE),
                'email'     => $this->input->post('email'       ,TRUE),
                'password'  => $this->input->post('password'    ,TRUE),
                'id_roles'  => 3,
                'id_municipios' => 881
            );
            $id=$this->user_model->register($data);
            $this->session->set_flashdata('success_msg', $this->lang->line('Controllers_User_Register_Success'));
            redirect('/user/login');
        }else{
            $this->load->helper('captcha');
            
            $this->output->set_template('site/simple');
            // Titol de la plantilla
            $this->output->set_title( 'Register | Cifo ');
            // Secció de META
            $this->output->set_meta('description','Registre de Cifo');
            $this->output->set_meta('keywords','Internet, web, formació, gratuït');
            // Arxius de CSS per la vista
            $this->load->css('/assets/site/css/register.css');
        
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
            // Preparem la vista
            $this->load->view('user/register',$data);
        }
    }
    
    public function refresh(){
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
    
}
?>