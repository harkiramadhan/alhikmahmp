<?php 
class M_General extends CI_Model{
    function get_pendidikan(){
        $this->db->select('*');
        $this->db->from('pendidikan');
        return $this->db->get();
    }

    function get_tempat_tinggal(){
        $this->db->select('*');
        $this->db->from('tempat_tinggal');
        return $this->db->get();
    }
}