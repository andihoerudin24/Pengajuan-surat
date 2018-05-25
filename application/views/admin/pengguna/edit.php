           
<div class="row flex-grow">
    <div class="col-10 grid-margin">
        <div class="card bg-gradient-info text-white">
            <div class="card-body">
                <h4 class="card-title">Form Edit Pengguna</h4>
                <p class="card-description">
                    Basic form layout
                </p>
                <?php
                echo form_open('Admin/Pengguna/edit');
                echo form_hidden('id_user', $user['id_user']);
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" value="<?php echo $user['nama_lengkap'] ?>"  class="form-control" name="nama" placeholder="nama lengkap" required="" maxlength="15" aria-required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" value="<?php echo $user['username'] ?>" class="form-control" name="username" placeholder="username" maxlength="15" required="" aria-required="true">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" value="<?php echo $user['password'] ?>" maxlength="15" class="form-control" name="password" required="" aria-required="true">
                </div>
                <div class="form-group">
                    <label>Level User</label>
                    <?php echo cmb_dinamis('level_user', 'tbl_level_user', 'nama_level', 'id_level_user', $user['id_level_user']) ?> 
                </div>
                <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
                <?php echo anchor('Admin/Pengguna', 'KEMBALI', array('class' => "btn btn-danger btn-sm")) ?>
                <?php echo form_close(); ?> 
            </div>
        </div>
    </div>
</div>

