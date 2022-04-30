<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{
		check_not_login();

		$query = $this->db->query("SELECT transaction_sales_detail.item_id, product_item.name, (SELECT SUM(transaction_sales_detail.qty)) AS sold
		FROM transaction_sales_detail
		INNER JOIN transaction_sales ON transaction_sales_detail.sales_id = transaction_sales.sales_id
		INNER JOIN product_item ON transaction_sales_detail.item_id = product_item.item_id
		WHERE MID(transaction_sales.date, 6, 2) = DATE_FORMAT(CURDATE(), '%m')
		GROUP BY transaction_sales_detail.item_id
		ORDER BY sold DESC
		LIMIT 10
		");

		$data['row'] = $query->result();
		$this->template->load('backend/template', 'backend/dashboard', $data);
	}
}
