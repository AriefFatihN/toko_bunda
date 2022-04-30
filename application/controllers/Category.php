<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->category_m->get();
        $this->template->load('backend/template', 'product/category/category_data', $data);
    }

    public function tambah()
    {
        $data = array(
            'name'          => $this->input->post("category_name"),
        );

        $this->category_m->tambah($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Kategori Baru Berhasil Disimpan");
        } else {
            $this->toastr->error("Kategori Baru Gagal Disimpan");
        }
        redirect('category');
    }

    public function update($category_id)
    {
        $data = array(
            'category_id'   => $category_id,
            'name'          => $this->input->post("category_name"),
            'updated'       => date('Y-m-d H:i:s'),
        );
        $this->category_m->update($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Kategori Berhasil Di Update");
        } else {
            $this->toastr->error("Kategori Tidak Di Update");
        }
        redirect('category');
    }

    public function hapus($id)
    {
        $this->category_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Data Kategori Berhasil Di Hapus");
        } else {
            $this->toastr->error("Data Kategori Gagal Di Hapus");
        }
        redirect('category');
    }
}
