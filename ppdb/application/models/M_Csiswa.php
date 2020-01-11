<?php
class M_Csiswa extends CI_Model{
    function cek_NikEmail($email, $nik){
        $this->db->select('*');
        $this->db->from('csiswa');
        $this->db->where(['email'=>$email, 'nik'=>$nik]);
        return $this->db->get();
    }

    function get_byId($idcsiswa){
        $this->db->select('csiswa.*, kewarganegaraan.short, kewarganegaraan.kwn kkwn, wilayah_kabupaten.nama nama_kab, wilayah_kecamatan.nama nama_kec, wilayah_desa.nama nama_kel');
        $this->db->from('csiswa');
        $this->db->join('kewarganegaraan', 'csiswa.kwn = kewarganegaraan.id', 'left');
        $this->db->join('wilayah_kabupaten', 'csiswa.kabupaten = wilayah_kabupaten.id', 'left');
        $this->db->join('wilayah_kecamatan', 'csiswa.kecamatan = wilayah_kecamatan.id', 'left');
        $this->db->join('wilayah_desa', 'csiswa.kelurahan = wilayah_desa.id', 'left');
        $this->db->where(['csiswa.id'=>$idcsiswa]);
        return $this->db->get()->row();
    }

    function get_allCsiswa(){
        $this->db->select('*');
        $this->db->from('view_siswa');
        $this->db->order_by('nama', "ASC");
        return $this->db->get();
    }

    function get_allBiodataOrtu($idcsiswa, $jenis){
        $this->db->select('
            o.nama nama_ayah, o.nik nik_ayah, o.tl tl_ayah, o.tgl_lahir tgl_lahir_ayah, o.status status_ayah, o.tanggal_wafat tanggal_wafat_ayah, o.gelar gelar_ayah, o.alamat_pekerjaan alamat_pekerjaan_ayah, o.email email_ayah, o.wa wa_ayah,
            t.tempat tmpt,
            p.short pend,
            pk.pekerjaan kerja, 
            pg.penghasilan hasil,
        ');

        $this->db->from('bcortu o');
        $this->db->join('tempat_tinggal t', "o.idtempat = t.id", "left");
        $this->db->join('pendidikan p', "o.idpendidikan = p.id", "left");
        $this->db->join('pekerjaan pk', "o.idpekerjaan = pk.id", "left");
        $this->db->join('penghasilan pg', "o.idpenghasilan = pg.id", "left");
        $this->db->where([
            'o.idcsiswa' => $idcsiswa,
            'o.jenis' => $jenis
        ]);
        return $this->db->get();
    }
}