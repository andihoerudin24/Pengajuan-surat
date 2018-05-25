<?php

Class Prihal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_prihal');
        chek_akses_module();
    }

    function index() {
        $data['prihal'] = $this->db->get('tbl_jenis_surat')->result();
        $this->template->load('templateadmin', 'admin/prihal/list', $data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_prihal->add();
            redirect('Admin/Prihal');
        } else{
            $this->template->load('templateadmin', 'admin/prihal/list');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_prihal->edit();   
            redirect('Admin/Prihal');
        } else {
            $id = $this->uri->segment(4);
            $data['prihal'] = $this->db->get_where('tbl_jenis_surat', array('id' => $id))->row_array();
            $this->template->load('templateadmin', 'admin/prihal/edit', $data);
        }
    }
    
    function hapus(){
        $id= $this->uri->segment(4);
        $this->db->where('id',$id);
        $this->db->delete('tbl_jenis_surat');
        redirect('Admin/Prihal');
    }

}

?>