<?php
class Biodata extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        $this->load->model('M_General');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function idcsiswa(){
        $idcsiswa = $this->session->userdata('idcsiswa');
        return $idcsiswa;
    }

    function anak(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_anak');
        $this->load->view('layout/footer');
    }

    function ortu(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());
        $data['pendidikan'] = $this->M_General->get_pendidikan()->result();
        $data['tempat_tinggal'] = $this->M_General->get_tempat_tinggal()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_ortu');
        $this->load->view('layout/footer');
    }
}