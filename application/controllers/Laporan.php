<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('sales_m');
    }

    public function index()
    {
        $data['tahun'] = $this->sales_m->gettahun();
        $this->template->load('backend/template', 'report/rekap_data_transaksi', $data);
    }

    public function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = "Laporan Penjualan";
            $data['subtitle'] = "Periode Tanggal : " . $tanggalawal . ' Sampai dengan Tanggal : ' . $tanggalakhir;
            $data['datafilter'] = $this->sales_m->filterbytanggal($tanggalawal, $tanggalakhir);

            $this->load->view('report/cetak_lap_sales', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = "Laporan Penjualan";
            $data['subtitle'] = "Periode Bulan : " . $bulanawal . ' Sampai dengan Bulan : ' . $bulanakhir;
            $data['datafilter'] = $this->sales_m->filterbybulan($tahun1, $bulanawal, $bulanakhir);

            $this->load->view('report/cetak_lap_sales', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = "Laporan Penjualan";
            $data['subtitle'] = "Periode Tahun : " . $tahun2;
            $data['datafilter'] = $this->sales_m->filterbytahun($tahun2);

            $this->load->view('report/cetak_lap_sales', $data);
        }
    }
}
