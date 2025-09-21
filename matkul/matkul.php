<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':

        $kode = $_POST['kd_matkul'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];

        $query = $db->add_matkul($kode, $nama, $sks);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal :";
        }
        break;

    case 'edit':
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $sks = $_POST['sks'];

        $query = $db->update_matkul($kode, $nama, $sks);

        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal :";
        }
        break;

    case 'delete':
        $kode = $_POST['kd_matkul'];
        $query = $db->del_matkul($kode);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal :";
        }
        break;
}
