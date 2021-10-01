<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		fungsilogin();
		$sesi = array();
		hapussesi($sesi);
        $this->load->model('Model_view', 'view');
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
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('Home');
        } else {
			$this->_verify();
			redirect('Home');
        }
	}
}
