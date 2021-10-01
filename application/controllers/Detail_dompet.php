<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_dompet extends CI_Controller {
	public function index(){
		$data = array(
			'title' => "Detail Dompet - Dompet Pisah",
		);
		$this->load->view('Detail', $data);
	}
}
