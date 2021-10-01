<?php
    function fungsilogin(){
        $dompis = get_instance();
        if(!$dompis->session->userdata('id_akun')){
            redirect(base_url());
        }
    }

    function hapussesi($sesi){
        $paskomnas = get_instance();
        $n = count($sesi);
        for($i= 0; $i < $n; $i++){
            $paskomnas->session->unset_userdata($sesi[$i]);
        }
    }