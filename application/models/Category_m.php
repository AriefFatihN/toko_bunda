<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('product_category');
        $this->db->order_by("category_id", "desc");
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert("product_category", $data);
    }

    public function update($data)
    {
        $this->db->where('category_id', $data['category_id']);
        $this->db->update('product_category', $data);
    }

    public function hapus($id)
    {
        $this->db->where('category_id', $id);
        $this->db->delete('product_category');
    }
}
