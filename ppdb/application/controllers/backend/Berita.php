<?php
class Berita extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Admin');
        $this->load->model('M_Berita');
        $this->load->model('M_Label');
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
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/berita');
        $this->load->view('admin/footer');
    }

    function tambah(){
        $data['title'] = "Dashboard Admin Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Berita->get_AllLabel();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/tambah_berita');
        $this->load->view('admin/footer');
    }

    // // // AJAX // // //
    function table_list_berita(){
        $berita = $this->M_Berita->get_All()->result();
        ?>
            <?php 
            $no = 1;
            foreach($berita as $row){ 
            $getLabel = $this->M_Berita->get_LabelByBerita($row->id);    
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?php if($getLabel->num_rows() > 0): ?>
                        <?php foreach($getLabel->result() as $l){ ?>
                            <span class="badge <?= $l->badge ?> mr-1"><?= $l->label ?></span>
                        <?php } ?>
                    <?php endif; ?>
                </td>
                <td><?= $row->judul ?></td>
                <td><?= $row->status ?></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-danger">Hapus</button>
                        <button class="btn btn-sm btn-primary ml-1">Detail</button>
                    </div>
                </td>
            </tr>
            <?php } ?>
        <?php
    }
}