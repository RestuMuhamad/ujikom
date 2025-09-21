<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['jadwal'];
        $kd_semester = $_POST['semester'];

        $query = $db->add_krs($nim, $id_jadwal, $kd_semester);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal :";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $nim = $_POST['nim'];
        $id_jadwal = $_POST['jadwal'];
        $kd_semester = $_POST['semester'];

        $query = $db->update_krs($id, $nim, $id_jadwal, $kd_semester);

        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal :";
        }
        break;

    case 'delete':
        $kode = $_POST['id'];
        $query = $db->del_krs($kode);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal :";
        }
        break;

    case 'export':
        $dataKrs = $db->get_allKrs();
        // --- Buat HTML untuk dimasukkan ke PDF ---
        $html = '
        <h2>Laporan KRS</h2>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Mahasiswa</th>
                    <th>Dosen pengampu</th>
                    <th>Waktu kuliah</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Mahasiswa</th>
                    <th>Dosen pengampu</th>
                    <th>Waktu kuliah</th>
                    <th>Semester</th>
                </tr>
            </tfoot>
            <tbody>';
        $no = 1;
        while ($result = $dataKrs->fetch_array()) {
            $html .=
                '<tr>
                <td>
                    ' . $no++ . '
                </td>
                <td>
                    ' . $result['nim'] . '
                </td>
                <td>
                    ' . $result['nama'] . '
                </td>
                <td>
                    ' . $result['nama_dosen'] . '
                </td>
                <td>
                    ' . $result['waktu'] . '
                </td>
                <td>
                    ' . $result['semester'] . '
                </td>
            </tr>';
        }
        $html .= '</tbody></table>';

        // --- Generate PDF ---
        $options = new Options();
        $options->set('isRemoteEnabled', true); // jika butuh load CSS/IMG dari luar
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output ke browser
        $dompdf->stream('laporan-krs.pdf', ['Attachment' => true]);
        exit;
        break;
}
