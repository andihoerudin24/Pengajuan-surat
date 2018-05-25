<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-info text-white">
                <h4 class="card-title">KONFRIMASI SURAT</h4>
                <p class="card-description">
                </p>
                <div id="day"></div>

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
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Konfrimasi/data',
            data: '',
            success: function (html) {
                $("#day").html(html);
            }
        });
    }
    
    function status(id){
    var sudah=$("#sudah").val();
     $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>Admin/Konfrimasi/ubah_status',
            data: 'id='+id+'&sudah='+sudah,
            success: function (html) {
             loadData()
             swal("ok","status berhasil","success");
            }
        });
    }
</script>