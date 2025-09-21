<!DOCTYPE html>
<html lang="id">
<head>
    <title>Cetak Jadwal Kuliah</title>
    <style>
        /* ... CSS yang sudah ada ... */
        .btn-print { background-color: #28a745; margin-left:10px; } /* Warna beda untuk tombol print */
        .btn-print:hover { background-color: #218838; }

        /* CSS KHUSUS UNTUK PRINT */
        @media print {
            body { margin: 0; font-size: 12pt; }
            /* Sembunyikan tombol saat mau di-print */
            .no-print {
                display: none;
            }
            table { width: 100%; }
        }
    </style>
</head>
<?php
  include "../db.php";
  $db = new db;
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Jadwal</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jadwal</h6>
        </div>

        <div class="card-body">
          <button onclick="printArea('area-cetak')" type="submit" name="cetak" class="btn btn-info btn-user" style="margin-bottom: 30px;">Cetak</button>
            <div class="table-responsive" id="area-cetak">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Waktu</th>
                            <th>Ruang</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Waktu</th>
                            <th>Ruang</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        $laporan = $db->get_laporan();
                        $no = 1;

                        while ($result = $laporan->fetch_array()) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $result['id']; ?>
                                </td>
                                <td>
                                    <?php echo $result['kd_dosen']; ?>
                                </td>
                                <td>
                                    <?php echo $result['nama_dosen']; ?>
                                </td>
                                <td>
                                  <?php echo $result['kd_matkul']; ?>
                                </td>
                                <td>
                                    <?php echo $result['nama_matkul']; ?>
                                </td>
                                <td>
                                    <?php echo $result['waktu']; ?>
                                </td>
                                <td>
                                    <?php echo $result['ruang']; ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/datatables-demo.js"></script>
<script>
function printArea(divId) {
    // 1. Ambil konten dari div yang diinginkan
    var content = document.getElementById(divId).innerHTML;
    
    // 2. Buka jendela baru
    var printWindow = window.open('', '', 'height=600,width=800');

    // 3. Tulis konten ke jendela baru tersebut
    // Sertakan juga CSS yang diperlukan agar tampilan tabel tetap rapi
    printWindow.document.write('<html><head><title>Cetak Laporan</title>');
    // (PENTING) Jika Anda menggunakan Bootstrap, sertakan link CSS-nya
    printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">');
    printWindow.document.write('</head><body>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');

    // 4. Tutup dokumen agar proses render selesai
    printWindow.document.close();

    // Tunggu sebentar agar semua elemen (terutama CSS) termuat sempurna
    printWindow.onload = function() {
        // 5. Panggil fungsi print
        printWindow.print();
        // 6. Tutup jendela setelah print selesai atau dibatalkan
        printWindow.close();
    };
}
</script>