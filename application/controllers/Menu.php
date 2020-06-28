<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
    }

    public function index()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu baru sudah ditambahkan!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu baru sudah ditambahkan!</div>');
            redirect('menu/submenu');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusDataMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data menu sudah berhasil dihapus!</div');
        redirect('menu');
    }

    public function hapussubmenu($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Sub Menu sudah berhasil dihapus!</div');
        redirect('menu/submenu');
    }

    public function getubah()
    {
        $this->load->model('Menu_model', 'menu');
        echo json_encode($this->menu->getUbahData($_POST['id']));
    }

    public function ubah()
    {
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->ubahData($_POST['id']);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu berhasil diedit!</div>');
            redirect('menu/submenu');
        }
    }

    public function getubahmenu()
    {
        $this->load->model('Menu_model', 'menu');
        echo json_encode($this->menu->getUbahDataMenu($_POST['id']));
    }

    public function ubahmenu()
    {
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $this->load->model('Menu_model', 'menu');

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubahmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->menu->ubahDataMenu($_POST['id']);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu berhasil diedit!</div>');
            redirect('menu');
        }
    }
}
