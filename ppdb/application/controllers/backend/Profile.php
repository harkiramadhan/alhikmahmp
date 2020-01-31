<?php
class Profile extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['sekolah'] = $this->M_Admin->get_dataSekolah();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/profile');
        $this->load->view('admin/footer');
    }
}