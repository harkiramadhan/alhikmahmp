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
        $data['kewarganegaraan'] = $this->M_General->get_Allkewarganegaraan()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_anak');
        $this->load->view('layout/footer');
    }

    function ortu(){
        $data['title'] = "PPDB Online Al Hikmah";
        $data['anak'] = $this->M_Csiswa->get_byId($this->idcsiswa());
        $data['pendidikan'] = $this->M_General->get_pendidikan()->result();
        $data['tempat_tinggal'] = $this->M_General->get_tempat_tinggal()->result();
        $data['pekerjaan'] = $this->M_General->get_pekerjaan()->result();
        $data['penghasilan'] = $this->M_General->get_penghasilan()->result();
        $data['cekayah'] = $this->M_Biodata->cek_ortu('ayah', $this->idcsiswa());
        $data['cekibu'] = $this->M_Biodata->cek_ortu('ibu', $this->idcsiswa());
        $data['cekwali'] = $this->M_Biodata->cek_ortu('wali', $this->idcsiswa());

        $this->load->view('layout/header', $data);
        $this->load->view('inner/bio_ortu');
        $this->load->view('layout/footer');
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);

        if($jenis == "anak1"){
            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'nama_panggil' => $this->input->post('nama_panggil', TRUE),
                'jenkel' => $this->input->post('jenkel', TRUE),
                'tl' => $this->input->post('tl', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'hobi' => $this->input->post('hobi', TRUE),
                'cita' => $this->input->post('cita', TRUE),
                'bahasa' => $this->input->post('bahasa', TRUE),
                'kwn' => $this->input->post('kwn', TRUE),
                'anak_ke' => $this->input->post('anak_ke', TRUE),
                'kakak' => $this->input->post('kakak', TRUE),
                'adik' => $this->input->post('adik', TRUE),
                'tiri' => $this->input->post('tiri', TRUE),
                'angkat' => $this->input->post('angkat', TRUE),
            ];
            $this->db->where('id', $this->idcsiswa());
            $this->db->update('csiswa', $data);

            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('sukses', "Data Diri ".$this->input->post('nama', TRUE)." Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Data Diri ".$this->input->post('nama', TRUE)." Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "anak2"){
            $data = [
                'bb' => $this->input->post('bb', TRUE),
                'tb' => $this->input->post('tb', TRUE),
                'lk' => $this->input->post('lk', TRUE),
                'goldar' => $this->input->post('goldar', TRUE),
                'penyakit' => $this->input->post('penyakit', TRUE),
            ];
            $this->db->where('id', $this->idcsiswa());
            $this->db->update('csiswa', $data);

            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('sukses', "Jasmani ".$this->input->post('nama', TRUE)." Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Jasmani ".$this->input->post('nama', TRUE)." Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }elseif($jenis == "sekolah"){
            $data = [
                'npsn' => $this->input->post('npsn', TRUE),
                'asal_sekolah' => $this->input->post('asal_sekolah', TRUE),
                'alamat_asalsekolah' => $this->input->post('alamat_asalsekolah', TRUE),
                'lama_belajar' => $this->input->post('lama_belajar', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'tanggal_pindah' => $this->input->post('tanggal_pindah', TRUE),
                'jenis' => $this->input->post('jenis_siswa', TRUE)
            ];
            
            $this->db->where('id', $this->idcsiswa());
            $this->db->update('csiswa', $data);

            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('sukses', "Data Sekolah Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                $this->session->set_flashdata('error', "Data Sekolah Gagal Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
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
                    $this->session->set_flashdata('sukses', "Biodata ".$jenis." Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('error', "Biodata ".$jenis." Gagal Di Simpan, Silahkan Coba Lagi");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->db->insert('bcortu', $data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('sukses', "Biodata ".$jenis." Berhasil Di Simpan");
                    redirect($_SERVER['HTTP_REFERER']);
                }else{
                    $this->session->set_flashdata('error', "Biodata ".$jenis." Gagal Di Simpan, Silahkan Coba Lagi");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
    }
}