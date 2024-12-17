<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukan extends CI_Controller{
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
        $this->load->view('Masukan', $data);
        $this->load->view('template/footer');
    }
    public function simpan(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'masukan' => $this->input->post('masukan'),
            'no_wa' => $this->input->post('no_wa'),
            'email' => $this->input->post('email')
        );
        if ($this->db->insert('masukan', $data)) {
            // Set flashdata untuk SweetAlert
            $this->session->set_flashdata('title', 'Terima Kasih Atas Masukannya!');
            $this->session->set_flashdata('text', 'Data masukan telah terkirim.');
            $this->session->set_flashdata('icon', 'success');
        } else {
            $this->session->set_flashdata('title', 'Gagal!');
            $this->session->set_flashdata('text', 'Data masukan gagal dikirim.');
            $this->session->set_flashdata('icon', 'error');
        }

        redirect('../masukan');
    
}

}
