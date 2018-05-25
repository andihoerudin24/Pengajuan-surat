<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-success text-dark">
                <h4 class="card-title">DATA SURAT</h4>
                <p class="card-description">
                </p>


<center>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tamabah Surat
  </button>
</center>
<?php  
if ($this->session->flashdata('Hapus')) {
    echo "<div class='alert alert-danger'>";
    echo $this->session->flashdata('Hapus');
    echo "</div>";
}
 elseif ($this->session->flashdata('Berhasil')) {
    echo "<div class='alert alert-info'>";
    echo $this->session->flashdata('Berhasil');
    echo "</div>";
}
?>
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Surat</th>
            <th>Jenis Surat</th>
            <th>Aksi Edit</th>
            <th>Aksi Hapus</th>
            <th>Lihat</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=1;
        foreach ($surat as $row)
        {
        echo " <tr>
                <td>$no</td>
               <td>$row->nama_Surat</td>
               <td>$row->nama_prihal</td>
               <td>".anchor('Admin/Surat/donwload/'.$row->id_surat,'Donwload',array('class'=>'btn btn-danger btn-sm'))."</td>
               <td>".anchor('Admin/Surat/hapus/'.$row->id_surat,'Hapus',array('class'=>'btn btn-dark btn-sm'))."</td>
               <td><button type='submit' class='btn btn-info btn-sm'>Lihat</button></td>
        </tr>";
        $no++;
        } 
        ?>
       
   
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <?php echo form_open_multipart('Admin/Surat/add');  ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Surat</label>
                       <?php echo cmb_dinamis('jenis_surat','tbl_jenis_surat','nama_prihal','id')  ?>
                </div>
                <div class="form-group">
                        <label for="exampleInputEmail1">Nama Surat</label>
                        <input type="text" name="nama_surat" class="form-control" required="">
                </div>
                <div class="form-group">
                        <label for="exampleInputEmail1">Upload Surat</label>
                        <input type="file" name="userfile" class="form-control" required="">
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
</div>
