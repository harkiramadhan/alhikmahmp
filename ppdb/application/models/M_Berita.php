<?php
class M_Berita extends CI_Model{
    function get_AllBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        return $this->db->get();
    }
}