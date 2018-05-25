<?php
Class Model_dashboard extends CI_Model{
    
    
    function tampil_v_transaksi($limit, $start) {
        $npm= $this->session->userdata('npm');
        $query=$this->db->get_where('v_transaksi_surat',array('npm' =>$npm),$limit,$start);
         // $query = $this->db->get('v_transaksi_surat', $limit, $start);
        return $query;
    }
    
}
?>