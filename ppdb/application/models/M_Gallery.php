<?php
class M_Gallery extends CI_Model{
    function get_AllGallery(){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where(['status'=>"published"]);
        return $this->db->get();
    }
}