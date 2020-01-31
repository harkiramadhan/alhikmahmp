<?php
class Dashboard extends CI_Controller{
    function index(){
        $data['title'] = "Dashboard Admin Al Hikmah";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }
}