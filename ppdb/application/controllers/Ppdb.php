<?php 
class Ppdb extends CI_Controller{
    function index(){
        $this->load->view('ppdb');
    }

    function regis(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('nama_panggil', 'Nama Panggilan', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('kwn', 'Kewarganegaraan', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('tl', 'Tanggal Lahir', 'required', array('required' => '%s Wajib Di Isi'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array('required' => '%s Wajib Di Isi'));

        $nik = $this->input->post('nik', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $nama_panggil = $this->input->post('nama_panggil', TRUE);
        $jenkel = $this->input->post('jenkel', TRUE);
        $kwn = $this->input->post('kwn', TRUE);
        $tl = $this->input->post('tl', TRUE);
        $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
        $email = $this->input->post('email', TRUE);

        if ($this->form_validation->run() == FALSE){ 
            $error = strip_tags(validation_errors());
            $this->session->set_flashdata('error', $error);
            // redirect('ppdb');
            $this->load->view('ppdb');
        }
        else{
            $data = [
                'nik' => $this->input->post('nik', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'nama_panggil' => $this->input->post('nama_panggil', TRUE),
                'jenkel' => $this->input->post('jenkel', TRUE),
                'kwn' => $this->input->post('kwn', TRUE),
                'tl' => $this->input->post('tl', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'email' => $this->input->post('email', TRUE),
            ];

            $this->db->insert('csiswa', $data);

            if($this->db->affected_rows() > 0){
                $success = "Silahkan Cek Email <b>".$email."</b> Untuk Melakukan Login";
                $this->session->set_flashdata('sukses', $success);
                redirect('ppdb');
                print_r($this->input->post());
            }else{

            }
        }
    }
}