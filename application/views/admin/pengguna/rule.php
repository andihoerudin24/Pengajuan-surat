<div class="col-md-8">
    <div class="card bg-gradient-warning text-white">
        <div class="card-block">
            <h4 class="card-title bg-gradient-warning text-white">LEVEL USER</h4>
            <p><code></code></p>
            <div style="clear: both"></div>
            <div class="table-overflow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Pilih level</td>
                            <td><?php echo cmb_dinamis('level_user', 'tbl_level_user', 'nama_level', 'id_level_user', null, "id='level_user' onchange='loadData()' ") ?></td>
                        </tr>
                    </thead>
                    <thead>
                    <tr>
                        <td>KLIK KEMBALI UNUTK KE MENU UTAMA</td>
                        <td><?php echo anchor('Admin/Pengguna', 'KEMBALI', array('class' => "btn btn-danger btn-sm"))?></td>
                    </tr>
                   </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<br>
<div class="col-md-12">
    <div class="card bg-gradient-info text-white">
        <div class="card-block">
            <h4 class="card-title">HAK AKSES MODUL</h4>
            <p><code></code>HAK AKSES MODULE:</p>
            <div style="clear: both"></div>
            <div class="table-overflow">


                <div id="tabel">


                </div>


            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        loadData();
    });

</script>
<script type="text/javascript">
    function loadData() {
        var level_user = $("#level_user").val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Pengguna/modul',
            data: 'level_user=' + level_user,
            success: function (html) {
                $("#tabel").html(html);
            }
        })
    }


    function addrule(id_menu) {
        var level_user = $("#level_user").val();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Pengguna/add_rule',
            data: 'level_user=' + level_user + '&id_menu=' + id_menu,
            success: function (html) {
                //("#tabel").html(html);
              swal("good job", "SUKSES MEMBERIKAN AKSES", "success");

            }
        })
    }
</script>
