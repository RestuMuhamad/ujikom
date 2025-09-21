<?php

class db
{
    private $koneksi;
    function __construct()
    {
        $this->koneksi = $koneksi = new mysqli("localhost", "root", "", "db_pelatihan_restu");
    }
    function get_user($username, $password)
    {
        $data = $this->koneksi->query("select * from tbl_user where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs()
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim, $nama, $alamat, $jurusan)
    {
        $this->koneksi->query("insert into tbl_mahasiswa(nim,nama,alamat,jurusan) values('$nim','$nama','$alamat','$jurusan')");
        return true;
    }

    function update_mhs($nim, $nama, $alamat, $jurusan)
    {
        $this->koneksi->query("UPDATE tbl_mahasiswa SET nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE nim='$nim'");
        return true;
    }

    function get_MhdByNim($nim)
    {
        $data = $this->koneksi->query("select * from tbl_mahasiswa where nim='$nim'");
        return $data;
    }

    function del_mhs($nim)
    {
        $this->koneksi->query("delete from tbl_mahasiswa where nim='$nim'");
        return true;
    }

    // dosen
    function get_alldosen()
    {
        $data = $this->koneksi->query("select * from tbl_dosen");
        return $data;
    }

    function add_dosen($kd_dosen, $nama, $alamat)
    {
        $this->koneksi->query("insert into tbl_dosen(kd_dosen,nama,alamat) values('$kd_dosen','$nama','$alamat')");
        return true;
    }

    function update_dosen($kd_dosen, $nama, $alamat)
    {
        $this->koneksi->query("UPDATE `tbl_dosen` SET nama = '$nama', `alamat` = '$alamat' WHERE `tbl_dosen`.`kd_dosen` = '$kd_dosen'");
        return true;
    }

    function get_dosenByKdDosen($kd_dosen)
    {
        $data = $this->koneksi->query("select * from tbl_dosen where kd_dosen='$kd_dosen'");
        return $data;
    }

    function del_dosen($kd_dosen)
    {
        $this->koneksi->query("DELETE FROM `tbl_dosen` WHERE `tbl_dosen`.`kd_dosen` = '$kd_dosen'");
        return true;
    }

    // semester
    function get_allSemester()
    {
        $data = $this->koneksi->query("select * from tbl_semester");
        return $data;
    }

    function add_semester($kd_semester, $semester)
    {
        $this->koneksi->query("insert into tbl_semester(kd_semester,semester) values('$kd_semester','$semester')");
        return true;
    }

    function update_semester($kd_semester, $semester)
    {
        $this->koneksi->query("UPDATE `tbl_semester` SET semester = '$semester' WHERE `tbl_semester`.`kd_semester` = '$kd_semester'");
        return true;
    }

    function get_semesterByKdSemester($kd_semester)
    {
        $data = $this->koneksi->query("select * from tbl_semester where kd_semester='$kd_semester'");
        return $data;
    }

    function del_semester($kd_semester)
    {
        $this->koneksi->query("delete from tbl_semester where kd_semester='$kd_semester'");
        return true;
    }

    // semester
    function get_allJadwal()
    {
        $data = $this->koneksi->query("select * from tbl_jadwal");
        return $data;
    }

    function get_allWaktuJadwal()
    {
        $data = $this->koneksi->query("select id, waktu from tbl_jadwal");
        return $data;
    }

    function add_jadwal($kd_dosen, $kd_matkul, $waktu, $ruang)
    {
        $this->koneksi->query("insert into tbl_jadwal(kd_dosen,kd_matkul,waktu,ruang) values('$kd_dosen','$kd_matkul','$waktu','$ruang')");
        return true;
    }

    function update_jadwal($id, $kd_dosen, $kd_matkul, $waktu, $ruang)
    {

        // var_dump($id, $kd_dosen, $kd_matkul, $waktu, $ruang);
        // die;
        $this->koneksi->query("UPDATE `tbl_jadwal` SET kd_dosen = '$kd_dosen', kd_matkul = '$kd_matkul', ruang = '$ruang', waktu = '$waktu' WHERE `tbl_jadwal`.`id` = '$id'");
        return true;
    }

    function get_jadwalById($id)
    {
        $data = $this->koneksi->query("select * from tbl_jadwal where id='$id'");
        return $data;
    }

    function del_jadwal($id)
    {
        $this->koneksi->query("delete from tbl_jadwal where id='$id'");
        return true;
    }

    //test
    function get_laporan()
    {
        $data = $this->koneksi->query("SELECT
    j.*,
    d.nama AS nama_dosen,
    m.nama AS nama_matkul
FROM
    tbl_jadwal AS j
INNER JOIN
    tbl_dosen AS d ON j.kd_dosen = d.kd_dosen
INNER JOIN
    tbl_matkul AS m ON j.kd_matkul = m.kd_matkul");
        return $data;
    }

    // matkul
    function get_allMatkul()
    {
        $data = $this->koneksi->query("select * from tbl_matkul");
        return $data;
    }

    function add_matkul($kode, $nama, $sks)
    {
        $this->koneksi->query("insert into tbl_matkul(kd_matkul, nama, sks) values('$kode','$nama','$sks')");
        return true;
    }

    function update_matkul($kode, $nama, $sks)
    {
        $this->koneksi->query("UPDATE tbl_matkul SET nama = '$nama', sks = '$sks' WHERE kd_matkul='$kode'");
        return true;
    }

    function get_MatkulByKode($kode)
    {
        $data = $this->koneksi->query("select * from tbl_matkul where kd_matkul='$kode'");
        return $data;
    }

    function del_matkul($kode)
    {
        $this->koneksi->query("delete from tbl_matkul where kd_matkul='$kode'");
        return true;
    }
    // user
    function get_allUser()
    {
        $data = $this->koneksi->query("select * from tbl_user");
        return $data;
    }

    function add_user($username, $password)
    {
        $this->koneksi->query("insert into tbl_user(username, password) values('$username','$password')");
        return true;
    }

    function update_user($id, $username, $password)
    {
        $this->koneksi->query("UPDATE tbl_user SET username = '$username', password = '$password' WHERE id='$id'");
        return true;
    }

    function get_UserById($id)
    {
        $data = $this->koneksi->query("select * from tbl_user where id='$id'");
        return $data;
    }

    function del_user($id)
    {
        $this->koneksi->query("delete from tbl_user where id='$id'");
        return true;
    }
    // krs
    function get_allKrs()
    {
        $data = $this->koneksi->query("SELECT tbl_krs.*, tbl_mahasiswa.nama, tbl_semester.semester, tbl_dosen.nama as nama_dosen, tbl_jadwal.waktu FROM `tbl_krs` JOIN tbl_mahasiswa ON tbl_krs.nim = tbl_mahasiswa.nim JOIN tbl_semester ON tbl_krs.kd_semester = tbl_semester.kd_semester JOIN tbl_jadwal ON tbl_krs.id_jadwal = tbl_jadwal.id JOIN tbl_dosen ON tbl_jadwal.kd_dosen = tbl_dosen.kd_dosen");
        return $data;
    }

    function add_krs($nim, $id_jadwal, $kd_semester)
    {
        $this->koneksi->query("insert into tbl_krs(nim, id_jadwal, kd_semester) values('$nim','$id_jadwal', '$kd_semester')");
        return true;
    }

    function update_krs($id, $nim, $id_jadwal, $kd_semester)
    {
        $this->koneksi->query("UPDATE tbl_krs SET nim = '$nim', id_jadwal = '$id_jadwal', kd_semester = '$kd_semester' WHERE id='$id'");
        return true;
    }

    function get_KrsById($id)
    {
        $data = $this->koneksi->query("select * from tbl_krs where id='$id'");
        return $data;
    }

    function del_krs($id)
    {
        $this->koneksi->query("delete from tbl_krs where id='$id'");
        return true;
    }
}
