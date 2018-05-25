<?php

class Model_surat extends CI_Model {

    function add($uploads) {
        $data = array(
            'nama_surat'  => $this->input->post('nama_surat'),
            'jenis_surat' => $this->input->post('jenis_surat'),
            'nama_file'   => $uploads,
        );
        $this->db->insert('tbl_surat',$data);
        //$this->db->insert('tbl_surat',$data);
    }

}

?>