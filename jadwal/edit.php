<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Jadwal</h1>
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

                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;

                $jadwal = $db->get_jadwalById($id);
                $result = $jadwal->fetch_array();
                ?>
                <form method="POST" id="formEditJadwal">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Dosen</label>
                      <input type="hidden" class="form-control" name="id" value="<?php echo $result['id']; ?>">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kode Dosen</label>
                        <select id="kd_dosen_dropdown" class="form-control" name="kd_dosen" value="<?php echo $result['kd_dosen']; ?>">
                          <?php
                          $dosen = $db->get_alldosen();

                          while ($resultDosen = $dosen->fetch_array()) {
                          ?>
                            <option
                              value="<?php echo $resultDosen['kd_dosen']; ?>"
                              <?php if ($resultDosen['kd_dosen'] == $result['kd_dosen']) {
                                echo 'selected';
                              } ?>
                            >
                              <?php echo $resultDosen['kd_dosen']; ?> - <?php echo $resultDosen['nama']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                        <select id="kd_matkul_dropdown" class="form-control" name="kd_matkul">
                          <?php
                          $matkul = $db->get_allMatkul();

                          while ($resultMatkul = $matkul->fetch_array()) {
                          ?>
                            <option
                              value="<?php echo $resultMatkul['kd_matkul']; ?>"
                              <?php if ($resultMatkul['kd_matkul'] == $result['kd_matkul']) {
                                echo 'selected';
                              } ?>
                            >
                              <?php echo $resultMatkul['kd_matkul']; ?> - <?php echo $resultMatkul['nama']; ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu</label>
                        <input type="text" class="form-control" name="waktu" value="<?php echo $result['waktu']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruang</label>
                        <input type="text" class="form-control" name="ruang" value="<?php echo $result['ruang']; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
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