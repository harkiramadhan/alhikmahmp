<?php
class Csiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        if($this->session->userdata('role') != TRUE){
            redirect('dashboard');
        }
    }
    function index(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['email'] = $this->session->userdata('email');
        $data['daftar'] = $this->M_Csiswa->get_allCsiswa()->num_rows();
        $data['konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> "done"])->num_rows();
        $data['belum_konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> NULL])->num_rows();

        $this->load->view('layout/header_admin', $data);
        $this->load->view('inner/daftar_csiswa', $data);
        $this->load->view('layout/footer_admin', $data);
    }
}