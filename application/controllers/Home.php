<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		fungsilogin();
		$sesi = ['id_dompet'];
		hapussesi($sesi);
        $this->load->model('Model_view', 'view');
        $this->load->model('Model_operation', 'operasi');
        $this->load->library('form_validation');
    }

	public function index(){
		$data = array(
			'title' => "Beranda - Dompet Pisah",
			'getdata' => $this->view->getdata('*', 'dompet'),
			'total' => $this->view->sum(),
		);
		$this->load->view('Home', $data);
	}

	public function tambahdata(){
		$this->form_validation->set_rules('nominal', 'Nominal Uang', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
			redirect('Home');
        } else {
			// Pemasukan
			date_default_timezone_set('Asia/Jakarta');
			$uang = preg_replace("/[^0-9]/", "", $this->input->post('nominal', TRUE));
			$pemasukan = array(
				'tanggal_masuk' => date('Y-m-d'),
				'waktu_masuk' => date('H:i:s'),
				'nominal' => $uang,
			);
			$this->operasi->add($pemasukan, 'pemasukan');

			// Detail_dompet
			$id = $this->operasi->dompet();

			$pemasukan_id = $this->operasi->pemasukan();
			foreach($id as $d){
				$detail = array(
					'id_dompet' => $d['id_dompet'],
					'jumlah' => round(($d['presentase']/100) * $uang),
					'tanggal' => date('Y-m-d'),
					'waktu' => date('H:i:s'),
					'keterangan' => 'Saldo Tambahan',
					'status' => 'Masuk',
					'id_pemasukan' => $pemasukan_id,
				);
				$this->operasi->add($detail, 'detail_dompet');
			}
			$this->session->set_flashdata('data', 'Berhasil');
			redirect('Home');
        }
	}
}