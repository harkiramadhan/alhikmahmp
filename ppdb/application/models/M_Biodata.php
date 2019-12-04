<?php
class M_Biodata extends CI_Model{
    function cek_ortu($jenis, $idcsiswa){
        $this->db->select('bcortu.*, tempat_tinggal.tempat');
        $this->db->from('bcortu');
        $this->db->join('csiswa', 'bcortu.idcsiswa = csiswa.id');
        $this->db->join('tempat_tinggal', 'bcortu.idtempat = tempat_tinggal.id');
        $this->db->join('pendidikan', 'bcortu.idpendidikan = pendidikan.id');
        $this->db->join('pekerjaan', 'bcortu.idpekerjaan = pekerjaan.id');
        $this->db->join('penghasilan', 'bcortu.idpenghasilan = penghasilan.id');
        $this->db->where(['bcortu.idcsiswa'=>$idcsiswa, 'bcortu.jenis'=>$jenis]);
        return $this->db->get();
    }
}