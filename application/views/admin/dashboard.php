<?php
if ($this->session->flashdata('Berhasil')) {
    echo "<div class='alert alert-info'>";
    echo $this->session->flashdata('Berhasil');
    echo "</div>";
}
?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-info text-white">
                <h4 class="card-title">STATUS SURAT</h4>
                <p class="card-description">
                </p>
                <table class="table" id="example">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Npm</th>
                            <th>Jenis Surat</th>
                            <th>Nama Surat</th>
                            <th>Nama File</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $npm = $this->session->userdata('npm');
                        $transaksi = $this->db->get_where('v_transaksi_surat', array('npm' => $npm))->result();
                        if ($transaksi > 0) {
                            foreach ($transaksi as $row) {
                                echo "<tr>
                            <td>" . $this->session->userdata('nama_lengkap') . "</td>
                            <td>" . $this->session->userdata('npm') . "</td>
                            <td>$row->nama_prihal</td>
                            <td>$row->nama_surat</td>
                            <td>$row->nama_file</td>
                            <td>$row->tanggal_pengajuan</td>";
                                if ($row->status < 1) {
                                    echo "<td><label class='badge badge-danger'>MENUGGU </label></td>
                        </tr>";
                                } else {
                                    echo "<td><label class='badge badge-info'>DITERIMA</label></td>
                        </tr>";
                                   }
                                   
                            }
                        } else {
                            echo "<tr>
                                    <td>" . $this->session->userdata('nama_lengkap') . "</td>
                                    <td>" . $this->session->userdata('npm') . "</td>
                                   <td>ANDA BELUM MENGAJUKAN SURAT</td>";
                            echo "<td>TIDAK ADA</td>
                                 <td>TIDAK ADA</td>
                               </tr>";
                          
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>