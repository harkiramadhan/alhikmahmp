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

    function action(){
        $jenis = $this->input->post('jenis', TRUE);
        if($jenis == "tambah"){
            $config['upload_path']      = './assets/home/img/content';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   
                $img = $this->upload->data();  
                $config['image_library']    = 'gd2';  
                $config['source_image']     = './assets/home/img/content/'.$img["file_name"];  
                $config['create_thumb']     = FALSE;  
                $config['maintain_ratio']   = TRUE;  
                $config['quality']          = '80%';  
                $config['width']            = 1000;  
                $config['new_image']        = './assets/home/img/content/'.$img["file_name"];  
                $this->load->library('image_lib', $config);  
                $this->image_lib->resize(); 

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->insert('gallery', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Tambahkan");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata('error', "Berita Gagal Di Tambahkan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "delete"){
            $idgallery = $this->input->post('idgallery', TRUE);
            $getDetail = $this->M_Gallery->get_detailById();
            $get = $this->M_Gallery()->get_byId($idgallery);
            if($getDetail->num_rows() > 0){
                foreach($getDetail->result() as $d){
                    unlink("./assets/home/img/content/".$d->img);
                    $this->db->where('id', $d->id);
                    $this->db->delete('gallery_detail');
                }
            }

            if($get->num_rows() > 0){
                unlink("./assets/home/img/content/".$get->row()->id);
                $this->db->where('id', $get->row()->id);
                $this->db->delete('gallery');
            }

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Berita Berhasil Di Hapus");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

    function modal(){
        $jenis = $this->input->post('type', TRUE);
        $idgallery = $this->input->post('idgallery', TRUE);
        $get = $this->M_Gallery->get_byId($idgallery);
        if($jenis == "show"){

        }elseif($jenis == "delete"){
            if($get->num_rows() > 0){
                $gallery = $get->row();
                ?>
                    <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Hapus Gallery <?= $gallery->judul ?></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <h4 class="heading mt-4">Apakah Anda Yakin Menghapus Semua Foto Gallery</h4>
                                <p><?= $gallery->judul ?></p>
                            </div>
                        </div>
                        <form action="<?= site_url('backend/gallery/action') ?>" method="post">
                        <input type="hidden" name="idberita" value="<?= $idgallery ?>">
                        <input type="hidden" name="jenis" value="delete">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-link text-white" data-dismiss="modal">Tutup</button> 
                            <button type="submit" class="btn btn-sm btn-white ml-auto">Ya, Lanjutkan</button>
                        </div>
                        </form>
                    </div>
                <?php
            }
        }
    }

    // // // AJAX // // //
    function table_list_gallery(){
        $gallery = $this->M_Gallery->get_All()->result();
        ?>
            <?php 
            $no = 1;
            foreach($gallery as $row){ 
                $getDetail = $this->M_Gallery->get_detailById($row->id);
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->judul ?></td>
                    <td class="text-center">
                        <?php if($getDetail->num_rows() > 0){
                            echo $getDetail->num_rows()." Foto";
                        }else{
                            echo " - ";
                        } 
                        ?>
                    </td>
                    <td><?= $row->status ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= site_url('backend/gallery/detail/'.$row->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-default ml-1 lihat_<?= $row->id ?>" id="<?= $row->id ?>">Lihat</button>
                            <button class="btn btn-sm btn-danger  ml-1 hapus_<?= $row->id ?>" id="<?= $row->id ?>">Hapus</button>
                        </div>
                    </td>
                </tr>
                <script>
                <?php 
                    $loader = base_url('assets/home/loader.gif');
                ?>
                $(document).ready(function(){
                    $(".lihat_<?= $row->id ?>").click(function(){
                        var idgallery = this.id;
                        var type = 'show';
                        $.ajax({
                            url: '<?= site_url('backend/gallery/modal') ?>',
                            type: 'post',
                            data: {idgallery : idgallery, type : type},
                            beforeSend: function(){
                                $('#modalLihat').modal('show');
                                $('.isi').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isi').html(html);
                            }
                        });
                    });
                    $(".hapus_<?= $row->id ?>").click(function(){
                        var idgallery = this.id;
                        var type = 'delete';
                        $.ajax({
                            url: '<?= site_url('backend/gallery/modal') ?>',
                            type: 'post',
                            data: {idgallery : idgallery, type : type},
                            beforeSend: function(){
                                $('#modalDelete').modal('show');
                                $('.isiDelete').html("<div class='col-xl-12 text-center'><img src='<?= $loader ?>'></div>");
                            },
                            success: function(html){
                                $('.isiDelete').html(html);
                            }
                        });
                    });
                });
            </script>
            <?php } ?>
        <?php
    }
}