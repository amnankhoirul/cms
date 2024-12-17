<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('../admin/auth');
        }
    }
    public function index(){
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC');
        $kategori = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kategori konten',
            'title'         => 'Halaman Tambah kategori',
            'kategori'          => $kategori
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/kategori',$data);
        $this->load->view('template_admin/footer');
    }
    public function hapus($id_kategori){
        $data = array(
            'id_kategori' => $id_kategori
        );
        $this->db->delete('kategori',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus kategori.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    );
        redirect('../admin/kategori');
    }

    public function simpan(){
        $this->db->from('kategori');
        $this->db->where('nama_kategori',$this->input->post('nama_kategori'));
        $cek = $this->db->get()->row();
        // var_dump($cek);
        if($cek <> NULL){
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Kategori sudah digunakan.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            ); 
            redirect('../admin/kategori');
        }
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
            );
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan kategori baru.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('../admin/kategori');
        
    }

    public function update(){
        $where = array(
            'id_kategori' => $this->input->post('id_kategori')
    
        );
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori')
    
        );
        $this->db->update('kategori', $data, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil memperbarui kategori<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('../admin/kategori');
    }
}
?>
