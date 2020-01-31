<?php
class Admin extends CI_Controller{
    function index(){
        $this->load->view('admin/login');
    }

    function auth(){
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));

        $cek = $this->M_Admin->cek_userAdmin($username, $password);
        if($cek->num_rows() > 0){
            $data = $cek->row();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('email', $data->email);
            $this->session->set_userdata('role', $data->role);

            redirect('dashboard');
        }else{
            $this->session->set_flashdata('error', "Username Atau Password Salah");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function logout(){
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}