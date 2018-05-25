<?php
Class Model_pengajuan extends CI_Model{
    
    function add($uploads){
        $data=array(
            'npm'       =>$this->input->post('npm'),
            'nama_file' =>$uploads,
            'id_surat' => $this->input->post('surat'),
            );
        $this->db->insert('transaksi_surat',$data);
    }
}
?>