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
        $data['title'] = "Berita - Al Hikmah";
        $data['nama'] = $this->session('email');

        $this->load->view('admin/header', $data);
        $this->load->view('admin/berita');
        $this->load->view('admin/footer');
    }

    function tambah(){
        $data['title'] = "Tambah Berita - Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Berita->get_AllLabel();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/tambah_berita');
        $this->load->view('admin/footer');
    }

    function detail($id){
        $data['title'] = "Detail Berita - Al Hikmah";
        $data['nama'] = $this->session('email');
        $data['label'] = $this->M_Berita->get_AllLabel();

        $data['berita'] = $this->M_Berita->get_byId($id)->row();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/detail_berita');
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
                    'konten' => $this->input->post('konten', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->insert('berita', $data);
                if($this->db->affected_rows() > 0){
                    $idberita = $this->db->insert_id();
                    $label = $this->input->post('idl[]', TRUE);
                    foreach($label as $l){
                        $dataLabel = [
                            'id_berita' => $idberita,
                            'id_label' => $l
                        ];

                        $this->db->insert('label_berita', $dataLabel);
                    }

                    $this->session->set_flashdata('sukses', "Berita Berhasil Di Tambahkan");
                    redirect('backend/berita');
                }
            }
        }elseif($jenis == "edit"){
            $idberita = $this->input->post('idberita', TRUE);
            
            $config['upload_path']      = './assets/home/img/content';  
            $config['allowed_types']    = 'jpg|jpeg|png|gif'; 
            $config ['encrypt_name']    = TRUE;
            $this->load->library('upload', $config);  
            if($this->upload->do_upload('img')){   
                $cek = $this->db->get_where('berita', ['id'=>$idberita]);

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

                unlink(".assets/home/img/content/$cek->img");

                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'konten' => $this->input->post('konten', TRUE),
                    'img' => $img["file_name"]
                ];

                $this->db->where('id', $idberita);
                $this->db->update('berita', $data);
                
                $this->db->where('id_berita', $idberita);
                $this->db->delete('label_berita');

                $label = $this->input->post('idl[]', TRUE);
                foreach($label as $l){
                    $dataLabel = [
                        'id_berita' => $idberita,
                        'id_label' => $l
                    ];

                    $this->db->insert('label_berita', $dataLabel);
                }

                $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                redirect('backend/berita');

            }else{
                $data = [
                    'judul' => $this->input->post('judul', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'konten' => $this->input->post('konten', TRUE)
                ];
                
                $this->db->where('id', $idberita);
                $this->db->update('berita', $data);
                
                $this->db->where('id_berita', $idberita);
                $this->db->delete('label_berita');

                $label = $this->input->post('idl[]', TRUE);
                foreach($label as $l){
                    $dataLabel = [
                        'id_berita' => $idberita,
                        'id_label' => $l
                    ];

                    $this->db->insert('label_berita', $dataLabel);
                }

                $this->session->set_flashdata('sukses', "Berita Berhasil Di Edit");
                redirect('backend/berita');
                
            }
        }elseif($jenis == "delete"){
            $idberita = $this->input->post('idberita', TRUE);
            $this->db->where('id', $idberita);
            $this->db->delete('berita');
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Berita Berhasil Di Hapus");
                redirect('backend/berita');
            }
        }
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
                        <a href="<?= site_url('backend/berita/detail/'.$row->id) ?>" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-default ml-1 lihat_<?= $row->id ?>" id="<?= $row->id ?>">Lihat</button>
                        <button class="btn btn-sm btn-danger  ml-1">Hapus</button>
                    </div>
                </td>
            </tr>
            <script>
                $(document).ready(function(){
                    $(".lihat_<?= $row->id ?>").click(function(){
                        var idberita = this.id;
                        alert(idberita);
                    });
                });
            </script>
            <?php } ?>
        <?php
    }
}