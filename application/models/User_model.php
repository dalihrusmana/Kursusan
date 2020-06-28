<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    public function getAllDataUser()
    {
        $this->db->where('role_id', 2);
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_user', $keyword);
        $this->db->or_like('email_user', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('occupation', $keyword);
        $this->db->or_like('nama_institusi', $keyword);
        $this->db->or_like('keahlian', $keyword);
        return $this->db->get('user')->result_array();
    }
}
