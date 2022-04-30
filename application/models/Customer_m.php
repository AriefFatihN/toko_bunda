<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('customer');
        $this->db->order_by("customer_id", "desc");
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($data)
    {
        return $this->db->insert("customer", $data);
    }

    public function update($data)
    {
        $this->db->where('customer_id', $data['customer_id']);
        $this->db->update('customer', $data);
    }

    public function hapus($id)
    {
        $this->db->where('customer_id', $id);
        $this->db->delete('customer');
    }
}
