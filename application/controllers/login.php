<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
   
        }
	public function index(){
		$this->load->view('template_admin/header');
        // $this->load->view('template/sidebar');
        $this->load->view('login');
        $this->load->view('template_admin/footer');
	}
}

?>
