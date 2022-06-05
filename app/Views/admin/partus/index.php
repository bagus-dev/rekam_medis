<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Partus</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-heartbeat"></i> Partus</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/parturition/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($partus as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $p->pid ?></td>
                                        <td><?= $p->name ?></td>
                                        <td><?= $p->age ?></td>
                                        <td><?= $p->head_of_family ?></td>
                                        <td><?= $p->address ?></td>
                                        <td><?= $p->weight ?></td>
                                        <td><?= $p->height ?></td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($p->first_day));
                                                $bln = date("m",strtotime($p->first_day));
                                                $thn = date("Y",strtotime($p->first_day));

                                                if($bln == "01") {
                                                    $bln = "Januari";
                                                } elseif($bln == "02") {
                                                    $bln = "Februari";
                                                } elseif($bln == "03") {
                                                    $bln = "Maret";
                                                } elseif($bln == "04") {
                                                    $bln = "April";
                                                } elseif($bln == "05") {
                                                    $bln = "Mei";
                                                } elseif($bln == "06") {
                                                    $bln = "Juni";
                                                } elseif($bln == "07") {
                                                    $bln = "Juli";
                                                } elseif($bln == "08") {
                                                    $bln = "Agustus";
                                                } elseif($bln == "09") {
                                                    $bln = "September";
                                                } elseif($bln == "10") {
                                                    $bln = "Oktober";
                                                } elseif($bln == "11") {
                                                    $bln = "November";
                                                } elseif($bln == "12") {
                                                    $bln = "Desember";
                                                }

                                                echo $tgl." ".$bln." ".$thn;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($p->estimated_day));
                                                $bln = date("m",strtotime($p->estimated_day));
                                                $thn = date("Y",strtotime($p->estimated_day));

                                                if($bln == "01") {
                                                    $bln = "Januari";
                                                } elseif($bln == "02") {
                                                    $bln = "Februari";
                                                } elseif($bln == "03") {
                                                    $bln = "Maret";
                                                } elseif($bln == "04") {
                                                    $bln = "April";
                                                } elseif($bln == "05") {
                                                    $bln = "Mei";
                                                } elseif($bln == "06") {
                                                    $bln = "Juni";
                                                } elseif($bln == "07") {
                                                    $bln = "Juli";
                                                } elseif($bln == "08") {
                                                    $bln = "Agustus";
                                                } elseif($bln == "09") {
                                                    $bln = "September";
                                                } elseif($bln == "10") {
                                                    $bln = "Oktober";
                                                } elseif($bln == "11") {
                                                    $bln = "November";
                                                } elseif($bln == "12") {
                                                    $bln = "Desember";
                                                }

                                                echo $tgl." ".$bln." ".$thn;
                                            ?>
                                        </td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($p->date)) ?></td>
                                        <td>
                                            <?php
                                                if($p->blood_group == '1') {
                                                    echo 'A';
                                                } elseif($p->blood_group == '2') {
                                                    echo 'B';
                                                } elseif($p->blood_group == '3') {
                                                    echo 'AB';
                                                } elseif($p->blood_group == '4') {
                                                    echo 'O';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->contraceptive_use ?></td>
                                        <td><?= $p->disease_history ?></td>
                                        <td><?= $p->allergy_history ?></td>
                                        <td><?= $p->immunization ?></td>
                                        <td><?= "G".$p->g."P".$p->p."A".$p->a ?></td>
                                        <td><?= 'P'.$p->obstetric_p.'A'.$p->obstetric_a ?></td>
                                        <td><?= $p->pregnancy ?></td>
                                        <td><?= $p->year ?></td>
                                        <td>
                                            <?php
                                                if($p->born == "1") {
                                                    echo "Hidup";
                                                } elseif($p->born == "2") {
                                                    echo "Mati";
                                                } elseif($p->born == "3") {
                                                    echo "Abortus";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->born_app == "1") {
                                                    echo "Aterm";
                                                } elseif($p->born_app == "2") {
                                                    echo "Pre Term";
                                                } elseif($p->born_app == "3") {
                                                    echo "Post Term";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->born_sso == "1") {
                                                    echo "Spontan";
                                                } elseif($p->born_sso == "2") {
                                                    echo "SC";
                                                } elseif($p->born_sso == "3") {
                                                    echo "Lainnya";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->weight_born ?></td>
                                        <td><?= $p->height_born ?></td>
                                        <td><?= $p->birthing_place ?></td>
                                        <td><?= $p->condition ?></td>
                                        <td>
                                            <?php
                                                if($p->complication == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->child ?></td>
                                        <td><?= $p->weight_born ?></td>
                                        <td><?= $p->height_born ?></td>
                                        <td>
                                            <?php
                                                if($p->gender == "1") {
                                                    echo "Laki-laki";
                                                } else {
                                                    echo "Perempuan";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->phone ?></td>
                                        <td>
                                            <?php
                                                if($p->complication == '1') {
                                                    echo $p->description;
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->refer == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->refer == '1') {
                                                    echo $p->desc_refer;
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->hecting == "1") {
                                                    echo '✓';
                                                } else {
                                                    echo '-';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->day === "Monday") {
                                                    echo "Senin";
                                                } elseif($p->day === "Tuesday") {
                                                    echo "Selasa";
                                                } elseif($p->day === "Wednesday") {
                                                    echo "Rabu";
                                                } elseif($p->day === "Thursday") {
                                                    echo "Kamis";
                                                } elseif($p->day === "Friday") {
                                                    echo "Jum'at";
                                                } elseif($p->day === "Saturday") {
                                                    echo "Sabtu";
                                                } elseif($p->day === "Sunday") {
                                                    echo "Minggu";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->complaint ?></td>
                                        <td><?= $p->therapy ?></td>
                                        <td><?= "Rp. ".$p->price ?></td>
                                        <td><?= $p->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($p->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/parturition/edit/'.$p->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/parturition/delete/'.$p->id) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>