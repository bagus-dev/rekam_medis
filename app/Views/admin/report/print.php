<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Klinik PMB Bidan Hj. Ade F. Isma</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/ibi.png" type="image/x-icon">
    <style>
        .table-list {
            border-bottom: 1px dashed orange;
        }
        @media print {
            body {
                width: 21cm;
                height: 29.7cm;
            }
            table.table-list2 { page-break-after:auto }
            tr.tr-list    { page-break-inside:avoid; page-break-after:auto }
            td.table-list    { page-break-inside:avoid; page-break-after:auto }
            thead.thead-list { display:table-header-group }
        }
        .logo {
            position: relative;
            width: 31%;
            margin-top: 20px;
            margin-right: 2%;
            float: left;
        }
        .logo img {
            position: absolute;
            right: 0px;
        }
        .address {
            width:66%;
            float: left;
        }
        .clearfix {
            clear: both;
        }
        .table-list2 {
            border-collapse: collapse;
        }
        .table-list2 td, .table-list2 th {
            border: 1px solid #ddd;
        }
        .table-list2 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.close()
            }, 1);
        }
    </script>
</head>
<body>
    <table style="width:100%">
        <thead>
            <tr>
                <td>
                    <div style="border:1px solid grey;padding-top:10px;padding-bottom:10px;">
                        <div class="logo">
                            <img src="/assets/img/ibi.png" alt="LOGO" width="110" style="height:auto">
                        </div>
                        <div class="address">
                            <h2>
                                KLINIK PMB BIDAN HJ. ADE F. ISMA
                            </h2>
                            <p>
                                Lingkungan Mushola As-Salam RT 01/04, Kramatwatu,
                                <br>
                                Kec. Kramatwatu, Serang, Banten 42151, Indonesia
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div style="text-align:center;background-color:grey;color:white;margin-top:-10px;font-family:arial;">
                        <h1><b>LAPORAN</b></h1>
                    </div>

                    <table style="width:100%;">
                        <tbody>
                            <tr>
                                <td style="border:1px solid black;padding-left:20px;" width="25%" height="80px">
                                    <span style="margin-top:-50px">
                                        <b>Tanggal Mulai :</b>
                                        <br><br>
                                        <?= $_GET['start'] ?>
                                    </span>
                                </td>
                                <td style="border:1px solid black;padding-left:20px;" width="25%">
                                    <span style="margin-top:-50px">
                                        <b>Tanggal Akhir :</b>
                                        <br><br>
                                        <?= $_GET['end'] ?>
                                    </span>
                                </td>
                                <td style="border:1px solid black;padding-left:20px;" width="25%">
                                    <span style="margin-top:-50px">
                                        <b>Data :</b>
                                        <br><br>
                                        <?php
                                            if($_GET['menu'] == '1') {
                                                echo 'Pengobatan';
                                            } elseif($_GET['menu'] == '2') {
                                                echo 'Keluarga Berencana';
                                            } elseif($_GET['menu'] == '3') {
                                                echo 'ANC & USG';
                                            } elseif($_GET['menu'] == '4') {
                                                echo 'Partus';
                                            } elseif($_GET['menu'] == '5') {
                                                echo 'Imunisasi';
                                            } elseif($_GET['menu'] == '6') {
                                                echo 'Ibu Nifas';
                                            } elseif($_GET['menu'] == '7') {
                                                echo 'Bayi Saat Lahir';
                                            } elseif($_GET['menu'] == '8') {
                                                echo 'Rujukan';
                                            } elseif($_GET['menu'] == '9') {
                                                echo 'Rapid';
                                            }
                                        ?>
                                    </span>
                                </td>
                                <td style="border:1px solid black;padding-left:20px;" width="25%">
                                    <span style="margin-top:-50px">
                                        <b>Banyak Data :</b>
                                        <br><br>
                                        <?= count($data) ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table-list2" style="margin-top:30px">
                        <thead class="thead-list" style="background-color:#fc544b;color:white;">
                            <tr class="tr-list">
                                <th class="table-list" style="padding:5px">No.</th>
                                <?php
                                    if($menu == '1') {
                                ?>
                                <th class="table-list" style="padding:5px">No. Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Pasien</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Penunjang</th>
                                <th class="table-list" style="padding:5px">Berat Badan</th>
                                <th class="table-list" style="padding:5px">Suhu Tubuh</th>
                                <th class="table-list" style="padding:5px">Tensi</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Kode</th>
                                <th class="table-list" style="padding:5px">Diagnosa</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '2') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Pasien</th>
                                <th class="table-list" style="padding:5px">Umur</th>
                                <th class="table-list" style="padding:5px">Suami</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Jumlah Anak</th>
                                <th class="table-list" style="padding:5px">Jenis KB</th>
                                <th class="table-list" style="padding:5px">Umur Anak Terakhir</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Penunjang Ulang</th>
                                <th class="table-list" style="padding:5px">Tanggal Kembali</th>
                                <th class="table-list" style="padding:5px">BB</th>
                                <th class="table-list" style="padding:5px">TD</th>
                                <th class="table-list" style="padding:5px">Keterangan</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '3') { ?>
                                <th class="table-list" style="padding:5px">NOMOR REGISTRASI</th>
                                <th class="table-list" style="padding:5px">NAMA PASIEN</th>
                                <th class="table-list" style="padding:5px">NAMA SUAMI</th>
                                <th class="table-list" style="padding:5px">NAMA IBU KANDUNG</th>
                                <th class="table-list" style="padding:5px">TGL LAHIR / UMUR</th>
                                <th class="table-list" style="padding:5px">ALAMAT</th>
                                <th class="table-list" style="padding:5px">PENDIDIKAN</th>
                                <th class="table-list" style="padding:5px">PEKERJAAN</th>
                                <th class="table-list" style="padding:5px">NOMOR NIK</th>
                                <th class="table-list" style="padding:5px">KUNJUNGAN</th>
                                <th class="table-list" style="padding:5px">KUNJUNGAN ULANG</th>
                                <th class="table-list" style="padding:5px">GPA</th>
                                <th class="table-list" style="padding:5px">HPHT</th>
                                <th class="table-list" style="padding:5px">TP</th>
                                <th class="table-list" style="padding:5px">USIA KEHAMILAN</th>
                                <th class="table-list" style="padding:5px">TD</th>
                                <th class="table-list" style="padding:5px">BB</th>
                                <th class="table-list" style="padding:5px">TB</th>
                                <th class="table-list" style="padding:5px">LILA</th>
                                <th class="table-list" style="padding:5px">TFU</th>
                                <th class="table-list" style="padding:5px">DII</th>
                                <th class="table-list" style="padding:5px">PRES</th>
                                <th class="table-list" style="padding:5px">TT</th>
                                <th class="table-list" style="padding:5px">FE</th>
                                <th class="table-list" style="padding:5px">LETAK JANIN</th>
                                <th class="table-list" style="padding:5px">DETAK JANTUNG JANIN</th>
                                <th class="table-list" style="padding:5px">IMUNISASI</th>
                                <th class="table-list" style="padding:5px">TABLET TAMBAH DARAH</th>
                                <th class="table-list" style="padding:5px">LAB</th>
                                <th class="table-list" style="padding:5px">GOLDAR</th>
                                <th class="table-list" style="padding:5px">HB</th>
                                <th class="table-list" style="padding:5px">HIV</th>
                                <th class="table-list" style="padding:5px">HBSAG</th>
                                <th class="table-list" style="padding:5px">SIFILIS</th>
                                <th class="table-list" style="padding:5px">URINE PROTEIN</th>
                                <th class="table-list" style="padding:5px">GLUKOSA</th>
                                <th class="table-list" style="padding:5px">RUJUKAN</th>
                                <th class="table-list" style="padding:5px">DIAGNOSA</th>
                                <th class="table-list" style="padding:5px">KELUHAN</th>
                                <th class="table-list" style="padding:5px">THERAPY</th>
                                <th class="table-list" style="padding:5px">STATUS</th>
                                <th class="table-list" style="padding:5px">TATA LAKSANA</th>
                                <th class="table-list" style="padding:5px">KONSELING</th>
                                <th class="table-list" style="padding:5px">TEMPAT PELAYANAN</th>
                                <th class="table-list" style="padding:5px">HARGA</th>
                                <th class="table-list" style="padding:5px">PETUGAS</th>
                                <th class="table-list" style="padding:5px">DATA DIMASUKKAN PADA</th>
                                <?php } elseif($menu == '4') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Ibu</th>
                                <th class="table-list" style="padding:5px">Umur</th>
                                <th class="table-list" style="padding:5px">Suami</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Berat Badan</th>
                                <th class="table-list" style="padding:5px">Tinggi Badan</th>
                                <th class="table-list" style="padding:5px">Hari Pertama Haid Terakhir</th>
                                <th class="table-list" style="padding:5px">Hari Taksiran Persalinan</th>
                                <th class="table-list" style="padding:5px">Tanggal dan Jam</th>
                                <th class="table-list" style="padding:5px">Golongan Darah</th>
                                <th class="table-list" style="padding:5px">Penggunaan Kontrasepsi Sebelum Hamil</th>
                                <th class="table-list" style="padding:5px">Riwayat Penyakit yang Diderita Ibu</th>
                                <th class="table-list" style="padding:5px">Riwayat Alergi</th>
                                <th class="table-list" style="padding:5px">Status Imunisasi Tetanus Terakhir</th>
                                <th class="table-list" style="padding:5px">GPA</th>
                                <th class="table-list" style="padding:5px">Riwayat Obstetri</th>
                                <th class="table-list" style="padding:5px">Kehamilan Ke-</th>
                                <th class="table-list" style="padding:5px">Tahun</th>
                                <th class="table-list" style="padding:5px">Lahir Hidup/Mati/Abortus</th>
                                <th class="table-list" style="padding:5px">Lahir Aterm/Pre Term/Post Term</th>
                                <th class="table-list" style="padding:5px">Lahir Spontan/SC/Lainnya</th>
                                <th class="table-list" style="padding:5px">Berat Lahir</th>
                                <th class="table-list" style="padding:5px">Panjang Lahir</th>
                                <th class="table-list" style="padding:5px">Tempat Bersalin, Nakes</th>
                                <th class="table-list" style="padding:5px">Kondisi Anak Saat Ini</th>
                                <th class="table-list" style="padding:5px">Komplikasi Kehamilan/Persalinan</th>
                                <th class="table-list" style="padding:5px">Anak</th>
                                <th class="table-list" style="padding:5px">Berat Lahir</th>
                                <th class="table-list" style="padding:5px">Tinggi Lahir</th>
                                <th class="table-list" style="padding:5px">Jenis Kelamin</th>
                                <th class="table-list" style="padding:5px">Nomor HP</th>
                                <th class="table-list" style="padding:5px">Keterangan Komplikasi</th>
                                <th class="table-list" style="padding:5px">Rujuk</th>
                                <th class="table-list" style="padding:5px">Keterangan Rujuk</th>
                                <th class="table-list" style="padding:5px">Hecting</th>
                                <th class="table-list" style="padding:5px">Hari</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '5') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Pasien</th>
                                <th class="table-list" style="padding:5px">Tanggal Lahir</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Berat Badan</th>
                                <th class="table-list" style="padding:5px">Suhu Badan</th>
                                <th class="table-list" style="padding:5px">Tinggi Badan</th>
                                <th class="table-list" style="padding:5px">Nama Orang Tua</th>
                                <th class="table-list" style="padding:5px">BCG</th>
                                <th class="table-list" style="padding:5px">HB NEO</th>
                                <th class="table-list" style="padding:5px">DPT PENTABIO (HIB) 1</th>
                                <th class="table-list" style="padding:5px">DPT PENTABIO (HIB) 2</th>
                                <th class="table-list" style="padding:5px">DPT PENTABIO (HIB) 3</th>
                                <th class="table-list" style="padding:5px">Polio Tetes 1</th>
                                <th class="table-list" style="padding:5px">Polio Tetes 2</th>
                                <th class="table-list" style="padding:5px">Polio Tetes 3</th>
                                <th class="table-list" style="padding:5px">Polio Tetes 4</th>
                                <th class="table-list" style="padding:5px">Campak</th>
                                <th class="table-list" style="padding:5px">IM BOOSTER</th>
                                <th class="table-list" style="padding:5px">POLIO IPV</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Penunjang</th>
                                <th class="table-list" style="padding:5px">Jenis Imunisasi</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '6') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Ibu</th>
                                <th class="table-list" style="padding:5px">Umur</th>
                                <th class="table-list" style="padding:5px">Nama Suami</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Kunjungan</th>
                                <th class="table-list" style="padding:5px">Kondisi Ibu Secara Umum</th>
                                <th class="table-list" style="padding:5px">TD</th>
                                <th class="table-list" style="padding:5px">Suhu Tubuh</th>
                                <th class="table-list" style="padding:5px">Respirasi</th>
                                <th class="table-list" style="padding:5px">Nadi</th>
                                <th class="table-list" style="padding:5px">Pendarahan Pervagina</th>
                                <th class="table-list" style="padding:5px">Kondisi Perineum</th>
                                <th class="table-list" style="padding:5px">Tanda Infeksi</th>
                                <th class="table-list" style="padding:5px">Kontraksi Uteri</th>
                                <th class="table-list" style="padding:5px">TFU</th>
                                <th class="table-list" style="padding:5px">Lokhia</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Jalan Lahir</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Payudara</th>
                                <th class="table-list" style="padding:5px">Produksi ASI</th>
                                <th class="table-list" style="padding:5px">Pemberian Kapsul Vit. A</th>
                                <th class="table-list" style="padding:5px">Pelayanan Kontrasepsi Pascapersalinan</th>
                                <th class="table-list" style="padding:5px">Penanganan Resiko Tinggi dan Komplikasi Pada Nifas</th>
                                <th class="table-list" style="padding:5px">BAB</th>
                                <th class="table-list" style="padding:5px">BAK</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '7') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Ibu</th>
                                <th class="table-list" style="padding:5px">Umur</th>
                                <th class="table-list" style="padding:5px">Nama Suami</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Tanggal dan Jam Persalinan</th>
                                <th class="table-list" style="padding:5px">Umur Kehamilan</th>
                                <th class="table-list" style="padding:5px">Penolong Persalinan</th>
                                <th class="table-list" style="padding:5px">Cara Persalinan</th>
                                <th class="table-list" style="padding:5px">Keadaan Ibu</th>
                                <th class="table-list" style="padding:5px">Keterangan Tambahan</th>
                                <th class="table-list" style="padding:5px">Anak Ke</th>
                                <th class="table-list" style="padding:5px">Berat Lahir</th>
                                <th class="table-list" style="padding:5px">Panjang Badan</th>
                                <th class="table-list" style="padding:5px">Lingkar Kepala</th>
                                <th class="table-list" style="padding:5px">Jenis Kelamin</th>
                                <th class="table-list" style="padding:5px">Kondisi Saat Bayi Lahir</th>
                                <th class="table-list" style="padding:5px">Asuhan Bayi Baru Lahir</th>
                                <th class="table-list" style="padding:5px">Keterangan Tambahan</th>
                                <th class="table-list" style="padding:5px">Suhu</th>
                                <th class="table-list" style="padding:5px">Ikterik</th>
                                <th class="table-list" style="padding:5px">Pusar</th>
                                <th class="table-list" style="padding:5px">Menyusui</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '8') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama</th>
                                <th class="table-list" style="padding:5px">Umur</th>
                                <th class="table-list" style="padding:5px">Suami</th>
                                <th class="table-list" style="padding:5px">Alamat</th>
                                <th class="table-list" style="padding:5px">Tanggal dan Jam</th>
                                <th class="table-list" style="padding:5px">Dirujuk Ke</th>
                                <th class="table-list" style="padding:5px">Sebab Dirujuk</th>
                                <th class="table-list" style="padding:5px">Diagnosa Sementara</th>
                                <th class="table-list" style="padding:5px">Tindakan Sementara</th>
                                <th class="table-list" style="padding:5px">Yang Merujuk</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } elseif($menu == '9') { ?>
                                <th class="table-list" style="padding:5px">Nomor Registrasi</th>
                                <th class="table-list" style="padding:5px">Nama Pasien</th>
                                <th class="table-list" style="padding:5px">Pemeriksaan Penunjang</th>
                                <th class="table-list" style="padding:5px">Jenis Rapid</th>
                                <th class="table-list" style="padding:5px">Hasil</th>
                                <th class="table-list" style="padding:5px">Keluhan</th>
                                <th class="table-list" style="padding:5px">Therapy</th>
                                <th class="table-list" style="padding:5px">Harga</th>
                                <th class="table-list" style="padding:5px">Nama Pemeriksa</th>
                                <th class="table-list" style="padding:5px">Data Dimasukkan Pada</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($data as $d) {
                            ?>
                            <tr>
                                <td style="padding:5px" class="table-list"><?= $no++."." ?></td>
                                <?php
                                        if($menu == '1') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->supporting_investigation ?></td>
                                <td><?= $d->weight ?></td>
                                <td><?= $d->body_temperature ?></td>
                                <td><?= $d->tension ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->code ?></td>
                                <td><?= $d->diagnose ?></td>
                                <td><?= $d->complaints ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '2') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->head_of_family ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= $d->number_of_children ?></td>
                                <td>
                                    <?php
                                        if($d->type == "1") {
                                            echo "Suntik";
                                        } elseif($d->type == "2") {
                                            echo "Ayudi";
                                        } elseif($d->type == "3") {
                                            echo "Pil";
                                        } elseif($d->type == "4") {
                                            echo "Implan";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->last_child_age ?></td>
                                <td><?= $d->supporting_investigation ?></td>
                                <td><?= date("d/m/Y",strtotime($d->revisit)) ?></td>
                                <td><?= $d->weight ?></td>
                                <td><?= $d->blood ?></td>
                                <td><?= $d->description ?></td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '3') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->husband ?></td>
                                <td><?= $d->mother ?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= $d->education ?></td>
                                <td><?= $d->job ?></td>
                                <td><?= $d->nik ?></td>
                                <td>
                                    <?php
                                        if($d->visit == 'l') {
                                            echo "Lama";
                                        } else {
                                            echo "Baru";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $tgl = date("d",strtotime($d->revisit));
                                        $dln = date("m",strtotime($d->revisit));
                                        $thn = date("Y",strtotime($d->revisit));

                                        if($dln == "01") {
                                            $dln = "Januari";
                                        } elseif($dln == "02") {
                                            $dln = "Februari";
                                        } elseif($dln == "03") {
                                            $dln = "Maret";
                                        } elseif($dln == "04") {
                                            $dln = "April";
                                        } elseif($dln == "05") {
                                            $dln = "Mei";
                                        } elseif($dln == "06") {
                                            $dln = "Juni";
                                        } elseif($dln == "07") {
                                            $dln = "Juli";
                                        } elseif($dln == "08") {
                                            $dln = "Agustus";
                                        } elseif($dln == "09") {
                                            $dln = "September";
                                        } elseif($dln == "10") {
                                            $dln = "Oktober";
                                        } elseif($dln == "11") {
                                            $dln = "November";
                                        } elseif($dln == "12") {
                                            $dln = "Desember";
                                        }

                                        echo $tgl." ".$dln." ".$thn;
                                    ?>
                                </td>
                                <td><?= "G".$d->g."P".$d->p."A".$d->a ?></td>
                                <td>
                                    <?php
                                        $tgl = date("d",strtotime($d->hpht));
                                        $dln = date("m",strtotime($d->hpht));
                                        $thn = date("Y",strtotime($d->hpht));

                                        if($dln == "01") {
                                            $dln = "Januari";
                                        } elseif($dln == "02") {
                                            $dln = "Februari";
                                        } elseif($dln == "03") {
                                            $dln = "Maret";
                                        } elseif($dln == "04") {
                                            $dln = "April";
                                        } elseif($dln == "05") {
                                            $dln = "Mei";
                                        } elseif($dln == "06") {
                                            $dln = "Juni";
                                        } elseif($dln == "07") {
                                            $dln = "Juli";
                                        } elseif($dln == "08") {
                                            $dln = "Agustus";
                                        } elseif($dln == "09") {
                                            $dln = "September";
                                        } elseif($dln == "10") {
                                            $dln = "Oktober";
                                        } elseif($dln == "11") {
                                            $dln = "November";
                                        } elseif($dln == "12") {
                                            $dln = "Desember";
                                        }

                                        echo $tgl." ".$dln." ".$thn;
                                    ?>
                                </td>
                                <td><?= $d->tp ?></td>
                                <td><?= $d->gestational_age ?></td>
                                <td><?= $d->td ?></td>
                                <td><?= $d->bb ?></td>
                                <td><?= $d->tb ?></td>
                                <td><?= $d->lila ?></td>
                                <td><?= $d->tfu ?></td>
                                <td><?= $d->dii ?></td>
                                <td><?= $d->pres ?></td>
                                <td><?= $d->tt ?></td>
                                <td><?= ($d->fe == '1') ? '✓' : '' ?></td>
                                <td><?= $d->fetal_position ?></td>
                                <td><?= $d->fetal_heart_rate ?></td>
                                <td><?= $d->immunization ?></td>
                                <td><?= $d->blood_boost_tablets ?></td>
                                <td><?= $d->lab ?></td>
                                <td>
                                    <?php
                                        if($d->blood == '1') {
                                            echo 'A';
                                        } elseif($d->blood == '2') {
                                            echo 'B';
                                        } elseif($d->blood == '3') {
                                            echo 'AB';
                                        } elseif($d->blood == '4') {
                                            echo 'O';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->hb ?></td>
                                <td>
                                    <?php
                                        if($d->hiv == '1') {
                                            echo 'Reaktif';
                                        } elseif($d->hiv == '2') {
                                            echo 'Non Reaktif';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hbsag == '1') {
                                            echo 'Reaktif';
                                        } elseif($d->hbsag == '2') {
                                            echo 'Non Reaktif';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->sifilis == '1') {
                                            echo 'Reaktif';
                                        } else {
                                            echo 'Non Reaktif';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->urine == '1') {
                                            echo '-';
                                        } elseif($d->urine == '2') {
                                            echo '+1';
                                        } elseif($d->urine == '3') {
                                            echo '+2';
                                        } elseif($d->urine == '4') {
                                            echo '+3';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->glukosa ?></td>
                                <td><?= $d->ref ?></td>
                                <td><?= $d->diagnose ?></td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td>
                                    <?php
                                        if($d->status == "1") {
                                            echo "PBI";
                                        } elseif($d->status == "2") {
                                            echo "Non PBI";
                                        } else {
                                            echo "Umum";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->governance ?></td>
                                <td><?= $d->counseling ?></td>
                                <td><?= $d->service_place ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '4') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->head_of_family ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= $d->weight ?></td>
                                <td><?= $d->height ?></td>
                                <td>
                                    <?php
                                        $tgl = date("d",strtotime($d->first_day));
                                        $dln = date("m",strtotime($d->first_day));
                                        $thn = date("Y",strtotime($d->first_day));

                                        if($dln == "01") {
                                            $dln = "Januari";
                                        } elseif($dln == "02") {
                                            $dln = "Februari";
                                        } elseif($dln == "03") {
                                            $dln = "Maret";
                                        } elseif($dln == "04") {
                                            $dln = "April";
                                        } elseif($dln == "05") {
                                            $dln = "Mei";
                                        } elseif($dln == "06") {
                                            $dln = "Juni";
                                        } elseif($dln == "07") {
                                            $dln = "Juli";
                                        } elseif($dln == "08") {
                                            $dln = "Agustus";
                                        } elseif($dln == "09") {
                                            $dln = "September";
                                        } elseif($dln == "10") {
                                            $dln = "Oktober";
                                        } elseif($dln == "11") {
                                            $dln = "November";
                                        } elseif($dln == "12") {
                                            $dln = "Desember";
                                        }

                                        echo $tgl." ".$dln." ".$thn;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $tgl = date("d",strtotime($d->estimated_day));
                                        $dln = date("m",strtotime($d->estimated_day));
                                        $thn = date("Y",strtotime($d->estimated_day));

                                        if($dln == "01") {
                                            $dln = "Januari";
                                        } elseif($dln == "02") {
                                            $dln = "Februari";
                                        } elseif($dln == "03") {
                                            $dln = "Maret";
                                        } elseif($dln == "04") {
                                            $dln = "April";
                                        } elseif($dln == "05") {
                                            $dln = "Mei";
                                        } elseif($dln == "06") {
                                            $dln = "Juni";
                                        } elseif($dln == "07") {
                                            $dln = "Juli";
                                        } elseif($dln == "08") {
                                            $dln = "Agustus";
                                        } elseif($dln == "09") {
                                            $dln = "September";
                                        } elseif($dln == "10") {
                                            $dln = "Oktober";
                                        } elseif($dln == "11") {
                                            $dln = "November";
                                        } elseif($dln == "12") {
                                            $dln = "Desember";
                                        }

                                        echo $tgl." ".$dln." ".$thn;
                                    ?>
                                </td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->date)) ?></td>
                                <td>
                                    <?php
                                        if($d->blood_group == '1') {
                                            echo 'A';
                                        } elseif($d->blood_group == '2') {
                                            echo 'B';
                                        } elseif($d->blood_group == '3') {
                                            echo 'AB';
                                        } elseif($d->blood_group == '4') {
                                            echo 'O';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->contraceptive_use ?></td>
                                <td><?= $d->disease_history ?></td>
                                <td><?= $d->allergy_history ?></td>
                                <td><?= $d->immunization ?></td>
                                <td><?= "G".$d->g."P".$d->p."A".$d->a ?></td>
                                <td><?= 'P'.$d->obstetric_p.'A'.$d->obstetric_a ?></td>
                                <td><?= $d->pregnancy ?></td>
                                <td><?= $d->year ?></td>
                                <td>
                                    <?php
                                        if($d->born == "1") {
                                            echo "Hidup";
                                        } elseif($d->born == "2") {
                                            echo "Mati";
                                        } elseif($d->born == "3") {
                                            echo "Abortus";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->born_app == "1") {
                                            echo "Aterm";
                                        } elseif($d->born_app == "2") {
                                            echo "Pre Term";
                                        } elseif($d->born_app == "3") {
                                            echo "Post Term";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->born_sso == "1") {
                                            echo "Spontan";
                                        } elseif($d->born_sso == "2") {
                                            echo "SC";
                                        } elseif($d->born_sso == "3") {
                                            echo "Lainnya";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->weight_born ?></td>
                                <td><?= $d->height_born ?></td>
                                <td><?= $d->birthing_place ?></td>
                                <td><?= $d->condition ?></td>
                                <td>
                                    <?php
                                        if($d->complication == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->child ?></td>
                                <td><?= $d->weight_born ?></td>
                                <td><?= $d->height_born ?></td>
                                <td>
                                    <?php
                                        if($d->gender == "1") {
                                            echo "Laki-laki";
                                        } else {
                                            echo "Perempuan";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->phone ?></td>
                                <td>
                                    <?php
                                        if($d->complication == '1') {
                                            echo $d->description;
                                        } else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->refer == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->refer == '1') {
                                            echo $d->desc_refer;
                                        } else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hecting == "1") {
                                            echo '✓';
                                        } else {
                                            echo '-';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->day === "Monday") {
                                            echo "Senin";
                                        } elseif($d->day === "Tuesday") {
                                            echo "Selasa";
                                        } elseif($d->day === "Wednesday") {
                                            echo "Rabu";
                                        } elseif($d->day === "Thursday") {
                                            echo "Kamis";
                                        } elseif($d->day === "Friday") {
                                            echo "Jum'at";
                                        } elseif($d->day === "Saturday") {
                                            echo "Sabtu";
                                        } elseif($d->day === "Sunday") {
                                            echo "Minggu";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '5') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= date('d/m/Y',strtotime($d->date_of_birth)) ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= $d->weight ?></td>
                                <td><?= $d->body_temp ?></td>
                                <td><?= $d->height ?></td>
                                <td><?= $d->parent_name ?></td>
                                <td>
                                    <?php
                                        if($d->bcg == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hb_neo == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hib_1 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hib_2 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->hib_3 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->polio_1 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->polio_2 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->polio_3 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->polio_4 == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->campak == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->booster == "1") {
                                            echo "Campak";
                                        } else {
                                            echo "DPT";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->polio_ipv == "1") {
                                            echo "✓";
                                        }
                                    ?>
                                </td>
                                <td><?= $d->supporting_investigation ?></td>
                                <td><?= $d->immune_type ?></td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '6') {
                                ?>
                                <td><?= $d->pid?></td>
                                <td><?= $d->name?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->husband ?></td>
                                <td><?= $d->address?></td>
                                <td>
                                    <?php
                                        if($d->visit == '1') {
                                            echo '6 jam - 3 hari';
                                        } elseif($d->visit == '2') {
                                            echo '4 - 28 hari';
                                        } elseif($d->visit == '3') {
                                            echo '29 - 42 hari';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->condition == '1') {
                                            echo 'Baik';
                                        } elseif($d->condition == '2') {
                                            echo 'Sedang';
                                        } elseif($d->condition == '3') {
                                            echo 'Kurang Baik';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->td ?></td>
                                <td><?= $d->body_temp ?></td>
                                <td><?= $d->respiration ?></td>
                                <td><?= $d->pulse ?></td>
                                <td>
                                    <?php
                                        if($d->bleeding == '1') {
                                            echo 'Normal';
                                        } else {
                                            echo 'Tidak Normal';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->perineum == '1') {
                                            echo 'Kering';
                                        } else {
                                            echo 'Basah';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->infection == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->uteri == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->tfu ?></td>
                                <td>
                                    <?php
                                        if($d->lokhia == '1') {
                                            echo 'rubra';
                                        } elseif($d->lokhia == '2') {
                                            echo 'sanguinolenta';
                                        } elseif($d->lokhia == '3') {
                                            echo 'serosa';
                                        } elseif($d->lokhia == '4') {
                                            echo 'alba';
                                        } elseif($d->lokhia == '5') {
                                            echo 'parulenta';
                                        } elseif($d->lokhia == '6') {
                                            echo 'lochiotosis';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->inspection ?></td>
                                <td><?= $d->breast ?></td>
                                <td>
                                    <?php
                                        if($d->asi == '1') {
                                            echo 'Menyusui';
                                        } else {
                                            echo 'Tidak Menyusui';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->capsule == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->contraception ?></td>
                                <td><?= $d->handling ?></td>
                                <td>
                                    <?php
                                        if($d->bab == '1') {
                                            echo 'Normal';
                                        } else {
                                            echo 'Tidak Normal';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->bak == '1') {
                                            echo 'Normal';
                                        } else {
                                            echo 'Tidak Normal';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= 'Rp. '.$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '7') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->husband_name ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= date('d/m/Y H:i',strtotime($d->datetime)) ?></td>
                                <td><?= $d->gestational_age." minggu" ?></td>
                                <td><?= $d->birth_attendant ?></td>
                                <td>
                                    <?php
                                        if($d->how == '1'){
                                            echo 'Normal';
                                        } else {
                                            echo 'Tindakan';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->condition == '1') {
                                            echo 'Sehat';
                                        } elseif($d->condition == '2') {
                                            echo 'Pendarahan';
                                        } elseif($d->condition == '3') {
                                            echo 'Demam';
                                        } elseif($d->condition == '4') {
                                            echo 'Kejang';
                                        } elseif($d->condition == '5') {
                                            echo 'Lokhia berbau';
                                        } elseif($d->condition == '6') {
                                            echo 'Meninggal';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->add_info ?></td>
                                <td><?= $d->child ?></td>
                                <td><?= $d->weight." gram" ?></td>
                                <td><?= $d->height." cm" ?></td>
                                <td><?= $d->head." cm" ?></td>
                                <td>
                                    <?php
                                        if($d->gender == '1') {
                                            echo 'Laki-laki';
                                        } else {
                                            echo 'Perempuan';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->condition_1 == '1') {
                                            echo 'Segera menangis';

                                            if($d->condition_2 == '1' OR $d->condition_3 == '1' OR $d->condition_4 == '1' OR $d->condition_5 == '1' OR $d->condition_6 == '1' OR $d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_2 == '1') {
                                            echo 'Menangis beberapa saat';

                                            if($d->condition_3 == '1' OR $d->condition_4 == '1' OR $d->condition_5 == '1' OR $d->condition_6 == '1' OR $d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_3 == '1') {
                                            echo 'Tidak menangis';

                                            if($d->condition_4 == '1' OR $d->condition_5 == '1' OR $d->condition_6 == '1' OR $d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_4 == '1') {
                                            echo 'Seluruh tubuh kemerahan';

                                            if($d->condition_5 == '1' OR $d->condition_6 == '1' OR $d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_5 == '1') {
                                            echo 'Anggota gerak kebiruan';

                                            if($d->condition_6 == '1' OR $d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_6 == '1') {
                                            echo 'Seluruh tubuh biru';

                                            if($d->condition_7 == '1' OR $d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_7 == '1') {
                                            echo 'Kelainan bawaan';

                                            if($d->condition_8 == '1') {
                                                echo ", ";
                                            }
                                        }

                                        if($d->condition_8 == '1') {
                                            echo 'Meninggal';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->care_1 == '1') {
                                            echo 'Inisiasi menyusu dini (IMD) dalam 1 jam pertama kelahiran bayi';

                                            if($d->care_2 == '1' OR $d->care_3 == '1' OR $d->care_4 == '1') {
                                                echo ', ';
                                            }
                                        }

                                        if($d->care_2 == '1') {
                                            echo 'Suntikan vitamin k1';

                                            if($d->care_3 == '1' OR $d->care_4 == '1') {
                                                echo ', ';
                                            }
                                        }

                                        if($d->care_3 == '1') {
                                            echo 'Salep mata antibiotik profilaksis';

                                            if($d->care_4 == '1') {
                                                echo ', ';
                                            }
                                        }

                                        if($d->care_4 == '1') {
                                            echo 'Imunisasi Hepatitis B';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->add_info2 ?></td>
                                <td><?= $d->temp ?></td>
                                <td>
                                    <?php
                                        if($d->ikterik == '1') {
                                            echo 'Ya';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->navel == '1') {
                                            echo 'Puput';
                                        } else {
                                            echo 'Tidak';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($d->feed == '1') {
                                            echo 'ASI';
                                        } elseif($d->feed == '2') {
                                            echo 'ASI & Sufor';
                                        } elseif($d->feed == '3') {
                                            echo 'Sufor';
                                        }
                                    ?>
                                </td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '8') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->age ?></td>
                                <td><?= $d->husband ?></td>
                                <td><?= $d->address ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->datetime)) ?></td>
                                <td><?= $d->ref_to ?></td>
                                <td><?= $d->cause ?></td>
                                <td><?= $d->diagnose ?></td>
                                <td><?= $d->act ?></td>
                                <td><?= $d->who ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                <?php
                                        } elseif($menu == '9') {
                                ?>
                                <td><?= $d->pid ?></td>
                                <td><?= $d->name ?></td>
                                <td><?= $d->supporting_investigation ?></td>
                                <td><?= $d->rapid_type ?></td>
                                <td><?= $d->result ?></td>
                                <td><?= $d->complaint ?></td>
                                <td><?= $d->therapy ?></td>
                                <td><?= "Rp. ".$d->price ?></td>
                                <td><?= $d->examiner ?></td>
                                <td><?= date('d/m/Y H:i:s',strtotime($d->created_at)) ?></td>
                                </tr>
                                <?php
                                    }}
                                ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>