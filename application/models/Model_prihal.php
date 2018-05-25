<?php

Class Model_prihal extends CI_Model {

    function add() {
        $data=array(
            'nama_prihal' => $this->input->post('nama_prihal'),
        );
        $this->db->insert('tbl_jenis_surat',$data);
    }
    function edit(){
        $data=array(
            'nama_prihal' => $this->input->post('nama_prihal'),
        );
        $id= $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('tbl_jenis_surat',$data);
    }
}
?>