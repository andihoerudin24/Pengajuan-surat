<?php
Class Pengajuan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pengajuan');
        chek_akses_module();
    }

    function index() {
        $this->template->load('templateadmin', 'admin/pengajuan/list');
    }
    
    function ajukan(){
        if(isset($_POST['submit'])){
            $uploads = $this->upload();
            $this->Model_pengajuan->add($uploads);
            echo $this->session->set_flashdata('Berhasil','Berhasil Mengajukan Surat Menunggu Konfrimasi....');
            redirect('Admin/Dashboard');
        }else{
            $this->template->load('templateadmin', 'admin/pengajuan/list');
        }
    }
    
    function upload() {
        $config['upload_path'] = './uploads/mahasiswa/';
        $config['allowed_types'] = 'pdf|docx';
        $config['max_size'] = 8000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }
    
}
?>