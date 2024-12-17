
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index() {
        $this->load->view('keranjang'); // Load tampilan cart
    }

    // Tambahkan item ke cart
    public function add_to_cart() {
        $data = array(
            'id'      => 'sku_12345', // ID produk
            'qty'     => 1,
            'price'   => 20000,
            'name'    => 'Produk Contoh',
            'options' => array('id_konten' => '123') // Tambahkan id_konten
        );
        $this->cart->insert($data);
        redirect('cart');
    }
    
    // Update cart item
    public function update_cart() {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('qty')
        );
        $this->cart->update($data);
        redirect('cart');
    }
    
    // Hapus item dari cart
    public function delete_cart($rowid) {
        $this->cart->remove($rowid);
        redirect('cart');
    }
}
