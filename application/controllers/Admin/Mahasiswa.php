<?php
class Mahasiswa extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->Model('Model_Mahasiswa');
        chek_akses_module();
    }
            
    
    function index(){
        $data['mahasiswa']= $this->db->get('tbl_mahasiswa')->result();
        $this->template->load('templateadmin','admin/mahasiswa/list',$data);
    }
}


?>