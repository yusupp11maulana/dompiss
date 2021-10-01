<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_view extends CI_Model
{
    public function getdata($data, $tabel){
        $this->db->select($data);
        return $this->db->get($tabel)->result_array();
    }

    public function sum(){
        $this->db->select_sum('jumlah');
        $this->db->where('status', 'masuk');
        $pemasukan = $this->db->get('detail_dompet')->row_array()['jumlah'];

        $this->db->select_sum('jumlah');
        $this->db->where('status', 'keluar');
        $pengeluaran = $this->db->get('detail_dompet')->row_array()['jumlah'];

        $hasil = $pemasukan - $pengeluaran;
        if(!$hasil){
            $hasil = 0;
        }
        return $hasil;
    }
}
