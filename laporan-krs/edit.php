<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit KRS</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit KRS</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <?php
                include "../db.php";
                $id = $_GET['id'];
                $db = new db;

                $krs = $db->get_KrsById($id);
                $resultData = $krs->fetch_array();

                $dataNim = [];
                $rawData = $db->get_allMhs();
                while ($row = $rawData->fetch_assoc()) {
                    $dataNim[] = [
                        'nim' => $row['nim'],
                    ];
                }
                $dataJadwal = [];
                $rawJadwal = $db->get_allWaktuJadwal();
                while ($row = $rawJadwal->fetch_assoc()) {
                    $dataJadwal[] = [
                        'id' => $row['id'],
                        'waktu' => $row['waktu']
                    ];
                }
                $dataSemester = [];
                $rawSemester = $db->get_allSemester();
                while ($row = $rawSemester->fetch_assoc()) {
                    $dataSemester[] = [
                        'kd_semester' => $row['kd_semester'],
                        'semester' => $row['semester']
                    ];
                }
                ?>
                <form method="POST" id="formEditKrs">
                    <input type="hidden" name="id" value="<?= $resultData['id'] ?>">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <select class="form-control" id="nim" name="nim">
                            <?php foreach ($dataNim as $key => $value) : ?>
                                <option value="<?= $value['nim'] ?>" <?= ($resultData['nim'] == $value['nim']) ? 'selected' : '' ?>><?= $value['nim'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jadwal">Jadwal</label>
                        <select class="form-control" id="jadwal" name="jadwal">
                            <?php foreach ($dataJadwal as $key => $value) : ?>
                                <option value="<?= $value['id'] ?>" <?= ($resultData['id_jadwal'] == $value['id']) ? 'selected' : '' ?>><?= $value['waktu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select class="form-control" id="semester" name="semester">
                            <?php foreach ($dataSemester as $key => $value) : ?>
                                <option value="<?= $value['kd_semester'] ?>" <?= ($resultData['kd_semester'] == $value['kd_semester']) ? 'selected' : '' ?>><?= $value['semester'] ?></option>
                            <?php endforeach; ?>
                        </select>
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