<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        $this->db->order_by("supplier_id", "desc");
        if ($id != null) {
            $this->db->where('supplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert("supplier", $data);
    }

    public function update($data)
    {
        $this->db->where('supplier_id', $data['supplier_id']);
        $this->db->update('supplier', $data);
    }

    public function hapus($id)
    {
        $this->db->where('supplier_id', $id);
        $this->db->delete('supplier');
    }
}
