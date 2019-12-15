<?php
class Document extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function idcsiswa(){
        $idcsiswa = $this->session->userdata('idcsiswa');
        return $idcsiswa;
    }

    function index(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());

        $this->load->view('layout/header', $data);
        $this->load->view('inner/document', $data);
        $this->load->view('layout/footer');
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);

        $config['upload_path']      = './upload/img';
        $config['allowed_types']    = 'jpeg|jpg|png';
        $config['remove_spaces']    = TRUE;
        $config['file_name']        = $jenis."_".$this->idcsiswa();
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);
        $this->upload->do_upload('img');

        $upload_data = $this->upload->data();
        $fileImport = $upload_data['file_name'];
        
        if(!$this->upload->do_upload('img')){
            $this->session->set_flashdata('error', "File Belum Di Pilih");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            
            if($jenis == "anak"){
                $idstep = 9;
            }elseif($jenis == "ktp"){
                $idstep = 10;
            }elseif($jenis == "kk"){
                $idstep = 11;
            }elseif($jenis == "akta"){
                $idstep = 12;
            }

            $cek = $this->db->get_where('cdocument', [
                'idcsiswa' => $this->idcsiswa(),
                'jenis' => $jenis,
                ]);
            $cek2 = $this->db->get_where('bstep', ['idcsiswa'=> $this->idcsiswa(), 'idstep'=>$idstep]);

                
            $data = [
                'idcsiswa' => $this->idcsiswa(),
                'jenis' => $jenis,
                'img' => $fileImport
            ];

            $data2 = [
                'idcsiswa' => $this->idcsiswa(),
                'idstep' => $idstep
            ];

            if($cek->num_rows() > 0){
                $this->db->where('id', $cek->row()->id);
                $this->db->update('cdocument', $data);

                if($this->db->affected_rows() > 0){
                    if($cek->num_rows() > 0){
                        $this->db->where('id', $cek2->row()->id);
                        $this->db->update('bstep', $data2);
                    }else{
                        $this->db->insert('bstep', $data2);
                    }
                }
                $this->session->set_flashdata('sukses', "Dokumen Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->db->insert('cdocument', $data);

                if($this->db->affected_rows() > 0){
                    if($cek->num_rows() > 0){
                        $this->db->where('id', $cek2->row()->id);
                        $this->db->update('bstep', $data2);
                    }else{
                        $this->db->insert('bstep', $data2);
                    }
                }
                $this->session->set_flashdata('sukses', "Dokumen Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}