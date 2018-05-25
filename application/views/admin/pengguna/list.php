 <?php echo anchor('Admin/Pengguna/rule', 'RULE USER', array('class' => 'btn btn-sm btn-danger')) ?>
<center>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
        Tamabah Pengguna
    </button>
</center>
<div id="card bg-gradient-warning">
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama pengguna</th>
            <th>Level Pengguna</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($user as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nama_lengkap</td>
                <td>$row->nama_level</td>    
                <td>" . anchor('Admin/Pengguna/edit/' . $row->id_user, 'Edit', array('class' => 'btn btn-info'))."</td>
                <td>" . anchor('Admin/Pengguna/Hapus/' . $row->id_user, 'Hapus', array('class' => 'btn btn-danger'))."</td>
            </tr>";
            
        $no++;
        }
        ?>

    </tbody>
</table>    
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Admin/Pengguna/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengguan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">LEVEL USER</label>
                    <?php echo cmb_dinamis('level_user', 'tbl_level_user', 'nama_level', 'id_level_user') ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>