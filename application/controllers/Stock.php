<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
    }

    /* Barang Masuk */
    public function stock_in_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('backend/template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('backend/template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_delete()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_out($data);
        $this->stock_m->delete($stock_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-In Berhasil Dihapus');
        }
        redirect('stock/in');
    }

    /* Barang Keluar */
    public function stock_out_data()
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('backend/template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('backend/template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_delete()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->delete($stock_id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-Out Berhasil Dihapus');
        }
        redirect('stock/out');
    }

    /* Global Function */
    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-In Berhasil Disimpan');
            }
            redirect('stock/in');
        } else {
            if (isset($_POST['out_add'])) {
                $post = $this->input->post(null, TRUE);
                $this->stock_m->add_stock_out($post);
                $this->item_m->update_stock_out($post);

                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data Stock-Out Berhasil Disimpan');
                }
                redirect('stock/out');
            }
        }
    }
}
