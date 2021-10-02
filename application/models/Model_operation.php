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

    public function delete($tabel, $where){
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function pemasukan(){
        $this->db->select_max('id_pemasukan');
        return $this->db->get('pemasukan')->row_array()['id_pemasukan'];

    }
}
