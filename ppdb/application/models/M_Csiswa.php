<?php
class M_Csiswa extends CI_Model{
    function cek_NikEmail($email, $nik){
        $this->db->select('*');
        $this->db->from('csiswa');
        $this->db->where(['email'=>$email, 'nik'=>$nik]);
        return $this->db->get();
    }

    function get_byId($idcsiswa){
        $this->db->select('csiswa.*, kewarganegaraan.short, kewarganegaraan.kwn kkwn');
        $this->db->from('csiswa');
        $this->db->join('kewarganegaraan', 'csiswa.kwn = kewarganegaraan.id');
        $this->db->where(['csiswa.id'=>$idcsiswa]);
        return $this->db->get()->row();
    }
}