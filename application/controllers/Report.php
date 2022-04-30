<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('sales_m');
    }
    
    public function sales()
    {
        $this->load->model('customer_m');
        $this->load->library('pagination');
        if (isset($_POST['reset'])) {
            $this->session->unset_userdata('search');
        }
        if (isset($_POST['filter'])) {
            $post = $this->input->post(null, TRUE);
            $this->session->set_userdata('search', $post);
        } else {
            $post = $this->session->userdata('search');
        }

        $config['base_url'] = site_url('report/sales');
        $config['total_rows'] = $this->sales_m->get_sales_pagination()->num_rows();
        $config['attributes'] = ['class' => 'page-link'];
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="paginate_button page-item next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_button page-item previous">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['customer'] = $this->customer_m->get()->result();
        $data['row'] = $this->sales_m->get_sales_pagination($config['per_page'], $this->uri->segment(3));
        $data['post'] = $post;
        $this->template->load('backend/template', 'report/riwayat_transaksi', $data);
    }

    public function sales_product($sales_id = null)
    {
        $detail = $this->sales_m->get_sales_detail($sales_id)->result();
        echo json_encode($detail);
    }
}
