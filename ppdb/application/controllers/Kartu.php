<?php
class Kartu extends CI_Controller{
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

    function cetak(){
        $data['title']          = "Cetak Kartu Ujian ";
        $data['idcsiswa']       = $this->idcsiswa();
        $data['siswa']          = $this->db->get_where('csiswa', ['id'=> $this->idcsiswa()])->row();
        $data['foto']           = $this->db->get_where('cdocument', ['idcsiswa'=>$this->idcsiswa(), 'jenis'=> "anak"])->row()->img;
		
		//this the the PDF filename that user will get to download
        $pdfFilePath = "Kartu Ujian PPDB SDIT Al Hikmah - ".$data['siswa']->nama.".pdf";
        
        // $this->load->view('inner/karu',$data);
        $mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('inner/karu',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
    }
}