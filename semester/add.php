<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Semester</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Semester</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <form method="POST" id="formSemester">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Semester</label>
                        <input type="number" class="form-control" name="kd_semester">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Semester</label>
                        <input type="text" class="form-control" name="semester">

                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="simpanSemester">Simpan</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>