<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
    }

    function auth(){
        $email = $this->input->post('email', TRUE);
        $nik = $this->input->post('password', TRUE);
        $cek = $this->M_Csiswa->cek_NikEmail($email, $nik);

        if($cek->num_rows() > 0){
            $data = $cek->row();

            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('email', $data->email);
            $this->session->set_userdata('nik', $data->nik);
            $this->session->set_userdata('nama', $data->nama);

            redirect('dashboard');
        }else{
            $this->session->set_flashdata('error', "Email atau Password Salah");
            redirect('ppdb');
        }
    }

    function logout(){

    }
}