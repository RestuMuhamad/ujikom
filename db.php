<?php

class db{
    private $koneksi;
    function __construct()
    {
        $this->koneksi= $koneksi=new mysqli("localhost","root","","db_pelatihan_bryandewawicaksana");
        
    }
    function get_user($username,$password){
        $data=$this->koneksi->query("select * from tbl_user where username='$username' and password='$password'");
        return $data;
    }
    // mahasiswa
    function get_allMhs(){
        $data=$this->koneksi->query("select * from tbl_mahasiswa");
        return $data;
    }

    function add_mhs($nim,$nama,$alamat,$jurusan){
        $this->koneksi->query("insert into tbl_mahasiswa(nim,nama,alamat,jurusan) values('$nim','$nama','$alamat','$jurusan')");
        return true;

    }

    function update_mhs($nim,$nama,$alamat,$jurusan){
            $this->koneksi->query("UPDATE tbl_mahasiswa SET nama = '$nama', alamat = '$alamat', jurusan = '$jurusan' WHERE nim='$nim'");
            return true;
    }

    function get_MhdByNim($nim){
        $data=$this->koneksi->query("select * from tbl_mahasiswa where nim='$nim'");
        return $data;
    }

    function del_mhs($nim){
        $this->koneksi->query("delete from tbl_mahasiswa where nim='$nim'");
        return true;
    }

    // dosen
    function get_alldosen(){
        $data=$this->koneksi->query("select * from tbl_dosen");
        return $data;
    }

    function add_dosen($kd_dosen,$nama,$alamat){
        $this->koneksi->query("insert into tbl_dosen(kd_dosen,nama,alamat) values('$kd_dosen','$nama','$alamat')");
        return true;

    }

    function update_dosen($kd_dosen,$nama,$alamat){
            $this->koneksi->query("UPDATE `tbl_dosen` SET nama = '$nama', `alamat` = '$alamat' WHERE `tbl_dosen`.`kd_dosen` = '$kd_dosen'");
            return true;
    }

    function get_dosenByKdDosen($kd_dosen){
        $data=$this->koneksi->query("select * from tbl_dosen where kd_dosen='$kd_dosen'");
        return $data;
    }

    function del_dosen($kd_dosen){
        $this->koneksi->query("DELETE FROM `tbl_dosen` WHERE `tbl_dosen`.`kd_dosen` = '$kd_dosen'");
        return true;
    }
    
    // semester
    function get_allSemester(){
        $data=$this->koneksi->query("select * from tbl_semester");
        return $data;
    }

    function add_semester($kd_semester,$semester){
        $this->koneksi->query("insert into tbl_semester(kd_semester,semester) values('$kd_semester','$semester')");
        return true;

    }

    function update_semester($kd_semester,$semester){
            $this->koneksi->query("UPDATE `tbl_semester` SET semester = '$semester' WHERE `tbl_semester`.`kd_semester` = '$kd_semester'");
            return true;
    }

    function get_semesterByKdSemester($kd_semester){
        $data=$this->koneksi->query("select * from tbl_semester where kd_semester='$kd_semester'");
        return $data;
    }

    function del_semester($kd_semester){
        $this->koneksi->query("delete from tbl_semester where kd_semester='$kd_semester'");
        return true;
    }
    
    // semester
    function get_allJadwal(){
        $data=$this->koneksi->query("select * from tbl_jadwal");
        return $data;
    }

    function add_jadwal($kd_dosen,$kd_matkul,$waktu,$ruang){
        $this->koneksi->query("insert into tbl_jadwal(kd_dosen,kd_matkul,waktu,ruang) values('$kd_dosen','$kd_matkul','$waktu','$ruang')");
        return true;

    }

    function update_jadwal($id,$kd_dosen,$kd_matkul,$waktu,$ruang){
      
        // var_dump($id, $kd_dosen, $kd_matkul, $waktu, $ruang);
        // die;
        $this->koneksi->query("UPDATE `tbl_jadwal` SET kd_dosen = '$kd_dosen', kd_matkul = '$kd_matkul', ruang = '$ruang', waktu = '$waktu' WHERE `tbl_jadwal`.`id` = '$id'");
        return true;
    }

    function get_jadwalById($id){
        $data=$this->koneksi->query("select * from tbl_jadwal where id='$id'");
        return $data;
    }

    function del_jadwal($id){
        $this->koneksi->query("delete from tbl_jadwal where id='$id'");
        return true;
    }




    //test
    function get_allMatkul(){
        $data=$this->koneksi->query("select * from tbl_matkul");
        return $data;
    }
    function get_laporan(){
        $data=$this->koneksi->query("SELECT
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
} 

?>


