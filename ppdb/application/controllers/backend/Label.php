<?php
class Label extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Label');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Label->get_AllLabel()->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/label');
        $this->load->view('admin/footer');
    }
}