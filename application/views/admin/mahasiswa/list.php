<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body bg-gradient-info text-dark">
                <h4 class="card-title">DATA MAHASISWA</h4>
                <p class="card-description">
                </p>

<div id="card bg-gradient-warning">
<table id="example" class="table table-striped table-bordered bg-white" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>SEMESTER</th>
            <th>JURUSAN</th>
            <th>KELAS</th>
            <th>AKSI EDIT</th>
            <th>AKSI DELETE</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($mahasiswa as $row) {
            echo "<tr>
                <td>$no</td>
                <td>$row->nama_lengkap</td>
                <td>$row->npm</td>
                <td>$row->semester</td>
                <td>$row->jurusan</td>
                <td>$row->kelas</td>    
                <td>".anchor('Admin/Mahasiswa/edit/' . $row->npm, 'Edit', array('class' => 'btn btn-info'))."</td>
                <td>".anchor('Admin/Mahasiswa/Hapus/' . $row->npm, 'Hapus', array('class' => 'btn btn-danger'))."</td>
            </tr>";
            
        $no++;
        }
        ?>

    </tbody>
</table>    
</div>

</div>

        </div>
    </div>
</div>

 

