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

        $hasil = $pemasukan - $pengeluaran + 981;
        // if(!$hasil){
        //     $hasil = 0;
        // }
        return $hasil;
    }

    public function getdatawhere($data, $tabel, $where){
        $this->db->select($data);
        $this->db->where($where);
        return $this->db->get($tabel)->result_array();
    }
    
    public function getdatawheredesc($data, $tabel, $where, $id, $desc){
        $this->db->select($data);
        $this->db->where($where);
        $this->db->order_by($id, $desc);
        return $this->db->get($tabel)->result_array();
    }

    public function getdatawhererow($data, $tabel, $where){
        $this->db->select($data);
        $this->db->where($where);
        return $this->db->get($tabel)->row_array();
    }

    public function sumdompet($where){
        $this->db->select_sum('jumlah');
        $this->db->where('status', 'masuk');
        $this->db->where($where);
        $pemasukan = $this->db->get('detail_dompet')->row_array()['jumlah'];

        $this->db->select_sum('jumlah');
        $this->db->where('status', 'keluar');
        $this->db->where($where);
        $pengeluaran = $this->db->get('detail_dompet')->row_array()['jumlah'];
        $hasil = $pemasukan - $pengeluaran;
        if(!$hasil){
            $hasil = 0;
        }
        return $hasil;
    }
}