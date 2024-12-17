<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        }

	public function index(){
		$this->load->view('template_admin/header');
        // $this->load->view('template_admin/sidebar');
        $this->load->view('login');
        // $this->load->view('template_admin/footer');
	}
    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user');
        $this->db->where('username',$username);
        $cek = $this->db->get()->row();
        // var_dump($cek);
        if($cek == NULL){
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level')
            );
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Username tidak ada<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('../auth');
        }else if($password == $cek -> password){    
            $data = array(
                'id_user'   => $cek -> id_user,
                'nama'      => $cek -> nama,
                'username'  => $cek -> username,
                'level'     => $cek -> level
            );
            $this->session->set_userdata($data);
            redirect('../admin/Dashboard_admin');
        } else {       
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Password salah<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
            redirect('../auth');
        }
    }
    // public function logout(){
    //     $this->session->sess_destroy();
    //     redirect('../home');
    // }
    public function logout()
{
    $this->session->unset_userdata('auth');
    $this->session->sess_destroy();
    redirect(base_url('auth'));
}

}

?>
