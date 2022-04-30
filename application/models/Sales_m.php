<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sales_m extends CI_Model
{
    function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice, 12, 4)) AS invoice_no
                FROM transaction_sales
                WHERE MID(invoice, 6, 6) = DATE_FORMAT(CURDATE(), '%d%m%y')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "BUNDA" . date('dmy') . $no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, product_item.name as item_name, transaction_cart.price as cart_price, product_item.potongan as diskon');
        $this->db->from('transaction_cart');
        $this->db->join('product_item', 'transaction_cart.item_id = product_item.item_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM transaction_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'cart_id' => $car_no,
            'item_id' => $post['item_id'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'discount_item' => $post['discount'],
            'total' => ($post['price'] * $post['qty']),
            'user_id' => $this->session->userdata('user_id'),
        );
        $this->db->insert('transaction_cart', $params);
    }

    function update_cart_qty($post)
    {
        $sql = "UPDATE transaction_cart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                total = '$post[price]' * qty
                WHERE item_id = '$post[item_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('transaction_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price'         => $post['price'],
            'qty'           => $post['qty'],
            'discount_item' => $post['discount'],
            'total'         => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('transaction_cart', $params);
    }

    public function add_sales($post)
    {
        $params = array(
            'invoice'           => $this->invoice_no(),
            'customer_id'       => $post['customer_id'] == "" ? null : $post['customer_id'],
            'total_price'       => $post['subtotal'],
            'discount_sale'     => $post['discount_sale'],
            'discount_all'      => $post['discount_all'],
            'final_price'       => $post['grandtotal'],
            'cash'              => $post['cash'],
            'remaining'         => $post['change'],
            'note'              => $post['note'],
            'date'              => $post['date'],
            'user_id'           => $this->session->userdata('user_id')
        );
        $this->db->insert('transaction_sales', $params);
        return $this->db->insert_id();
    }

    function add_sales_detail($params)
    {
        $this->db->insert_batch('transaction_sales_detail', $params);
    }

    public function get_sales($id = null)
    {
        $this->db->select('*, customer.name as customer_name, user.username as user_name, transaction_sales.created as sales_created');
        $this->db->from('transaction_sales');
        $this->db->join('customer', 'transaction_sales.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 'transaction_sales.user_id = user.user_id');

        if ($id != null) {
            $this->db->where('sales_id', $id);
        }
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }


    public function get_sales_pagination($limit = null, $start = null)
    {
        $post = $this->session->userdata('search');
        $this->db->select('*, customer.name as customer_name, user.name as user_name, transaction_sales.created as sales_created');
        $this->db->from('transaction_sales');
        $this->db->join('customer', 'transaction_sales.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 'transaction_sales.user_id = user.user_id');
        if (!empty($post['date1']) && !empty($post['date2'])) {
            $this->db->where("transaction_sales.date BETWEEN '$post[date1]' AND '$post[date2]'");
        }
        if (!empty($post['customer'])) {
            if ($post['customer'] == 'null') {
                $this->db->where("transaction_sales.customer_id IS NULL");
            } else {
                $this->db->where("transaction_sales.customer_id", $post['customer']);
            }
        }
        if (!empty($post['invoice'])) {
            $this->db->like("invoice", $post['invoice']);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('sales_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_sales_detail($sales_id = null)
    {
        $this->db->from('transaction_sales_detail');
        $this->db->join('product_item', 'transaction_sales_detail.item_id = product_item.item_id');

        if ($sales_id != null) {
            $this->db->where('transaction_sales_detail.sales_id', $sales_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del_sales($id)
    {
        $this->db->where('sales_id', $id);
        $this->db->delete('transaction_sales');
    }

    public function gettahun()
    {
        $this->db->select('YEAR(created) as tahun');
        $this->db->from('transaction_sales');
        $this->db->group_by('YEAR(created)');
        $this->db->order_by('YEAR(created)', 'asc');

        return $this->db->get()->result();
    }

    public function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        $this->db->select('transaction_sales.*, customer.name as customer_name');
        $this->db->from('transaction_sales');
        $this->db->join('customer', 'transaction_sales.customer_id = customer.customer_id', 'left');
        $this->db->where("transaction_sales.created BETWEEN '$tanggalawal' AND '$tanggalakhir'", NULL, FALSE);
        $this->db->order_by('created', 'asc');

        return $this->db->get()->result();
    }

    public function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $this->db->select('transaction_sales.*, customer.name as customer_name');
        $this->db->from('transaction_sales');
        $this->db->join('customer', 'transaction_sales.customer_id = customer.customer_id', 'left');
        $this->db->where('YEAR(transaction_sales.created)', $tahun1);
        $this->db->where("MONTH(transaction_sales.created) BETWEEN $bulanawal AND $bulanakhir", NULL, FALSE);
        $this->db->order_by('created', 'asc');

        return $this->db->get()->result();
    }

    public function filterbytahun($tahun2)
    {
        $this->db->select('transaction_sales.*, customer.name as customer_name');
        $this->db->from('transaction_sales');
        $this->db->join('customer', 'transaction_sales.customer_id = customer.customer_id', 'left');
        $this->db->where('YEAR(transaction_sales.created)', $tahun2);
        $this->db->order_by('created', 'asc');

        return $this->db->get()->result();
    }
}
