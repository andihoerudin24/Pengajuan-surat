<?php

Class Pilih_surat extends CI_Controller {

    function __construct() {
        parent::__construct();
        chek_akses_module();
    }
            
    function index() {

        $this->template->load('templateadmin', 'admin/pilih/list');
    }

    function loaddata() {
        $prihal = $_GET['prihal'];
        echo "<table class='table table-striped table-resposive'>
           <tr>
             <th>NO</th>
             <th>NAMA SURAT</th>
             <th>DONWLOAD SURAT</th>
           </tr>";
        $surat = $this->db->query("SELECT * FROM `tbl_surat` WHERE jenis_surat=$prihal")->result();
        $no = 1;
        foreach ($surat as $row) {
            echo "<tr>
              <td>$no</td>
              <td>$row->nama_surat</td>
              <td>" . anchor('Admin/Pilih_surat/donwload/' . $row->id_surat, 'Donwload', array('class' => 'btn btn-danger btn-sm')) . "</td>
           </tr>";
            $no++;
        }

        echo "</table>";
    }

    function donwload() {
        $this->load->helper('download');
        $id = $this->uri->segment(4);
        $data = $this->db->get_where('tbl_surat', array('id_surat' => $id))->result();
        foreach ($data as $row) {
            $nama = $row->nama_surat;
            $nama_file = $row->nama_file;
        }
        force_download('uploads/surat/' . $nama_file, NULL);
    }

}

?>