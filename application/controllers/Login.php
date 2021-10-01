<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Model_dompis', 'dompis');
        $this->load->library('form_validation');
    }

	public function index(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data = array(
				'title' => 'Login - Dompet Pisah',
			);
			$this->load->view('Login', $data);
        } else {
			$this->_verify();
        }
	}

	public function _verify(){
		$in = $this->input->post(null, TRUE);
		$uname =  $in['username'];
		$pass = $in['password'];
		$user = $this->db->get_where('akun', ['username'=>$uname])->row_array();
		if($user){
			if (password_verify($pass, $user['password'])) {
				$data = [
					'id_akun' => $user['id_akun'],
				];
				$this->session->set_userdata($data);
				redirect('Home');
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}

	public function logout(){
		$this->session->unset_userdata('id_akun');
        redirect(base_url());
	}
}
