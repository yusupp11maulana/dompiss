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
			$masuk = [
				'id_dompet'=> $this->session->userdata('id_dompet'),
				'status' => 'Masuk',
			];

			$keluar = [
				'id_dompet'=> $this->session->userdata('id_dompet'),
				'status' => 'Keluar',
			];
			$data['masuk'] = $this->view->getdatawhere('*','detail_dompet',$masuk);
			$data['keluar'] = $this->view->getdatawhere('*','detail_dompet',$keluar);

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
}
