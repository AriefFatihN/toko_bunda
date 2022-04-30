<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get();

        $this->template->load('backend/template', 'user/user_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Password Confirmation',
            'required|min_length[5]|matches[password]',
            array('matches' => '%s Tidak Sesuai dengan Password')
        );

        $this->form_validation->set_message('min_length[5]', '%s Minimal 5 Karakter');
        $this->form_validation->set_message('is_unique', '%s Sudah Pernah di Gunakan, Silahkan Ubah');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('backend/template', 'user/user_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data User Berhasil Disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data User Gagal Disimpan');
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation',
                'min_length[5]|matches[password]',
                array('matches' => '%s Tidak Sesuai dengan Password')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation',
                'required|min_length[5]|matches[password]',
                array('matches' => '%s Tidak Sesuai dengan Password')
            );
        }

        $this->form_validation->set_message('min_length[5]', '%s Minimal 5 Karakter');
        $this->form_validation->set_message('is_unique', '%s Sudah Pernah di Gunakan, Silahkan Ubah');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('backend/template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data Tidak Ditemukan');";
                echo "window.location='" . site_url('user') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data User Berhasil Di Update');
            } else {
                $this->session->set_flashdata('error', 'Data User Gagal Di Update');
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s Sudah Pernah di Gunakan, Silahkan Ubah');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete($id)
    {
        $this->user_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('user');
    }
}
