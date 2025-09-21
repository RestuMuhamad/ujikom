<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':
        $kd_semester = $_POST['kd_semester'];
        $semester = $_POST['semester'];

        $query = $db->add_semester($kd_semester, $semester);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal :";
        }
        break;

    case 'edit':

        $kd_semester = $_POST['kd_semester'];
        $semester = $_POST['semester'];

        $query = $db->update_semester($kd_semester, $semester,);

        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal :";
        }
        break;

    case 'delete':

        $kd_semester = $_POST['kd_semester'];
        $query = $db->del_semester($kd_semester);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal :";
        }
        break;
}
