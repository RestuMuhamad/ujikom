<?php
include "../db.php";
$db = new db;

switch ($_GET['action']) {

    case 'save':

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $db->add_user($username, $password);
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal :";
        }
        break;

    case 'edit':
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $db->update_user($id, $username, $password);

        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal :";
        }
        break;

    case 'delete':
        $kode = $_POST['id'];
        $query = $db->del_user($kode);
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal :";
        }
        break;
}
