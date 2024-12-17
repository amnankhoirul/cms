<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('level') == NULL){
            redirect('../admin/auth');
    }
}
    public function index(){
        // Hitung jumlah data dari setiap tabel langsung di sini
        $data['masukan_count'] = $this->db->count_all('masukan'); // Tabel masukan
        $data['kategori_konten_count'] = $this->db->count_all('kategori'); // Tabel kategori_konten
        $data['user_count'] = $this->db->count_all('user'); // Tabel user
        $data['konten_count'] = $this->db->count_all('konten'); // Tabel konten

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}
