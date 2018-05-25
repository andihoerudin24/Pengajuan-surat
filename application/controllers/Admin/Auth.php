<?php

Class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_login');
        $this->load->Model('Model_Mahasiswa');
    }
    function index() {
        $this->load->view('admin/login');
    }
    function login() {
        if(isset($_POST['submit'])){
            //proseslogin
         $username= $this->input->post('username');
         $password= $this->input->post('password');
         $result         = $this->Model_login->chek_login($username,$password);
         $login_Mahasiswa=$this->Model_Mahasiswa->chek_login($username,$password);
         if (!empty($result)) {
             //sukses login admin
             $this->session->set_userdata($result);
             redirect('Admin/Dashboard');
         }elseif(!empty($login_Mahasiswa)) {
             //sukses login mahasiwa
             $session= array('nama_lengkap'  =>$login_Mahasiswa['nama_lengkap'],
                             'id_level_user' =>2,
                             'npm'           =>$login_Mahasiswa['npm'],
                 );
             $this->session->set_userdata($session);
             redirect('Admin/Dashboard');
         }else{
             redirect('Admin/Auth');
         }   
         
        }else{
            redirect('Admin/Auth');
        }
    }
}

?>