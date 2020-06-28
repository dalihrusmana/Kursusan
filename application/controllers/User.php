<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $data['pekerjaan'] = ['Sekolah', 'Kuliah', 'Kerja'];
        $data['jenis_kelamin'] = ['Perempuan', 'Laki-laki'];


        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('nama_institusi', 'Nama Institusi', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Keahlian', 'required|trim');
        $this->form_validation->set_rules('portfolio', 'Link Portfolio', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $jk = $this->input->post('jenis_kelamin');
            $pekerjaan = $this->input->post('pekerjaan');
            $institusi = $this->input->post('nama_institusi');
            $keahlian = $this->input->post('keahlian');
            $portfolio = $this->input->post('portfolio');

            //cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image_user'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image_user', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }

            $this->db->set('nama_user', $name);
            $this->db->set('jenis_kelamin', $jk);
            $this->db->set('occupation', $pekerjaan);
            $this->db->set('nama_institusi', $institusi);
            $this->db->set('keahlian', $keahlian);
            $this->db->set('link_portfolio', $portfolio);
            $this->db->where('email_user', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profile kamu sudah diubah!</div>');
            redirect('user');
        }
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email_user' =>
        $this->session->userdata('email_user')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password saat ini salah!</div>');
                redirect('user/ubahpassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password baru tidak boleh sama!</div>');
                    redirect('user/ubahpassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email_user', $this->session->userdata('email_user'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Password berhasil tersimpan!</div>');
                    redirect('user/ubahpassword');
                }
            }
        }
    }
}
