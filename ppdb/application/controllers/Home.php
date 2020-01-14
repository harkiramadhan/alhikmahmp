<?php
class Home extends CI_Controller{
    function index(){
        $this->load->view('home/layout/header');
        $this->load->view('home/home');
        $this->load->view('home/layout/footer');
    }

    function kontak(){
        $this->load->view('home/layout/header');
        $this->load->view('home/kontak');
        $this->load->view('home/layout/footer');
    }
}