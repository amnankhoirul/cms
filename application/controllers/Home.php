<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        $this->db->from('foto_caraousel');
        $foto_caraousel = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->order_by('tgl', 'DESC');
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul'          => "Beranda | Burg",
            'konfig'         => $konfig,
            'caraousel'      => $caraousel,
            'konten'         => $konten,
            'kategori'       => $kategori,
            'foto_caraousel' => $foto_caraousel
        );
        $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar',$data);
        $this->load->view('dashboard', $data);  
        $this->load->view('template/footer');                                                                                                           
    }
    public function kategori($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array();

        $this->db->from('foto_caraousel');
        $foto_caraousel = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->where('a.id_kategori',$id);
        $konten = $this->db->get()->result_array();
        $data = array(
            'judul'          => "Beranda | Burg",
            'konfig'         => $konfig,
            'caraousel'      => $caraousel,
            'konten'         => $konten,
            'kategori'       => $kategori,
            'foto_caraousel' => $foto_caraousel
        );
        $this->load->view('template/header', $data);
        // $this->load->view('template/sidebar',$data);
        $this->load->view('dashboard', $data);  
        $this->load->view('template/footer');                                                                                                           
    }
    public function detail($id){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->where('slug',$id);
        $konten = $this->db->get()->row();
        $data = array(
            'judul'          => $konten->judul."Beranda | Burg",
            'konfig'         => $konfig,
            'konten'         => $konten,
            'kategori'       => $kategori
        );
        $this->load->view('template_admin/header', $data);
        // $this->load->view('template_admin/sidebar',$data);
        $this->load->view('detail', $data);
        $this->load->view('template_admin/footer');
    }

    public function kategori_konten()
{
    $this->db->from('konfigurasi');
    $konfig = $this->db->get()->row();
    $konfig = array(
        'konfig' => $konfig
    );
    $kategori_konten = $this->input->get('kategori_konten');

    if ($kategori_konten) {
        // Jika ada parameter kategori, filter data
        $data['konten'] = $this->db->get_where('konten', ['id_kategori' => $kategori_konten])->result_array();
    } else {
        // Jika tidak ada parameter, tampilkan semua data
        $data['konten'] = $this->db->get('konten')->result_array();
    }

    // Ambil data kategori untuk menu filter
    $data['kategori'] = $this->db->get('kategori')->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $konfig);
    $this->load->view('menu', $data);
    $this->load->view('template/footer');
}
public function cari()
{
    $keyword = $this->input->post('konten'); // Kata kunci pencarian
    $kategori_id = $this->input->get('kategori'); // Kategori ID dari URL

    // Jika kategori dipilih, tambahkan kondisi
    if (!empty($kategori_id)) {
        $this->db->where('id_kategori', $kategori_id);
    }

    // Pencarian berdasarkan kata kunci
    if (!empty($keyword)) {
        $this->db->like('judul', $keyword);
    }

    $data['konten'] = $this->db->get('produk')->result_array();
    $data['kategori'] = $this->db->get('kategori')->result_array();

    $this->load->view('home', $data);
}
public function tambah_ke_keranjang($id){
    // if (!$this->session->userdata('username')){
    //     $this->session->set_flashdata('pesan','<div class="alert alert-denger alert-dismissible fade show" role="alert">Anda Belum Login
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    //     <span aria-hidden="true">&times;</span>
    //     </button>
    // </div>');
    //     redirect('auth/login');
    // }else{
        $konten = $this->Model_produk->find($id);
    // var_dump($produk);
    // die();
    $data = array(
        'id'    => $konten->id_konten,
        'qty'   => 1,
        'price' => $konten->harga,
        'name'  => $konten->judul
    );
    // $this->db->where('id');
    // $this->db->update('Model_invoice', $data);
    // $this->db->table('Model_invoice')->where('id')->update($data);
    $this->cart->insert($data);
    redirect('../keranjang');
    // }
}

public function update_cart($rowid, $action)
{
    // Ambil data dari keranjang
    $cart = $this->cart->contents();
    $qty = 0;

    if (isset($cart[$rowid])) {
        $qty = $cart[$rowid]['qty'];

        // Perbarui qty berdasarkan action
        if ($action == 'increase') {
            $qty++;
        } elseif ($action == 'decrease' && $qty > 1) {
            $qty--;
        }
    }

    // Update keranjang
    $data = array(
        'rowid' => $rowid,
        'qty'   => $qty
    );

    $this->cart->update($data);
    redirect('../keranjang'); // Redirect kembali ke halaman keranjang
}
public function hapus($rowid)
{
    // Hapus item berdasarkan rowid dari keranjang
    $data = array(
        'rowid' => $rowid,
        'qty'   => 0 // Mengatur qty ke 0 akan menghapus item
    );

    $this->cart->update($data); // Update keranjang
    $this->session->set_flashdata('success', 'Produk berhasil dihapus dari keranjang.');
    redirect('../keranjang'); // Redirect kembali ke halaman keranjang
}
public function hapus_semua()
{
    // Menghapus semua isi keranjang
    $this->cart->destroy(); // Fungsi ini menghapus seluruh isi keranjang

    // Pesan sukses dan redirect ke halaman keranjang
    $this->session->set_flashdata('success', 'Semua item di keranjang berhasil dihapus.');
    redirect('../keranjang'); // Ganti dengan nama route atau controller tujuan
}


}
