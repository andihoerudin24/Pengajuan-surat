    <?php
Class Konfrimasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_konfrimasi');
        chek_akses_module();
    }

    function index(){
        $this->template->load('templateadmin', 'admin/konfrimasi');
    }

    function data(){
        /*
        $this->load->library('pagination');
        $config['base_url'] = site_url() . '/Admin/Konfrimasi/';
        $config['total_rows'] = $this->db->count_all('v_transaksi_surat');
        $config['per_page'] = 1;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        //style paging
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $paging = $this->pagination->create_links();
        */
        echo "<table class='table table-bordered table-responsive bg-white text-black'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Npm</th>
                            <th>Jenis Surat</th>
                            <th>Nama Surat</th>
                            <th>Tanggal</th>
                            <th>Nama file</th>
                            <th>Cek Surat</th>
                            <th width='170'>Status</th>
                        </tr>
                    </thead>";
           //$data= $this->Model_konfrimasi->tampil($config['per_page'], $data['page'])->result();
           $data= $this->Model_konfrimasi->show()->result();
           $no=1;
           foreach ($data as $row) {
            echo   "<tr>
                            <td>$no</td>
                            <td>$row->nama_lengkap</td>
                            <td>$row->npm</td>
                            <td>$row->nama_prihal</td>
                            <td>$row->nama_surat</td>
                            <td>$row->tanggal_pengajuan</td>
                            <td>$row->nama_file</td>
                            <td>".anchor('Admin/Konfrimasi/donwload/'.$row->id_transaksi,'Cek Surat',array('class'=>'btn btn-danger btn-sm'))."</td>
                            <td>
                            <select name='status' id='status' class='form form-control' Onchange='status($row->id_transaksi)'>
                            <option nama='Belum' value='0'>Belum</option>
                            <option nama='Sudah' id='sudah' value='1'>Acc</option>
                            </select>
                             </td>
                            
                        </tr>";
                 $no++;
          }
        echo    "</table>";
       // echo $paging;
           
           
    }
     function donwload(){
        $this->load->helper('download');
        $id= $this->uri->segment(4);
        $data= $this->db->get_where('v_transaksi_surat',array('id_transaksi'=>$id))->result();
        foreach ($data as $row) {
            $nama=$row->nama_surat;
            $nama_file=$row->nama_file;
        }
       force_download('uploads/mahasiswa/'.$nama_file,NULL);
    }
    
    function ubah_status(){
        $id=$_GET['id'];
        $sudah=$_GET['sudah'];
        $data=array(
            'status'=>$sudah,
         );
        $id_transaksi=$id;
        $this->db->where('id_transaksi',$id_transaksi);
        $this->db->update('v_transaksi_surat',$data);
        $row = $this->db->where('id_transaksi',$id)->get('v_transaksi_surat')->row();
        unlink('uploads/mahasiswa/'.$row->nama_file);
        
    }
}
?>