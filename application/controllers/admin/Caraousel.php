<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caraousel extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('../admin/auth');
        }
    }
    public function index(){
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        $this->db->from('foto_caraousel');
        $foto_caraousel = $this->db->get()->result_array();

        $data = array(
            'title'          => 'Halaman caraousel',
            'caraousel'      => $caraousel,
            'foto_caraousel' => $foto_caraousel
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/caraousel',$data);
        $this->load->view('template_admin/footer');
    }

    public function hapus_foto($id){
        $filename=FCPATH.'upload/caraousel/'.$id;
        if(file($filename)){
            unlink("upload/caraousel/".$id);
        }

        $data = array(
            'foto' => $id
        );
        $this->db->delete('foto_caraousel',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus caraousel.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    );
        redirect('../admin/caraousel');
    }
    public function hapus($id_caraousel){
        $data = array(
            'id_caraousel' => $id_caraousel
        );
        $this->db->delete('caraousel',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus caraousel.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    );
        redirect('../admin/caraousel');
    }

    public function simpan_foto() {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']   = './upload/caraousel/'; // Pastikan folder ada
        $config['max_size']      = 500; // 500 KB
        $config['allowed_types'] = 'jpg|jpeg|png'; // Batasi hanya untuk gambar
        $config['file_name']     = $namafoto;
    
        $this->load->library('upload', $config);
    
        // Validasi apakah file ada
        if (empty($_FILES['foto']['name'])) {
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Anda harus memilih file foto terlebih dahulu.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/caraousel');
            return;
        }
    
        // Validasi ukuran file
        if ($_FILES['foto']['size'] >= 500 * 1024) { // 500 KB
            $this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Ukuran foto terlalu besar. Harap upload foto dengan ukuran kurang dari 500 KB.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/caraousel');
            return;
        }
    
        // Proses upload file
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> ' . $error . '<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/caraousel');
            return;
        }
    
        // Jika upload berhasil, masukkan data ke database
        $data = array(
            'foto' => $namafoto
        );
        $this->db->insert('foto_caraousel', $data);
    
        // Beri notifikasi berhasil
        $this->session->set_flashdata('alert', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Foto berhasil ditambahkan ke caraousel.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('admin/caraousel');
    }
    
    public function simpan(){

            $data = array(
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('keterangan'),
            );
            $this->db->insert('caraousel', $data);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan caraousel baru.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('../admin/caraousel');
        
    }
    public function update(){
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']   = 'upload/caraousel/';
        $config['max_size']      = 500 * 1024; // 3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['file_name']     = $namafoto;
        $config['overwrite']     = true;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf ukuran foto terlalu besar</strong>, upload ulang foto dengan ukuran yang kurang dari 500 KB.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        ); 
            redirect('admin/caraousel');
            // redirect('admin/produk/foto/' . $this->input->post('kode_produk'));
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

            $data = array(
                'judul'       => $this->input->post('judul'),
                'id_kategori' => $this->input->post('id_kategori'),
                'keterangan'  => $this->input->post('keterangan'),
                'slug'        => str_replace(' ', '-', $this->input->post('judul'))
            );
            $where = array(
                'foto' => $this->input->post('nama_foto')
            );
            $this->db->update('caraousel', $data, $where);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil memperbarui caraousel.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('../admin/caraousel');
        
    }


}
?>
