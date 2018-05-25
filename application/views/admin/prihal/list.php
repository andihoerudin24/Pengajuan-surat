<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-info text-dark">
                <h4 class="card-title">KONFRIMASI SURAT</h4>
                <p class="card-description">
                </p>

<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tamabah Prihal
    </button>
</center>
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Prihal</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($prihal as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nama_prihal</td>
                <td>" . anchor('Admin/Prihal/edit/'.$row->id, 'Edit', array('class' =>'btn btn-info')) . "</td>
                <td>". anchor('Admin/Prihal/Hapus/'.$row->id, 'Hapus',array('class'=> 'btn btn-danger'))."</td>
            </tr>";
            
        $no++;
        }
        ?>

    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open('Admin/Prihal/add');  ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prihal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Prihal</label>
                        <input type="text" name="nama_prihal" class="form-control" required=""  placeholder="nama prihal">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
      <?php echo form_close();  ?>
    </div>
</div>

</div>

        </div>
    </div>

