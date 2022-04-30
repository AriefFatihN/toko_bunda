<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('product_item.*, product_category.name as category_name');
        $this->db->from('product_item');
        $this->db->join('product_category', 'product_category.category_id = product_item.category_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_barcode($barcode = null)
    {
        $this->db->select('product_item.*, product_category.name as category_name');
        $this->db->from('product_item');
        $this->db->join('product_category', 'product_category.category_id = product_item.category_id');
        if ($barcode != null) {
            $this->db->where('barcode', $barcode);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'barcode' =>  $post['barcode'],
            'name' =>  $post['product_name'],
            'category_id' =>  $post['category'],
            'price' =>  $post['price'],
            'image' =>  $post['image'],
            'batasan_qty' => $post['batasan_qty'],
            'potongan' => $post['potongan'],
        ];
        $this->db->insert('product_item', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' =>  $post['barcode'],
            'name' =>  $post['product_name'],
            'category_id' =>  $post['category'],
            'price' =>  $post['price'],
            'batasan_qty' => $post['batasan_qty'],
            'potongan' => $post['potongan'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }

        $this->db->where('item_id', $post['id']);
        $this->db->update('product_item', $params);
    }

    public function delete($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('product_item');
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('product_item');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE product_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    public function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE product_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
}
