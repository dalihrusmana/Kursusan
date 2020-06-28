<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index()
    {
        $data['title'] = 'Katalog Kelas';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer');
    }
}
