<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('item_m');
        $this->load->model('category_m');
    }

    public function index()
    {
        $data['row'] = $this->item_m->get();
        $this->template->load('backend/template', 'product/item/item_data', $data);
    }
    
    public function tambah()
    {
        $item =  new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null;
        $item->price = null;
        $item->batasan_qty = null;
        $item->potongan = null;
        $item->category_id = null;
        $query_category = $this->category_m->get();

        $data = array(
            'page' => 'tambah',
            'row' => $item,
            'category' => $query_category,
        );
        $this->template->load('backend/template', 'product/item/item_form', $data);
    }

    public function update($id)
    {
        $query = $this->item_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_m->get();

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
            );
            $this->template->load('backend/template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');";
            echo "window.location='" . site_url('item') . "';</script>";
        }
    }

    public function hapus($id)
    {
        $item = $this->item_m->get($id)->row();
        if ($item->image != null) {
            $target_file = './uploads/product/' . $item->image;
            unlink($target_file);
        }
        $this->item_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus');
        }
        redirect('item');
    }

    public function process()
    {
        $config['upload_path']      = './uploads/product';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|';
        $config['max_size']         = '100000000000';
        $config['file_name']         = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] Sudah Dipakai Pada Barang lain");
                redirect('item/tambah');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->tambah($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/tambah');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan');
                    }
                    redirect('item');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] Sudah Dipakai Pada Barang lain");
                redirect('item/edit/' . $post['id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {

                        $item = $this->item_m->get($post['id'])->row();
                        if ($item->image != null) {
                            $target_file = './uploads/product/' . $item->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->item_m->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data Produk Berhasil Di Update');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/tambah');
                    }
                } else {
                    $post['image'] = null;
                    $this->item_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data Produk Berhasil Di Update');
                    }
                    redirect('item');
                }
            }
        }
    }

    function barcode_print($id)
    {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/barcode_print', $data, true);
        $kertas = array(0, 0, 200.00, 120.00);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['row']->barcode, $kertas, 'portrait');
    }
}
