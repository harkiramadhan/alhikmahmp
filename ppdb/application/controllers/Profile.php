<?php
class Profile extends CI_Controller{
    private function sekolah(){
        $get = $this->db->get('sekolah');
        return $get->row();
    }

    function index(){
        $var['nama'] = $this->sekolah()->nama;
        $var['sejarah'] = $this->sekolah()->sejarah;
        $var['visi'] = $this->sekolah()->visi;
        $var['misi'] = $this->sekolah()->misi;
        $var['tujuan'] = $this->sekolah()->tujuan;
        $var['motto'] = $this->sekolah()->motto;
        $var['kurikulum'] = $this->sekolah()->kurikulum;

        $this->load->view('home/layout/header');
        $this->load->view('home/profile');
        $this->load->view('home/layout/footer');
    }
}