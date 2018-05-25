<?php

Class Model_konfrimasi extends CI_Model {

    function tampil($limit, $start) {
        $query = $this->db->get('v_transaksi_surat', $limit, $start);
        return $query;
    }

    function show(){
        $query = $this->db->get_where('v_transaksi_surat',array('status'=>0));
        return $query;
    }

}
?>