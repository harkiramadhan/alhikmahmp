<?php
class Gallery extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Gallery');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function session($jenis){
        $sess = $this->session->userdata($jenis);
        return $sess;
    }

    function index(){
        $data['title'] = "Gallery - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/gallery');
        $this->load->view('admin/footer');
    }

    // // // AJAX // // //
    function table_list_gallery(){
        $gallery = $this->M_Gallery->get_AllGallery()->result();
        ?>
            <?php 
            $no = 1;
            foreach($gallery as $row){ ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->judul ?></td>
                    <td></td>
                    <td><?= $row->status ?></td>
                    <td></td>
                </tr>
            <?php } ?>
        <?php
    }
}