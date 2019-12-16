<?php
class Dashboard extends CI_Controller{
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
        $this->load->view('inner/dashboard');
        $this->load->view('layout/footer');
    }

    function simpan(){
        $jenis = $this->input->post('jenis', TRUE);
        if($jenis == "pilih"){
            $data = [
                'metode_pembayaran' => $this->input->post('metode', TRUE)
            ];
            $this->db->where('id', $this->idcsiswa());
            $this->db->update('csiswa', $data);

            $data2 = [
                'idcsiswa' => $this->idcsiswa(),
                'idstep' => 14
            ];

            if($this->db->affected_rows() > 0){
                $cek = $this->db->get_where('bstep', ['idcsiswa'=> $this->idcsiswa(), 'idstep'=>14]);
                if($cek->num_rows() > 0){
                    $this->db->where('id', $cek->row()->id);
                    $this->db->update('bstep', $data2);
                }else{
                    $this->db->insert('bstep', $data2);
                }

                $this->session->set_flashdata('sukses', "Metode Pembayaran Berhasil Di Simpan");
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }
}