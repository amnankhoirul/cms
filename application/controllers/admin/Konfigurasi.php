<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Konfigurasi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('../admin/auth');
    }
}
    public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Halaman Konfigurasi',
            'title' => 'Halaman Konfigurasi',
            'konfig'          => $konfig
        );
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/konfigurasi', $data);
        $this->load->view('template_admin/footer');
    }
    public function update(){
        $where = array(
            'id_konfigurasi' => 1
    
        );
        $data = array(
            'judul_website'     => $this->input->post('judul_website'),
            'profil_website'    => $this->input->post('profil_website'),
            'fb'                => $this->input->post('fb'),
            'ig'                => $this->input->post('ig'),
            'email'             => $this->input->post('email'),
            'alamat'            => $this->input->post('alamat'),
            'no_wa'             => $this->input->post('no_wa')
    
        );
        $this->db->update('konfigurasi', $data, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil memperbarui konfigurasi<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('admin/konfigurasi');
    }
}
