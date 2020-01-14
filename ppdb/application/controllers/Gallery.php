<?php
class Gallery extends CI_Controller{
    function index(){
        $this->load->view('home/layout/header');
        $this->load->view('home/gallery');
        $this->load->view('home/layout/footer');
    }
}