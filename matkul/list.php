<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mata Kuliah</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mata Kuliah</h6>
        </div>

        <div class="card-body">
            <button class="btn btn-info btn-user" id="addMatkul" style="margin-bottom: 30px;">Tambah</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Sks</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Sks</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        include "../db.php";
                        $db = new db;
                        $mhs = $db->get_allMatkul();
                        $no = 1;

                        while ($result = $mhs->fetch_array()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $result['kd_matkul']; ?>
                                </td>
                                <td>
                                    <?php echo $result['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $result['sks']; ?>
                                </td>

                                <td>
                                    <button class="btn btn-success btn-user" id="editMatkul" value="<?php echo $result['kd_matkul']; ?>">Edit</button>
                                    <button class="btn btn-danger btn-user" id="deleteMatkul" value="<?php echo $result['kd_matkul']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>
<script>
    $(document).ready(function() {

        $("#addMatkul").click(function() {
            $.ajax({
                url: 'matkul/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });

        });

    });
</script>