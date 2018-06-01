<?php

class LanguageLoader{

    function initialize(){
        $ci = & get_instance();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('site', $siteLang);
            $ci->config->set_item('language', $siteLang);
        } else {
            $ci->config->set_item('language', 'catalan');
            $ci->lang->load('site', 'catalan');
            $ci->session->set_userdata('site_lang', 'catalan');
            $ci->session->set_userdata('prefix_lang', 'ca');
        }
    }
}
?>