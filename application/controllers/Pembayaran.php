<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

public function index(){
        // $this->load->view('template/header');
        // $this->load->view('template/sidebar');
        $this->load->view('pembayaran');
        // $this->load->view('template/footer');
    }
    public function proses_pesanan(){
        $proses = $this->Model_invoice->index();
        if ($proses) {
            $this->cart->destroy();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('template/footer');
        } else {
            echo "Maaf, pesanan anda gagal di proses!";
        }
    }
    public function selesai(){
     
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('home');
            $this->load->view('template/footer');
  
    }
}
    ?>