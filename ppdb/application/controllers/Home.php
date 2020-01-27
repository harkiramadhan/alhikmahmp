<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
    }

    private function sekolah(){
        $get = $this->db->get('sekolah');
        return $get->row();
    }

    function index(){
        $var['nama'] = $this->sekolah()->nama;
        $var['slider'] = $this->M_Sekolah->get_img("slider");
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        
        $this->load->view('home/layout/header');
        $this->load->view('home/home', $var);
        $this->load->view('home/layout/footer');
    }

    // AJAX
    function get_berita(){

    }

    function get_gallery(){

    }
}