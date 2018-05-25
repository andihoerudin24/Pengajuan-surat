<?php

Class Pengguna extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pengguna');
        //$this->Load->Model('Model_pengguna');
        chek_akses_module();
    }

    function index() {
        $data['user'] = $this->db->get('v_user')->result();
        $this->template->load('templateadmin', 'admin/pengguna/list', $data);
    }

    function add() {
        if (isset($_POST['submit'])) {
            $this->Model_pengguna->add();
            redirect('Admin/Pengguna');
        } else {
            $this->template->load('templateadmin', 'admin/pengguna/list');
        }
    }

    function edit() {
        if (isset($_POST['submit'])) {
            $this->Model_pengguna->update();
            redirect('Admin/Pengguna');
        } else {
            $id = $this->uri->segment(4);
            $data['user'] = $this->db->get_where('tbl_user', array('id_user' => $id))->row_array();
            $this->template->load('templateadmin', 'admin/pengguna/edit', $data);
        }
    }

    function hapus() {
        $id = $this->uri->segment(4);
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
        redirect('Admin/Pengguna');
    }

    function rule() {
        $this->template->load('templateadmin', 'admin/pengguna/rule');
    }

    function modul() {
        $level_user = $_GET['level_user'];
        echo "  <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NAMA MODULE</th>
                            <th>Link</th>
                            <th>HAK AKSES</th>
                        </tr>";
        $menu = $this->db->get('tbl_menu');
        $no = 1;
        foreach ($menu->result() as $row) {
            echo "<tr>
                           <td>$no</td>
                           <td>" . strtoupper($row->nama_menu) . "</td>
                           <td>$row->link</td>
                           <td><input type='checkbox' ";
            $this->check_akses($level_user, $row->id);
            echo " name='akses' onClick='addrule($row->id)'></td>  
                         </tr>";
            $no++;
        }
        echo "</thead>
                </table>";
    }

    function check_akses($level_user, $id_menu) {
        $data = array('id_level_user' => $level_user,
            'id_menu' => $id_menu);
        $chek = $this->db->get_where('tbl_user_rule', $data);
        if ($chek->num_rows() > 0) {
            echo "Checked";
        }
    }

    function add_rule() {
        $level_user = $_GET['level_user'];
        $id_menu = $_GET['id_menu'];
        $data = array('id_level_user' => $level_user,
            'id_menu' => $id_menu
        );
        $chek = $this->db->get_where('tbl_user_rule', $data);
        if ($chek->num_rows() < 1) {
            $this->db->insert('tbl_user_rule', $data);
        } else {
            $this->db->where('id_menu', $id_menu);
            $this->db->where('id_level_user', $level_user);
            $this->db->delete('tbl_user_rule');
        }
    }

}

?>