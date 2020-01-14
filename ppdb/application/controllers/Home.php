<?php
class Home extends CI_Controller{
    function index(){
        $var['jenjang'] = "SDIT AL-HIKMAH";
        // $var['slider'] =
        // $var['bg'] =
        
        $this->load->view('home/layout/header');
        $this->load->view('home/home', $var);
        $this->load->view('home/layout/footer');
    }
}