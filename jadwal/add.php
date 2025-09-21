<?php
    include "../db.php";
    $db = new db;
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Jadwal</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Jadwal</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <form method="POST" id="formJadwal">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Dosen</label>
                        <select id="kd_dosen_dropdown" class="form-control" name="kd_dosen">
                          <?php
                          $dosen = $db->get_alldosen();

                          while ($result = $dosen->fetch_array()) {
                          ?>
                            <option value="<?php echo $result['kd_dosen']; ?>">
                              <?php echo $result['kd_dosen']; ?> - <?php echo $result['nama']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                        <select id="kd_matkul_dropdown" class="form-control" name="kd_matkul">
                          <?php
                          $matkul = $db->get_allMatkul();

                          while ($result = $matkul->fetch_array()) {
                          ?>
                            <option value="<?php echo $result['kd_matkul']; ?>">
                              <?php echo $result['kd_matkul']; ?> - <?php echo $result['nama']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu</label>
                        <input type="text" class="form-control" name="waktu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruang</label>
                        <input type="text" class="form-control" name="ruang">
                    </div>

                    <button type="submit" class="btn btn-primary" id="simpanJadwal">Simpan</button>
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