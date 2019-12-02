<?php
class M_Csiswa extends CI_Model{
    function cek_NikEmail($email, $nik){
        $this->db->select('*');
        $this->db->from('csiswa');
        $this->db->where(['email'=>$email, 'nik'=>$nik]);
        return $this->db->get();
    }
}