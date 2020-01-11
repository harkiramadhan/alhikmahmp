<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

class Csiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Csiswa');
        // if($this->session->userdata('role') != TRUE){
        //     redirect('dashboard');
        // }
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

    function export(){
        $jenis = "all";
        // $jenis = $this->input->post('jenis', TRUE);

        $spreadsheet = new Spreadsheet();  
        $Excel_writer = new Xlsx($spreadsheet);
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $style = array (
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        );
        $styleHeader = array (
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal'    => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical'      => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ], 
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'B7B7B7',
                ],
            ],
        ); 
        
        $spreadsheet->getActiveSheet()->getStyle('B2:AW2')->applyFromArray($styleHeader);
        $sheetStyle = $spreadsheet->getActiveSheet();  
        foreach(range('B','Z') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        foreach(range('A','W') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension("A".$columnID)
                ->setAutoSize(true);
        }

        $sheetStyle->setCellValue('B2','No');
        $sheetStyle->setCellValue('C2','Noujian');
        $sheetStyle->setCellValue('D2','Nama Lengkap');
        $sheetStyle->setCellValue('E2','L/P');
        $sheetStyle->setCellValue('F2','TTL');
        $sheetStyle->setCellValue('G2','Alamat');
        $sheetStyle->setCellValue('H2','Jarak Rumah Ke Sekolah');
        $sheetStyle->setCellValue('I2','Waktu Yang Di Tempuh');
        $sheetStyle->setCellValue('J2','Transportasi Yang Di Gunakan');
        $sheetStyle->setCellValue('K2','Hobi');
        $sheetStyle->setCellValue('L2','Cita Cita');
        $sheetStyle->setCellValue('M2','Kewarganegaraan');
        $sheetStyle->setCellValue('N2','Anak Ke');
        $sheetStyle->setCellValue('O2','Jumlah Kakak');
        $sheetStyle->setCellValue('P2','Jumlah Adik');
        $sheetStyle->setCellValue('Q2','Jumlah Saudara Tiri');
        $sheetStyle->setCellValue('R2','Jumlah Saudara Angkat');
        $sheetStyle->setCellValue('S2','Bahasa Sehari Hari');
        $sheetStyle->setCellValue('T2','Berat Badan');
        $sheetStyle->setCellValue('U2','Tinggi Badan');
        $sheetStyle->setCellValue('V2','Lingkar Kepala');
        $sheetStyle->setCellValue('W2','Golongan Darah');
        $sheetStyle->setCellValue('X2','Penyakit Yang Pernah Diderita');
        $sheetStyle->setCellValue('Y2','Dirawat Karena');
        $sheetStyle->setCellValue('Z2','Penyakit Yang Kadang Timbul');
        $sheetStyle->setCellValue('AA2','Jenis Peserta');
        $sheetStyle->setCellValue('AB2','NPSN');
        $sheetStyle->setCellValue('AC2','Asal Sekolah');
        $sheetStyle->setCellValue('AD2','Alamat Asal Sekolah');
        $sheetStyle->setCellValue('AE2','Lama Belajar');
        $sheetStyle->setCellValue('AF2','Kelas');
        $sheetStyle->setCellValue('AG2','Tanggal Pindah');
        $sheetStyle->setCellValue('AH2','Status Dalam Keluarga');
        $sheetStyle->setCellValue('AI2','Yang Membiayai Sekolah');
        $sheetStyle->setCellValue('AJ2','Kondisi Fisik');
        $sheetStyle->setCellValue('AK2','Kondisi Mental');
        $sheetStyle->setCellValue('AL2','Kebiasaan Anak Dirumah');
        $sheetStyle->setCellValue('AM2','Alasan & Motivasi Memasukkan Anak Ke SDIT Al Hikmah');
        $sheetStyle->setCellValue('AN2','Jika Ada Permasalahan Dengan Anak Di Sekolah, Langkah Apa Yang Bapak/Ibu Tempuh ? ');
        $sheetStyle->setCellValue('AO2','Keahlian Apa Yang Bapak/Ibu Miliki Yang Dapat Di Sinergikan Dengan Kegiatan Belajar Mengajar Di Sekolah ?');
        $sheetStyle->setCellValue('AP2','Bersediakah Bapak/Ibu Membantu Program "Pembinaan Akhlak" Di Rumah ?');
        $sheetStyle->setCellValue('AQ2','Apakah Anak Dapat Membuka Internet?');
        $sheetStyle->setCellValue('AR2','Dimana Anak Membuka Internet ?');
        $sheetStyle->setCellValue('AS2','Apakah Bapak/Ibu Dapat Memantaunya ?');
        $sheetStyle->setCellValue('AT2','Saat Bapak/Ibu Tidak Di Rumah, Anak Di Temani Oleh Siapa ?');
        $sheetStyle->setCellValue('AU2','Mempunyai Kakak Di SDIT Al Hikmah ? ');
        $sheetStyle->setCellValue('AV2','Nama Kakak dan Kelas Di Al Hikmah');
        $sheetStyle->setCellValue('AW2','Email');

        if($jenis == "all"){
            // Query Get All Pendaftaran
            $get = $this->M_Csiswa->get_allCsiswa();
        }elseif($jenis == "confirmed"){
            // Query Get Confirmed Pendaftaran
            
        }elseif($jenis == "unconfirmed"){
            //  Query Get Unconfirmed Pendaftaran

        }

        $excel_row  = 3;
        $no         = 1;

        foreach($get->result() as $row){
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $no++);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->noujian);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->nama);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->jenkel);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->tl.", ".$row->tgl_lahir); 
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->alamat." No.".$row->no." ".$row->rt."/".$row->rw." ".$row->nama_kelurahan.", ".$row->nama_kecamatan.", ".$row->nama_kabupaten." - ".$row->nama_provinsi);
            if($row->jarak == TRUE){$jarak = $row->jarak." Km";}else{$jarak = " - ";}
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $jarak);
            if($row->waktu == TRUE){$waktu = $row->waktu." Menit";}else{$waktu = " - ";}
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $waktu);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->transportasi);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->hobi);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->cita);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->short);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->anak_ke);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row->kakak);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row->adik);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row->tiri);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row->angkat);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row->bahasa);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, $row->bb);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row->tb);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row->lk);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(23, $excel_row, $row->goldar);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(24, $excel_row, $row->penyakit);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(25, $excel_row, $row->rawat);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(26, $excel_row, $row->penyakit_timbul);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(27, $excel_row, $row->jenis);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(28, $excel_row, $row->npsn);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(29, $excel_row, $row->asal_sekolah);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(30, $excel_row, $row->alamat_asalsekolah);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(31, $excel_row, $row->lama_belajar);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(32, $excel_row, $row->kelas);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(33, $excel_row, $row->tanggal_pindah);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(34, $excel_row, $row->status_keluarga);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(35, $excel_row, $row->biaya_anak);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(36, $excel_row, $row->fisik);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(37, $excel_row, $row->mental);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(38, $excel_row, $row->kebiasaan);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(39, $excel_row, $row->alasan);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(40, $excel_row, $row->masalah);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(41, $excel_row, $row->keahlian_ortu);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(42, $excel_row, $row->pembinaan_anak);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(43, $excel_row, $row->internet);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(44, $excel_row, $row->internet_anak);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(45, $excel_row, $row->pantau);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(46, $excel_row, $row->teman);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(47, $excel_row, $row->kakak_sdit);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(48, $excel_row, $row->nama_kakak);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(49, $excel_row, $row->email);
            
            $excel_row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Content-Disposition: attachment;filename="test.Xlsx'); 
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $Excel_writer->save('php://output', 'Xlsx');
        exit;

        redirect($_SERVER['HTTP_REFERER']);
    }

    function test(){
        // $get = $this->M_Csiswa->get_allBiodata()->result();
        // // echo "<pre>"; print_r($get) ;echo "</pre>";
        // header('Content-Type: application/json');
        // echo json_encode($get);
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