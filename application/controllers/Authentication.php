<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentication extends CI_Controller
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
    public function index()
    {
        $this->form_validation->set_rules('nis', 'nis', 'required|trim', [
            'required' => 'NIS harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'LOGIN';
            $this->load->view('login', $data);
        } else {
            //Validasi benar
            $this->_login();
        }
        $this->session->sess_destroy();
    }

    private function _login()
    {
        $nis = $this->input->post('nis');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('hasil', ['nis' => $nis])->row_array();

        $waktu = date_default_timezone_set('Asia/Jakarta');
        $waktu = date('d-m-Y H:i:s');

        if ($user) {
            if ($password == $user['password']) {
                $data = array(
                    'nama' => $user['nama'],
                    'nis' => $user['nis'],
                    'nisn' => $user['nisn'],
                    'kelas' => $user['kelas'],
                    'status' => 'Login',
                    'waktu' => $waktu,
                    'ipaddress' => $this->get_client_ip_env(),
                    'browser' => $this->getting_browser(),
                    'os' => $this->get_os()
                );
                $this->db->insert('log', $data);
                $this->session->set_userdata($data);
                redirect('hasil');
            } else {
                $this->session->set_flashdata('pesan_token', '<div class="alert alert-danger" role="alert">Mohon maaf password salah.</div>');
                redirect('authentication');
            }
        } else {
            $this->session->set_flashdata('pesan_token', '<div class="alert alert-danger" role="alert">Mohon maaf nis tidak ditemukan.</div>');
            redirect('authentication');
        }
        $this->session->sess_destroy();
    }

    public function logout()
    {
        $user = $this->db->get_where('hasil', ['nis' => $this->session->userdata('nis')])->row_array();
        $waktu = date_default_timezone_set('Asia/Jakarta');
        $waktu = date('d-m-Y H:i:s');
        $data = array(
            'nama' => $user['nama'],
            'nis' => $user['nis'],
            'kelas' => $user['kelas'],
            'status' => 'Logout',
            'waktu' => $waktu,
            'ipaddress' => $this->get_client_ip_env(),
            'browser' => $this->getting_browser(),
            'os' => $this->get_os()
        );
        $this->db->insert('log', $data);
        $this->session->sess_destroy();
        redirect('authentication');
    }

    // Record Addr

    public function get_client_ip_env()
    {
        $ipaddress  = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN IP Address';

        return $ipaddress;
    }

    public function get_os()
    {
        $os_platform = $_SERVER['HTTP_USER_AGENT'];
        return $os_platform;
    }

    public function getting_browser()
    {
        $browser = '';
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
            $browser = 'Netscape';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
            $browser = 'Firefox';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
            $browser = 'Chrome';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
            $browser = 'Opera';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
            $browser = 'Internet Explorer';
        else
            $browser = 'Other';
        return $browser;
    }

    // Record Addr
}
