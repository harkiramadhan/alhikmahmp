<?php
class Profile extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){

    }
}