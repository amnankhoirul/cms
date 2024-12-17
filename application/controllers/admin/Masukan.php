<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Masukan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('level') == NULL){
            redirect('../admin/auth');
        }
    }
    public function index(){
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array();

        $this->db->from('masukan');
        $masukan = $this->db->get()->result_array();

        $this->db->from('konten a');
        $this->db->join('kategori b','a.id_kategori=b.id_kategori','life');
        $this->db->join('user c','a.username=c.username','life');
        $this->db->order_by('tgl', 'DESC');
        $konten = $this->db->get()->result_array();

        $data = array(
            'judul' => "Beranda | Burg",
            'title' => "Halaman Masukan",
            'konfig' => $konfig,
            'konten' => $konten,
            'masukan' => $masukan,
            'kategori' => $kategori
        );
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/Masukan', $data);
        $this->load->view('template_admin/footer');
    }
    public function simpan(){

        $data = array(
            'nama' => $this->input->post('nama'),
            'masukan' => $this->input->post('masukan'),
            'no_wa' => $this->input->post('no_wa'),
            'email' => $this->input->post('email')
        );
        $this->db->insert('masukan', $data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Terima Kasih</strong> Atas masukannya.<br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('../masukan');
    
    }
    public function balas()
    {
        $masukan = $this->input->post('masukan');
        $balas = $this->input->post('balas');
        $emailTujuan = $this->input->post('email');
        
        // Simpan balasan ke database
        $this->db->where('id_masukan', $this->input->post('id_masukan'));
        $this->db->update('masukan', ['balas' => $balas]);

        // Kirim balasan via email
        $this->kirimEmail($emailTujuan, $masukan, $balas);

        redirect('admin/masukan');
    }

    private function kirimEmail($email, $masukan, $balas)
    {
        require_once(APPPATH . 'third_party/PHPMailer/src/PHPMailer.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/SMTP.php');
        require_once(APPPATH . 'third_party/PHPMailer/src/Exception.php');

        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'amnankhoirul354@gmail.com'; // Ganti dengan email kamu
            $mail->Password = 'ABANGJAGO'; // Ganti dengan password email kamu
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Pengirim dan penerima
            $mail->setFrom('amnankhoirul354@gmail.com', 'Amnan');
            $mail->addAddress($email);

            // Konten email
            $mail->isHTML(true);
            $mail->Subject = 'Balasan dari Admin';
            $mail->Body    = "<p><strong>Masukan Anda:</strong> $masukan</p>
                              <p><strong>Balasan Kami:</strong> $balas</p>";

            $mail->send();
        } catch (Exception $e) {
            // Log atau tangani error
            log_message('error', "Email tidak dapat dikirim. Error: {$mail->ErrorInfo}");
        }
    }

    public function hapus($id){
        $data = array(
            'id_masukan' => $id
        );
        $this->db->delete('masukan',$data);
        $this->session->set_flashdata('alert','<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Anda berhasil menghapus masukan.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    );
        redirect('../admin/masukan');
    }

}
