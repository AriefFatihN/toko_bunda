<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('supplier_m');
    }

    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('backend/template', 'supplier/supplier_data', $data);
    }

    public function tambah()
    {
        $data = array(
            'name'          => $this->input->post("supplier_name"),
            'phone'         => $this->input->post("phone"),
            'address'       => $this->input->post("address"),
            'description'   => $this->input->post("description"),
        );

        $this->supplier_m->tambah($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Supplier Baru Berhasil Disimpan");
        } else {
            $this->toastr->error("Supplier Baru Gagal Disimpan");
        }
        redirect('supplier');
    }

    public function update($supplier_id)
    {
        $data = array(
            'supplier_id'   => $supplier_id,
            'name'          => $this->input->post("supplier_name"),
            'phone'         => $this->input->post("phone"),
            'address'       => $this->input->post("address"),
            'description'   => $this->input->post("description"),
        );
        $this->supplier_m->update($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Supplier Berhasil Di Update");
        } else {
            $this->toastr->error("Supplier Tidak Di Update");
        }
        redirect('supplier');
    }

    public function hapus($id)
    {
        $this->supplier_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Data Supplier Berhasil Di Hapus");
        } else {
            $this->toastr->error("Data Supplier Gagal Di Hapus");
        }
        redirect('supplier');
    }
}
