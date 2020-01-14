<?php
class Profile extends CI_Controller{
    function index(){
        $this->load->view('home/layout/header');
        $this->load->view('home/profile');
        $this->load->view('home/layout/footer');
    }
}