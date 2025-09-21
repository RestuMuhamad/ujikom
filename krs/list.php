<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">KRS</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Krs</h6>
        </div>

        <div class="card-body">
            <button class="btn btn-info btn-user" id="addUser" style="margin-bottom: 30px;">Tambah</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Jadwal</th>
                            <th>Kode Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nim</th>
                            <th>Jadwal</th>
                            <th>Kode Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        include "../db.php";
                        $db = new db;
                        $mhs = $db->get_allKrs();
                        $no = 1;

                        while ($result = $mhs->fetch_array()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $result['nim']; ?>
                                </td>
                                <td>
                                    <?php echo $result['id_jadwal']; ?>
                                </td>
                                <td>
                                    <?php echo $result['kd_semester']; ?>
                                </td>

                                <td>
                                    <button class="btn btn-success btn-user" id="editKrs" value="<?php echo $result['id']; ?>">Edit</button>
                                    <button class="btn btn-danger btn-user" id="deleteKrs" value="<?php echo $result['id']; ?>">Delete</button>
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

        $("#addUser").click(function() {
            $.ajax({
                url: 'krs/add.php',
                type: 'get',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });

        });

    });
</script>