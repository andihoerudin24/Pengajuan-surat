<?php

Class Model_pengguna extends CI_Model {

    function add() {
        $data = array(
            'id_level_user' => $this->input->post('level_user'),
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        );
        $this->db->insert('tbl_user', $data);
    }

    function update() {
        $data = array(
           'id_level_user' => $this->input->post('level_user'),
            'nama_lengkap' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),      //'foto' => $foto
        );
        $id_user =$this->input->post('id_user');
        $this->db->where('id_user',$id_user);
        $this->db->update('tbl_user', $data);
    }

}
?>
