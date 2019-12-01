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
                $this->load->library('PHPMailer_lib');
                $mail = $this->phpmailer_lib->load();

                $mail->isSMTP();
                $mail->Host     = 'mail.alhikmahmp.sch.id';
                $mail->SMTPAuth = true;
                $mail->Username = 'ppdb@alhikmahmp.sch.id';
                $mail->Password = 's1mpaud3v';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;

                $mail->setFrom('ppdb@alhikmahmp.sch.id', 'PPDB Al Hikmah');
                $mail->addReplyTo('ppdb@alhikmahmp.sch.id', 'HarkiRamadhan');
                
                $mail->addAddress($this->input->post('email', TRUE));
                
                $mail->Subject = 'PPDB Online SDIT Al Hikmah';
                
                $mail->isHTML(true);
                $mailContent = "<h1>".$this->input->post('nama', TRUE)."</h1>
                    <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
                $mail->Body = $mailContent;

                if($mail->send()){
                    $success = "Silahkan Cek Email <b>".$email."</b> Untuk Melakukan Login";
                    $this->session->set_flashdata('sukses', $success);
                    redirect('ppdb');
                }else{
                    echo $mail->ErrorInfo;
                }
            }else{

            }
        }
    }
}