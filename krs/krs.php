<?php
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
}
