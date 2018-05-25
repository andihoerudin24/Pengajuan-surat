<div class="col-md-12 grid-margin stretch-card">
    <div class="card bg-gradient-info text-white">
        <div class="card-body">
            <h4 class="card-title">FORM PENGAJUAN SURAT</h4>
            <p class="card-description">
               UPLOAD SURAT 
            </p>
            <?php echo form_open_multipart('Admin/Pengajuan/ajukan')  ?>
               <div class="form-group">
                    <label for="exampleInputName1">NAMA LENGKAP</label>
                    <input type="text" class="form-control" readonly="" value="<?php echo $this->session->userdata('nama_lengkap')?>" name="npm" placeholder="NPM">
                </div> 
               <div class="form-group">
                    <label for="exampleInputName1">NPM</label>
                    <input type="text" class="form-control" readonly="" value="<?php echo $this->session->userdata('npm')?>" name="npm" placeholder="NPM">
                </div>
               <div class="form-group">
                    <label for="exampleInputPassword4">NAMA SURAT</label>
                 <?php echo cmb_dinamis('surat','tbl_surat','nama_surat','id_surat')  ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">UPLOAD SURAT</label>
                    <input type="file" name="userfile"  class="form-control" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <button class="btn btn-danger">Cancel</button>
            <?php  echo form_close() ?>
        </div>
    </div>
</div>