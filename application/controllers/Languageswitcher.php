<?php
if (! defined('BASEPATH'))  exit('No direct script access allowed');

class LanguageSwitcher extends CI_Controller{

    public function __construct() {
        parent::__construct();
    }

    function switchLang($language = "") {
        $language = ($language != "") ? $language : "catalan";
        
        $this->session->set_userdata('site_lang', $language);
        switch ($language) {
            case 'catalan':
                $this->session->set_userdata('prefix_lang', 'ca');
                break;
            case 'spanish':
                $this->session->set_userdata('prefix_lang', 'es');
                break;
            case 'english':
                $this->session->set_userdata('prefix_lang', 'en');
                break;
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>