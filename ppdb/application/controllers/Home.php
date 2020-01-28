<?php
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_Sekolah');
    }

    private function sekolah(){
        $get = $this->db->get('sekolah');
        return $get->row();
    }

    function index(){
        $var['nama'] = $this->sekolah()->nama;
        $var['slider'] = $this->M_Sekolah->get_img("slider");
        $var['bg'] = $this->M_Sekolah->get_img("bg");
        
        $this->load->view('home/layout/header');
        $this->load->view('home/home', $var);
        $this->load->view('home/layout/footer');
    }

    // AJAX
    function get_berita(){
        ?>
            <div class="col-md-4">
                <div class="card card-plain card-blog">
                  <div class="card-header card-header-image">
                <a href="#pablo">
                    <img class="img img-raised" src="<?= base_url('') ?>/assets/home/img/slide/2.JPG">
                </a>
                <div class="colored-shadow" style="background-image: url(&quot;<?= base_url('') ?>/assets/home/img/slide/2.JPG&quot;); opacity: 1;"></div></div>
                    <div class="card-body">
                        <h6 class="card-category text-info"></h6>
                        <h4 class="card-title">
                        <a href="#pablo">Tarhib Ramadhan </a> <br>
                        <span class="badge badge-info">Mutiara Hikmah</span>
                        </h4>
                        <p class="card-description">
                        Tarhib Ramadhan.<a href="#pablo"> Read More </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php
    }

    function get_gallery(){

    }
}