<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function index()
    {
        $this->load->library('session');
        $cart = $this->session->userdata('cart');

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('transaksi');
        $transaksi = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->order_by('tgl', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Halaman Konfigurasi',
            'title'         => 'Halaman Konfigurasi',
            'konfig'        => $konfig,
            'kategori'      => $kategori,
            'transaksi'     => $transaksi,
            'konten'        => $konten
        );
        // $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('keranjang', $data);
    }
    public function tambah_ke_keranjang($id){
 
            $konten = $this->Model_produk->find($id);
  
        $data = array(
            'id'    => $konten->id_konten,
            'qty'   => 1,
            'price' => $konten->harga,
            'name'  => $konten->judul
        );

        $this->cart->insert($data);
        redirect('../keranjang');
        // }
    }
}
