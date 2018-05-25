<?php
Class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        chek_akses_module();
        $this->load->Model('Model_dashboard');
    }
    function index(){
             //$data['transaksi']=$this->db->get('v_transaksi_surat')->result();
             $this->template->load('templateadmin','admin/dashboard');    
    }
}
?>