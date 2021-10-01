<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_operation extends CI_Model
{
    public function add($data, $tabel){
        $this->db->insert($tabel, $data);
    }

    public function dompet(){
        return $this->db->get('dompet')->result_array();
    }
}
