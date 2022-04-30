<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Stock_m extends CI_Model
{
    /* Global Function */
    public function get($id = null)
    {
        $this->db->from('transaction_stock');
        if ($id != null) {
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('transaction_stock');
    }

    /* Barang Masuk */
    public function get_stock_in()
    {
        $this->db->select('transaction_stock.stock_id, product_item.barcode, product_item.name as item_name, qty, date, detail, supplier.name as supplier_name, product_item.item_id');
        $this->db->from('transaction_stock');
        $this->db->join('product_item', 'transaction_stock.item_id = product_item.item_id');
        $this->db->join('supplier', 'transaction_stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'In');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    
    public function add_stock_in($post)
    {
        $params =
            [
                'item_id' => $post['item_id'],
                'type' => 'In',
                'detail' => $post['detail'],
                'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
                'qty' => $post['qty'],
                'date' => $post['date'],
                'user_id' => $this->session->userdata('user_id'),
            ];
        $this->db->insert('transaction_stock', $params);
    }

    /* Barang Keluar */
    public function get_stock_out()
    {
        $this->db->select('transaction_stock.stock_id, product_item.barcode, product_item.name as item_name, qty, date,  detail, supplier.name as supplier_name, product_item.item_id');
        $this->db->from('transaction_stock');
        $this->db->join('product_item', 'transaction_stock.item_id = product_item.item_id');
        $this->db->join('supplier', 'transaction_stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'Out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $params =
            [
                'item_id' => $post['item_id'],
                'type' => 'Out',
                'detail' => $post['detail'],
                'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
                'qty' => $post['qty'],
                'date' => $post['date'],
                'user_id' => $this->session->userdata('user_id'),
            ];
        $this->db->insert('transaction_stock', $params);
    }
}

/* End of file Stock_m.php */
