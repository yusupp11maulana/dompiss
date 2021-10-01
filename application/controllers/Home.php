<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		fungsilogin();
		$sesi = array();
		hapussesi($sesi);
        $this->load->model('Model_dompis', 'dompis');
        $this->load->library('form_validation');
    }

	public function index(){
		$data = array(
			'title' => "Beranda - Dompet Pisah",
		);
		$this->load->view('Home', $data);
	}
}
