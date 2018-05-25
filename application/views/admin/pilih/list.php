<div class="col-md-8">
    <div class="card bg-gradient-warning text-white">
        <div class="card-block">
            <h4 class="card-title bg-gradient-warning text-white">JENIS SURAT</h4>
            <p><code></code></p>
            <div style="clear: both"></div>
            <div class="table-overflow">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>PILIH JENIS SURAT</td>
                            <td><?php echo cmb_dinamis('prihal', 'tbl_jenis_surat', 'nama_prihal', 'id', null, "id='prihal' onchange='loadData()' ") ?></td>
                        </tr>
                    </thead>
                 </table>
            </div>
        </div>
    </div>
</div>
<br>
<div id="load" class="bg-gradient-info text-white">
    
</div>
<script src="<?php echo base_url()?>assets/jquery.min.js"></script>
<script type="text/javascript">
function loadData(){
    var prihal=$("#prihal").val();
    $.ajax({
        type:"GET",
        url :"<?php echo base_url()?>Admin/Pilih_surat/loaddata",
        data:"prihal="+prihal,
        success:function(html){
            $("#load").html(html);
            swal('INFORMASI','Silahkan donwload surat','info');
        }
        
    })
    
}
</script>



