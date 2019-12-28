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

    function proses(){
        $id = $this->input->post('id');
        $process = $this->input->post('process');
        $nama = $this->input->post('nama');

        if($process == "conf"){
            $data = [
                'konfirmasi'=>"done"
            ];
            $this->db->where('id', $id);
            $this->db->update('csiswa', $data);

            if($this->db->affected_rows() > 0){
                echo $nama." Berhasil Di Konfirmasi";
            }else{
                echo $nama." Gagal Di Konfirmasi";
            }
        }elseif($process == "cancel"){
            $data = [
                'konfirmasi'=>NULL
            ];
            $this->db->where('id', $id);
            $this->db->update('csiswa', $data);

            if($this->db->affected_rows() > 0){
                echo $nama." Berhasil Di Cancel";
            }else{
                echo $nama." Gagal Di Cancel";
            }
        }
    }

    // // //  AJAX // // //
    function list(){
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $get    = $this->M_Csiswa->get_allCsiswa();
        $data   = array();
        $no     = 1;
        $base   = site_url('csiswa/proses/');

        foreach($get->result() as $row){

            if($row->konfirmasi == "done"){
                $status = "<div class='text-center'><span class='badge badge-success'>Sudah Konfirmasi</span></div>";
                $action = "
                    <div class='text-center'><button class='btn btn-sm btn-warning btn-block can_$row->id' id='$row->id'>Cancel</button></div>
                    <script>
                        $('.can_$row->id').click(function(){
                            var id = this.id;
                            var process = 'cancel';
                            var nama = '$row->nama';
                            $.ajax({
                                url: '$base',
                                type: 'post',
                                data: {id : id, process : process, nama : nama},
                                success:function(response){
                                    alert(response);
                                    $('#csiswa').DataTable().ajax.reload();
                                }
                            });
                        });
                    </script>
                    ";
            }else{
                $status = "<div class='text-center'><span class='badge badge-warning'>Belum Konfirmasi</span></div>";
                $action = "
                    <div class='text-center'><button class='btn btn-sm btn-success btn-block conf_$row->id' id='$row->id'>Konfirmasi</button></div>
                    <script>
                        $('.conf_$row->id').click(function(){
                            var id = this.id;
                            var process = 'conf';
                            var nama = '$row->nama';
                            $.ajax({
                                url: '$base',
                                type: 'post',
                                data: {id : id, process : process, nama : nama},
                                success:function(response){
                                    alert(response);
                                    $('#csiswa').DataTable().ajax.reload();
                                }
                            });
                        });
                    </script>
                    ";
            }

            $data[] = [
                $no++,
                $row->noujian,
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