<?php 
class M_Admin extends CI_Model{
    function cek_admin($email, $password){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where(['email'=>$email, 'password'=>md5($password)]);
        return $this->db->get();
    }
}