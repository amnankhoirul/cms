<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') != "Admin"){
            redirect('../admin/auth');
        }
    }
    public function index(){
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Dashboard',
            'title'         => 'Halaman Tambah User',
            'user'          => $user
        );
        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/user',$data);
        $this->load->view('template_admin/footer');
    }
    public function hapus($id_user){
        $data = array(
            'id_user' => $id_user
        );
        $this->db->delete('user',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus user.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('../admin/user');
    }
    public function simpan(){
        $this->db->from('user');
        $this->db->where('username',$this->input->post('username'));
        $cek = $this->db->get()->row();
        // var_dump($cek);
        if($cek == NULL){
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'nama'     => $this->input->post('nama'),
                'level'    => $this->input->post('level')
            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil menambahkan user baru.<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Maaf!</strong> Username sudah digunakan.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'); 
        }
        redirect('../admin/dashboard_admin');
    }

    public function update(){
        $where = array(
            'id_user' => $this->input->post('id_user')
    
        );
        $data = array(
            'nama' => $this->input->post('nama')
    
        );
        $this->db->update('user', $data, $where);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> Anda berhasil memperbarui nama<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        redirect('../admin/user');
    }
}
?>
