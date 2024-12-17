<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller {
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

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->order_by('tgl', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kategori konten',
            'title'         => 'Halaman Tambah konten',
            'kategori'          => $kategori,
            'konten'          => $konten
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/transaksi',$data);
        $this->load->view('template_admin/footer');
    }
    public function hapus($id){
        $filename=FCPATH.'/upload/konten/'.$id;
        if(file($filename)){
            unlink("./upload/konten/".$id);
        }

        $data = array(
            'foto' => $id
        );
        $this->db->delete('konten',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus konten.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    );
        redirect('../admin/konten');
    }

    public function simpan(){
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']   = 'upload/konten/';
        $config['max_size']      = 500 * 1024; // 3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types'] = '*';
        $config['file_name']     = $namafoto;
        $this->load->library('upload', $config);

        if ($_FILES['foto']['size'] >= 500 * 1024) {
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf ukuran foto terlalu besar</strong>, upload ulang foto dengan ukuran yang kurang dari 500 KB.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        ); 
            redirect('admin/konten');
            // redirect('admin/produk/foto/' . $this->input->post('kode_produk'));
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('konten');
        $this->db->where('judul',$this->input->post('judul'));
        $cek = $this->db->get()->row();
        // var_dump($cek);
        if($cek <> NULL){
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> judul konten sudah ada.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            ); 
            redirect('../admin/konten');
        }
            $data = array(
                'judul'         => $this->input->post('judul'),
                'id_kategori'   => $this->input->post('id_kategori'),
                'keterangan'    => $this->input->post('keterangan'),
                'harga'         => $this->input->post('harga'),
                'tgl'           => date('Y-m-d'),
                'foto'          => $namafoto,
                'username'      => $this->session->userdata('username'),
                'slug'          => str_replace(' ', '-', $this->input->post('judul'))
            );
            $this->db->insert('konten', $data);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan konten baru.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('../admin/transaaksi');
        
    }
    public function update(){
        $namafoto = $this->input->post('nama_foto');
        $config['upload_path']   = 'upload/konten/';
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
            redirect('admin/konten');
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
            $this->db->update('konten', $data, $where);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil memperbarui konten.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('../admin/konten');
        
    }
    public function Checkout() {
        $this->load->model('Produk_model');
        $produk = $this->Produk_model->getProdukById($id_produk);

        // Ambil ID produk dari query string
        $id_produk = $this->input->get('id');

        // Validasi apakah ID produk ada
        if (!$id_produk) {
            show_404();
        }

        // Ambil detail produk dari database berdasarkan ID
        $produk = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();

        // Jika produk tidak ditemukan, tampilkan error
        if (!$produk) {
            show_error('Produk tidak ditemukan.', 404, 'Error');
        }

        // Kirim data ke tampilan checkout
        $data['produk'] = $produk;

        $this->load->view('checkout_view', $data);
    }
}
?>
