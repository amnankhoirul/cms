<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul' => "Beranda | Burg",
            'konfig' => $konfig,
            'kategori' => $kategori
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('about', $data);
        $this->load->view('template/footer',$data);
    }
}
