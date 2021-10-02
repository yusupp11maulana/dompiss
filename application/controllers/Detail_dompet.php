<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_dompet extends CI_Controller {
	public function __construct(){
        parent::__construct();
		fungsilogin();
		$sesi = array();
		hapussesi($sesi);
        $this->load->model('Model_view', 'view');
        $this->load->model('Model_operation', 'operasi');
        $this->load->library('form_validation');
    }

	public function index(){
		if(!$this->session->userdata('id_dompet')){
			redirect('Home');
		} else {
			$data['title'] = "Detail Dompet - Dompet Pisah";
			$data['id_wallet'] = $this->session->userdata('id_dompet');

			$masuk = [
				'id_dompet'=> $this->session->userdata('id_dompet'),
				'status' => 'Masuk',
			];
			$keluar = [
				'id_dompet'=> $this->session->userdata('id_dompet'),
				'status' => 'Keluar',
			];
			$dompet = ['id_dompet' => $data['id_wallet'] ];

			$data['dompet'] = $this->view->getdatawhererow('*','dompet',$dompet);
			$data['masuk'] = $this->view->getdatawhere('*','detail_dompet',$masuk);
			$data['keluar'] = $this->view->getdatawhere('*','detail_dompet',$keluar);
			$data['saldo'] = $this->view->sumdompet($dompet);

			// var_dump($data);die;
			$this->load->view('Detail', $data);
		}
	}

	public function getid($id){
		$data = array(
			'id_dompet' => $id
		);
		$this->session->set_userdata($data);
		redirect('Detail_dompet');
	}

	public function pengeluaran($id){
		date_default_timezone_set('Asia/Jakarta');
		$this->form_validation->set_rules('nominal', 'Nominal Uang', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Nominal Uang', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Detail_dompet/getid/'.$id);
        } else {
			$in = $this->input->post(null, TRUE);
			$pengeluaran =  array(
				'id_dompet' => $id,
				'jumlah' => $in['nominal'],
				'tanggal' => date('Y-m-d'),
				'waktu' => date('H:i:s'),
				'keterangan' => $in['keterangan'],
				'status' => 'Keluar'
			);
			$this->operasi->add($pengeluaran, 'detail_dompet');
			redirect('Detail_dompet/getid/'.$id);
        }
	}
}
