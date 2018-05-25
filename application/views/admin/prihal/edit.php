<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-success text-white">
                <h4 class="card-title">KONFRIMASI SURAT</h4>
                <p class="card-description">
                </p>


<center><div class="card col-sm-8 ">
    <div class="card-body">
        <h4 class="card-title">Form Edit Jenis Prihal</h4>
        <p class="card-description">
            
        </p>
        <?php
        echo form_open('Admin/Prihal/edit');  
        echo form_hidden('id',$prihal['id']);
        
        ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Prihal</label>
                <input type="text" name="nama_prihal" class="form-control" required="" value="<?php echo $prihal['nama_prihal'] ?>">
            </div>
        <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
            <?php echo anchor('Admin/Prihal','Kembali',array('class'=>'btn btn-danger')) ?>
           
    </div>
</div>
</center>
</div>

        </div>
    </div>
</div>


