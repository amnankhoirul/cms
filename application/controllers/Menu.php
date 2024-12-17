<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->order_by('tgl', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul' => "Beranda | Burg",
            'konfig' => $konfig,
            'konten' => $konten,
            'kategori' => $kategori
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('menu', $data);
        $this->load->view('template/footer');
    }
    public function kategori()
{
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();
        $konfig = array(
            'konfig' => $konfig
        );
        $id_kategori = $this->input->get('kategori'); // Ambil parameter kategori
        if ($id_kategori) {
            $data['konten'] = $this->db->get_where('konten', ['id_kategori' => $id_kategori])->result_array();
        } else {
            $data['konten'] = $this->db->get('konten')->result_array();
        }

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $konfig);
        $this->load->view('menu', $data);
        $this->load->view('template/footer');
}

}
