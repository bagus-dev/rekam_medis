<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-archive"></i> Laporan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/report') ?>" method="get">
                            <?= csrf_field() ?>
                            <?php
                                if(isset($_GET['start'])){
                                    $start = urldecode($_GET['start']);
                                }
                                if(isset($_GET['end'])){
                                    $end = urldecode($_GET['end']);
                                }
                            ?>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="start">Tanggal Mulai</label>
                                    <input type="text" name="start" id="start" class="form-control datetimepicker-input <?= ($validation->hasError('start')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#start" placeholder="Tanggal Mulai" value="<?php if(old('start') !== NULL){echo old('start'); }elseif(isset($_GET['start'])){echo $start; } ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('start') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="end">Tanggal Akhir</label>
                                    <input type="text" name="end" id="end" class="form-control datetimepicker-input <?= ($validation->hasError('end')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#end" placeholder="Tanggal Akhir" value="<?php if(old('end') !== NULL){echo old('end'); }elseif(isset($_GET['end'])){echo $end; } ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('end') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="menu">Data</label>
                                    <select name="menu" class="custom-select <?= ($validation->hasError('menu')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Data</option>
                                        <option value="1" <?php if(old('menu') !== NULL){if(old('menu') == '1'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '1'){echo 'selected'; }} ?>>Pengobatan</option>
                                        <option value="2" <?php if(old('menu') !== NULL){if(old('menu') == '2'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '2'){echo 'selected'; }} ?>>Keluarga Berencana</option>
                                        <option value="3" <?php if(old('menu') !== NULL){if(old('menu') == '3'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '3'){echo 'selected'; }} ?>>ANC & USG</option>
                                        <option value="4" <?php if(old('menu') !== NULL){if(old('menu') == '4'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '4'){echo 'selected'; }} ?>>Partus</option>
                                        <option value="5" <?php if(old('menu') !== NULL){if(old('menu') == '5'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '5'){echo 'selected'; }} ?>>Imunisasi</option>
                                        <option value="6" <?php if(old('menu') !== NULL){if(old('menu') == '6'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '6'){echo 'selected'; }} ?>>Ibu Nifas</option>
                                        <option value="7" <?php if(old('menu') !== NULL){if(old('menu') == '7'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '7'){echo 'selected'; }} ?>>Bayi Saat Lahir</option>
                                        <option value="8" <?php if(old('menu') !== NULL){if(old('menu') == '8'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '8'){echo 'selected'; }} ?>>Rujukan</option>
                                        <option value="9" <?php if(old('menu') !== NULL){if(old('menu') == '9'){echo 'selected'; }}elseif(isset($_GET['menu'])){if($_GET['menu'] == '9'){echo 'selected'; }} ?>>Rapid</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('menu') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div style="visibility:hidden">l</div>
                                    <button type="submit" class="btn btn-primary mt-2 w-100"><i class="fas fa-sign-in-alt"></i> Lihat Data</button>
                                </div>
                            </div>
                        </form>

                        <?php if(isset($_GET['start'])) { ?>
                        <h3 class="mt-3">Data</h3>
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example3">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <?php
                                            if($menu == '1') {
                                        ?>
                                        <th>No. Registrasi</th>
                                        <th>Nama Pasien</th>
                                        <th>Keluhan</th>
                                        <th>Pemeriksaan Penunjang</th>
                                        <th>Berat Badan</th>
                                        <th>Suhu Tubuh</th>
                                        <th>Tensi</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Kode</th>
                                        <th>Diagnosa</th>
                                        <th>Keluhan</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '2') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Pasien</th>
                                        <th>Umur</th>
                                        <th>Suami</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Anak</th>
                                        <th>Jenis KB</th>
                                        <th>Umur Anak Terakhir</th>
                                        <th>Pemeriksaan Penunjang Ulang</th>
                                        <th>Tanggal Kembali</th>
                                        <th>BB</th>
                                        <th>TD</th>
                                        <th>Keterangan</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '3') { ?>
                                        <th>NOMOR REGISTRASI</th>
                                        <th>NAMA PASIEN</th>
                                        <th>NAMA SUAMI</th>
                                        <th>NAMA IBU KANDUNG</th>
                                        <th>TGL LAHIR / UMUR</th>
                                        <th>ALAMAT</th>
                                        <th>PENDIDIKAN</th>
                                        <th>PEKERJAAN</th>
                                        <th>NOMOR NIK</th>
                                        <th>KUNJUNGAN</th>
                                        <th>KUNJUNGAN ULANG</th>
                                        <th>GPA</th>
                                        <th>HPHT</th>
                                        <th>TP</th>
                                        <th>USIA KEHAMILAN</th>
                                        <th>TD</th>
                                        <th>BB</th>
                                        <th>TB</th>
                                        <th>LILA</th>
                                        <th>TFU</th>
                                        <th>DII</th>
                                        <th>PRES</th>
                                        <th>TT</th>
                                        <th>FE</th>
                                        <th>LETAK JANIN</th>
                                        <th>DETAK JANTUNG JANIN</th>
                                        <th>IMUNISASI</th>
                                        <th>TABLET TAMBAH DARAH</th>
                                        <th>LAB</th>
                                        <th>GOLDAR</th>
                                        <th>HB</th>
                                        <th>HIV</th>
                                        <th>HBSAG</th>
                                        <th>SIFILIS</th>
                                        <th>URINE PROTEIN</th>
                                        <th>GLUKOSA</th>
                                        <th>RUJUKAN</th>
                                        <th>DIAGNOSA</th>
                                        <th>KELUHAN</th>
                                        <th>THERAPY</th>
                                        <th>STATUS</th>
                                        <th>TATA LAKSANA</th>
                                        <th>KONSELING</th>
                                        <th>TEMPAT PELAYANAN</th>
                                        <th>HARGA</th>
                                        <th>PETUGAS</th>
                                        <th>DATA DIMASUKKAN PADA</th>
                                        <?php } elseif($menu == '4') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Ibu</th>
                                        <th>Umur</th>
                                        <th>Suami</th>
                                        <th>Alamat</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Hari Pertama Haid Terakhir</th>
                                        <th>Hari Taksiran Persalinan</th>
                                        <th>Tanggal dan Jam</th>
                                        <th>Golongan Darah</th>
                                        <th>Penggunaan Kontrasepsi Sebelum Hamil</th>
                                        <th>Riwayat Penyakit yang Diderita Ibu</th>
                                        <th>Riwayat Alergi</th>
                                        <th>Status Imunisasi Tetanus Terakhir</th>
                                        <th>GPA</th>
                                        <th>Riwayat Obstetri</th>
                                        <th>Kehamilan Ke-</th>
                                        <th>Tahun</th>
                                        <th>Lahir Hidup/Mati/Abortus</th>
                                        <th>Lahir Aterm/Pre Term/Post Term</th>
                                        <th>Lahir Spontan/SC/Lainnya</th>
                                        <th>Berat Lahir</th>
                                        <th>Panjang Lahir</th>
                                        <th>Tempat Bersalin, Nakes</th>
                                        <th>Kondisi Anak Saat Ini</th>
                                        <th>Komplikasi Kehamilan/Persalinan</th>
                                        <th>Anak</th>
                                        <th>Berat Lahir</th>
                                        <th>Tinggi Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor HP</th>
                                        <th>Keterangan Komplikasi</th>
                                        <th>Rujuk</th>
                                        <th>Keterangan Rujuk</th>
                                        <th>Hecting</th>
                                        <th>Hari</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '5') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Pasien</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Berat Badan</th>
                                        <th>Suhu Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Nama Orang Tua</th>
                                        <th>BCG</th>
                                        <th>HB NEO</th>
                                        <th>DPT PENTABIO (HIB) 1</th>
                                        <th>DPT PENTABIO (HIB) 2</th>
                                        <th>DPT PENTABIO (HIB) 3</th>
                                        <th>Polio Tetes 1</th>
                                        <th>Polio Tetes 2</th>
                                        <th>Polio Tetes 3</th>
                                        <th>Polio Tetes 4</th>
                                        <th>Campak</th>
                                        <th>IM BOOSTER</th>
                                        <th>POLIO IPV</th>
                                        <th>Pemeriksaan Penunjang</th>
                                        <th>Jenis Imunisasi</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '6') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Ibu</th>
                                        <th>Umur</th>
                                        <th>Nama Suami</th>
                                        <th>Alamat</th>
                                        <th>Kunjungan</th>
                                        <th>Kondisi Ibu Secara Umum</th>
                                        <th>TD</th>
                                        <th>Suhu Tubuh</th>
                                        <th>Respirasi</th>
                                        <th>Nadi</th>
                                        <th>Pendarahan Pervagina</th>
                                        <th>Kondisi Perineum</th>
                                        <th>Tanda Infeksi</th>
                                        <th>Kontraksi Uteri</th>
                                        <th>TFU</th>
                                        <th>Lokhia</th>
                                        <th>Pemeriksaan Jalan Lahir</th>
                                        <th>Pemeriksaan Payudara</th>
                                        <th>Produksi ASI</th>
                                        <th>Pemberian Kapsul Vit. A</th>
                                        <th>Pelayanan Kontrasepsi Pascapersalinan</th>
                                        <th>Penanganan Resiko Tinggi dan Komplikasi Pada Nifas</th>
                                        <th>BAB</th>
                                        <th>BAK</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '7') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Ibu</th>
                                        <th>Umur</th>
                                        <th>Nama Suami</th>
                                        <th>Alamat</th>
                                        <th>Tanggal dan Jam Persalinan</th>
                                        <th>Umur Kehamilan</th>
                                        <th>Penolong Persalinan</th>
                                        <th>Cara Persalinan</th>
                                        <th>Keadaan Ibu</th>
                                        <th>Keterangan Tambahan</th>
                                        <th>Anak Ke</th>
                                        <th>Berat Lahir</th>
                                        <th>Panjang Badan</th>
                                        <th>Lingkar Kepala</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kondisi Saat Bayi Lahir</th>
                                        <th>Asuhan Bayi Baru Lahir</th>
                                        <th>Keterangan Tambahan</th>
                                        <th>Suhu</th>
                                        <th>Ikterik</th>
                                        <th>Pusar</th>
                                        <th>Menyusui</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '8') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Suami</th>
                                        <th>Alamat</th>
                                        <th>Tanggal dan Jam</th>
                                        <th>Dirujuk Ke</th>
                                        <th>Sebab Dirujuk</th>
                                        <th>Diagnosa Sementara</th>
                                        <th>Tindakan Sementara</th>
                                        <th>Yang Merujuk</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } elseif($menu == '9') { ?>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Pasien</th>
                                        <th>Pemeriksaan Penunjang</th>
                                        <th>Jenis Rapid</th>
                                        <th>Hasil</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($data as $d) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
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
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>