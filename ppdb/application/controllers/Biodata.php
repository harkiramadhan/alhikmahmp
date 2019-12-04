<?php
class Biodata extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        $this->load->model('M_General');
        $this->load->model('M_Biodata');
        if($this->session->userdata('masuk') != TRUE){
            $url = base_url();
            redirect($url);
        }
    }

    private function idcsiswa(){
        $idcsiswa = $this->session->userdata('idcsiswa');
        return $idcsiswa;
    }

    function anak(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_anak');
        $this->load->view('layout/footer');
    }

    function ortu(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());
        $data['pendidikan'] = $this->M_General->get_pendidikan()->result();
        $data['tempat_tinggal'] = $this->M_General->get_tempat_tinggal()->result();
        $data['pekerjaan'] = $this->M_General->get_pekerjaan()->result();
        $data['penghasilan'] = $this->M_General->get_penghasilan()->result();
        $data['cekayah'] = $this->M_Biodata->cek_ortu('ayah', $this->idcsiswa());

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_ortu');
        $this->load->view('layout/footer');
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);

        if($jenis == "anak"){

        }else{
            $cek = $this->M_Biodata->cek_ortu($jenis, $this->idcsiswa());

            $data = [
                'idcsiswa' => $this->idcsiswa(),
                'jenis' => $jenis,
                'nama' => $this->input->post('nama', TRUE),
                'nik' => $this->input->post('nik', TRUE),
                'tl' => $this->input->post('tl', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'idtempat' => $this->input->post('idtempat', TRUE),
                'idpendidikan' => $this->input->post('idpendidikan', TRUE),
                'gelar' => $this->input->post('gelar', TRUE),
                'idpekerjaan' => $this->input->post('idpekerjaan', TRUE),
                'alamat_pekerjaan' => htmlspecialchars($this->input->post('alamat_pekerjaan', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'idpenghasilan' => $this->input->post('idpenghasilan', TRUE)
            ];

            if($cek->num_rows() > 0){
                $this->db->where('id', $cek->row()->id);
                $this->db->update('bcortu', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Biodata".$jenis." Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('error', "Biodata ".$jenis." Gagal Di Simpan, Silahkan Coba Lagi");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->db->insert('bcortu', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Biodata".$jenis." Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('error', "Biodata ".$jenis." Gagal Di Simpan, Silahkan Coba Lagi");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }
}