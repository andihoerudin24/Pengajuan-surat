<?php
Class Model_Mahasiswa extends CI_Model{
    
    function chek_login($username, $password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $user = $this->db->get('tbl_mahasiswa')->row_array();
        return $user;
    }
    
    
}
?>