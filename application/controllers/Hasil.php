<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('nama')) {
        } else {
            $this->session->set_flashdata('pesan_login', '
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                Maaf, Anda belum Login!
            </div>');
            redirect('authentication');
        }
    }

    public function index()
    {
        $data['title'] = $this->session->userdata('nis') . " | " . $this->session->userdata('nama');
        $this->load->view('hasil_kelulusan', $data);
    }

    public function download()
    {
        $data['title'] = $this->session->userdata('nis') . " | " . $this->session->userdata('nama');
        $this->load->view('download', $data);
    }

    private function qrcode()
    {
        $this->load->view('qrcode');
    }
}
