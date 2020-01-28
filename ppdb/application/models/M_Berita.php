<?php
class M_Berita extends CI_Model{
    function get_AllBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where(['status'=>"published"]);
        $this->db->order_by('id', "DESC");
        return $this->db->get();
    }

    function get_LabelByBerita($idberita){
        $this->db->select('label.label');
        $this->db->from('label_berita');
        $this->db->join('berita', "label_berita.id_berita = berita.id");
        $this->db->where(['label_berita.id_berita'=>$idberita]);
        return $this->db->get();
    }
}