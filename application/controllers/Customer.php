<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('customer_m');
    }

    public function index()
    {
        $data['row'] = $this->customer_m->get();
        $this->template->load('backend/template', 'customer/customer_data', $data);
    }

    public function tambah()
    {
        $data = array(
            'name'      => $this->input->post("customer_name"),
            'gender'    => $this->input->post("gender"),
            'phone'     => $this->input->post("phone"),
            'address'   => $this->input->post("address"),
        );

        $this->customer_m->tambah($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Pelanggan Baru Berhasil Disimpan");
        } else {
            $this->toastr->error("Pelanggan Baru Gagal Disimpan");
        }
        redirect('customer');
    }

    public function update($customer_id)
    {
        $data = array(
            'customer_id'   => $customer_id,
            'name'          => $this->input->post("customer_name"),
            'gender'        => $this->input->post("gender"),
            'phone'         => $this->input->post("phone"),
            'address'       => $this->input->post("address"),
        );
        $this->customer_m->update($data);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Pelanggan Berhasil Di Update");
        } else {
            $this->toastr->error("Pelanggan Tidak Di Update");
        }
        redirect('customer');
    }

    public function hapus($id)
    {
        $this->customer_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
            $this->toastr->success("Data Pelanggan Berhasil Di Hapus");
        } else {
            $this->toastr->error("Data Pelanggan Gagal Di Hapus");
        }
        redirect('customer');
    }
}
