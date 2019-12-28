<?php
class Csiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        if($this->session->userdata('role') != TRUE){
            redirect('dashboard');
        }
    }

    function index(){
        $data['title'] = "Dashboard PPDB Online Al Hikmah";
        $data['email'] = $this->session->userdata('email');
        $data['daftar'] = $this->M_Csiswa->get_allCsiswa()->num_rows();
        $data['konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> "done"])->num_rows();
        $data['belum_konfirmasi'] = $this->db->get_where('csiswa', ['konfirmasi'=> NULL])->num_rows();

        $this->load->view('layout/header_admin', $data);
        $this->load->view('inner/daftar_csiswa', $data);
        $this->load->view('layout/footer_admin', $data);
    }

    // // //  AJAX // // //
    function list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $get = $this->M_Csiswa->get_allCsiswa();
        $data   = array();
        $no     = 1;

        foreach($get->result() as $row){

            if($row->konfirmasi == "done"){
                $status = "<div class='text-center'><span class='badge badge-success'>Sudah Konfirmasi</span></div>";
                $action = "<div class='text-center'><button class='btn btn-sm btn-warning btn-block'>Cancel</button></div>";
            }else{
                $status = "<div class='text-center'><span class='badge badge-warning'>Belum Konfirmasi</span></div>";
                $action = "<div class='text-center'><button class='btn btn-sm btn-success btn-block'>Konfirmasi</button></div>";
            }

            $data[] = [
                $no++,
                "<strong>".$row->nama."</strong>",
                $row->jenkel,
                $row->asal_sekolah,
                $status,
                $action
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
        ];
        echo json_encode($output);
        exit();
    }
}