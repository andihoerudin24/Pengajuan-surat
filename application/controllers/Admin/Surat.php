<?php

Class Surat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_surat');
        chek_akses_module();
    }

    function index() {
        $data['surat']= $this->db->query("SELECT ts.id_surat, ts.nama_Surat,tj.nama_prihal FROM `tbl_surat`as ts, tbl_jenis_Surat as tj where ts.jenis_surat=tj.id")->result();                
        $this->template->load('templateadmin', 'admin/surat/list',$data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $uploads = $this->upload_surat();
            $this->Model_surat->add($uploads);
            echo $this->session->set_flashdata('Berhasil','Berhasil Menambahkan Surat....');
            redirect('Admin/Surat');
        } else {
            $this->template->load('templateadmin', 'admin/surat/list');
        }
    }

    function upload_surat() {
        $config['upload_path'] = './uploads/surat';
        $config['allowed_types'] = 'pdf|docx';
        $config['max_size'] = 8000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('userfile');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }
    
    function donwload(){
        $this->load->helper('download');
        $id= $this->uri->segment(4);
        $data= $this->db->get_where('tbl_surat',array('id_surat'=>$id))->result();
        foreach ($data as $row) {
            $nama     =$row->nama_surat;
            $nama_file=$row->nama_file;
        }
       force_download('uploads/surat/'.$nama_file,NULL);
    }

    
    function hapus(){
        $id_surat= $this->uri->segment(4);
        $row = $this->db->where('id_surat',$id_surat)->get('tbl_surat')->row();
        unlink('uploads/surat/'.$row->nama_file);
        $this->db->where('id_surat',$id_surat);
        $this->db->delete('tbl_surat');
        echo $this->session->set_flashdata('Hapus','Berhasil Menghapus Surat ..!!!');
        redirect('Admin/Surat');
    }
    
    function cetak() {
        $this->template->load('templateadmin', 'admin/surat/tes');
    }

}

?>