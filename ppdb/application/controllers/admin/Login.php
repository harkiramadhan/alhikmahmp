<?php
class Login extends CI_Controller{
    function index(){

    }

    function auth(){
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
    }
}