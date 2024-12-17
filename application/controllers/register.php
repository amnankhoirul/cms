<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->model('Model_transaksi');
        // $this->load->library('Pdf');
        // if($this->session->userdata('level') == NULL){
        //     redirect('Auth');
        }
        // }


	public function index(){
		$this->load->view('template/header');
        // $this->load->view('template/sidebar');
        $this->load->view('register');
        $this->load->view('template/footer');
	}
}

?>
