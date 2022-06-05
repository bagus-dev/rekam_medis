<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>ANC & USG</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-hospital"></i> ANC & USG</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/anc-usg/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>

                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NOMOR REGISTRASI</th>
                                        <th>NAMA PASIEN</th>
                                        <th>NAMA SUAMI</th>
                                        <th>NAMA IBU KANDUNG</th>
                                        <th>TGL LAHIR</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($anc_usgs as $a) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $a->pid ?></td>
                                        <td><?= $a->name ?></td>
                                        <td><?= $a->husband ?></td>
                                        <td><?= $a->mother ?></td>
                                        <td><?= date("d/m/Y",strtotime($a->date_of_birth)) ?></td>
                                        <td><?= $a->address ?></td>
                                        <td><?= $a->education ?></td>
                                        <td><?= $a->job ?></td>
                                        <td><?= $a->nik ?></td>
                                        <td>
                                            <?php
                                                if($a->visit == 'l') {
                                                    echo "Lama";
                                                } else {
                                                    echo "Baru";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($a->revisit));
                                                $bln = date("m",strtotime($a->revisit));
                                                $thn = date("Y",strtotime($a->revisit));

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
                                        <td><?= "G".$a->g."P".$a->p."A".$a->a ?></td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($a->hpht));
                                                $bln = date("m",strtotime($a->hpht));
                                                $thn = date("Y",strtotime($a->hpht));

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
                                        <td><?= $a->tp ?></td>
                                        <td><?= $a->gestational_age ?></td>
                                        <td><?= $a->td ?></td>
                                        <td><?= $a->bb ?></td>
                                        <td><?= $a->tb ?></td>
                                        <td><?= $a->lila ?></td>
                                        <td><?= $a->tfu ?></td>
                                        <td><?= $a->dii ?></td>
                                        <td><?= $a->pres ?></td>
                                        <td><?= $a->tt ?></td>
                                        <td><?= ($a->fe == '1') ? '✓' : '' ?></td>
                                        <td><?= $a->fetal_position ?></td>
                                        <td><?= $a->fetal_heart_rate ?></td>
                                        <td><?= $a->immunization ?></td>
                                        <td><?= $a->blood_boost_tablets ?></td>
                                        <td><?= $a->lab ?></td>
                                        <td>
                                            <?php
                                                if($a->blood == '1') {
                                                    echo 'A';
                                                } elseif($a->blood == '2') {
                                                    echo 'B';
                                                } elseif($a->blood == '3') {
                                                    echo 'AB';
                                                } elseif($a->blood == '4') {
                                                    echo 'O';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $a->hb ?></td>
                                        <td>
                                            <?php
                                                if($a->hiv == '1') {
                                                    echo 'Reaktif';
                                                } elseif($a->hiv == '2') {
                                                    echo 'Non Reaktif';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($a->hbsag == '1') {
                                                    echo 'Reaktif';
                                                } elseif($a->hbsag == '2') {
                                                    echo 'Non Reaktif';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($a->sifilis == '1') {
                                                    echo 'Reaktif';
                                                } else {
                                                    echo 'Non Reaktif';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($a->urine == '1') {
                                                    echo '-';
                                                } elseif($a->urine == '2') {
                                                    echo '+1';
                                                } elseif($a->urine == '3') {
                                                    echo '+2';
                                                } elseif($a->urine == '4') {
                                                    echo '+3';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $a->glukosa ?></td>
                                        <td><?= $a->ref ?></td>
                                        <td><?= $a->diagnose ?></td>
                                        <td><?= $a->complaint ?></td>
                                        <td><?= $a->therapy ?></td>
                                        <td>
                                            <?php
                                                if($a->status == "1") {
                                                    echo "PBI";
                                                } elseif($a->status == "2") {
                                                    echo "Non PBI";
                                                } else {
                                                    echo "Umum";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $a->governance ?></td>
                                        <td><?= $a->counseling ?></td>
                                        <td><?= $a->service_place ?></td>
                                        <td><?= "Rp. ".$a->price ?></td>
                                        <td><?= $a->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($a->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/anc-usg/edit/'.$a->id) ?>" class="btn btn-warning" title="Edit ANC & USG"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/anc-usg/delete/'.$a->id) ?>" class="btn btn-danger" title="Hapus ANC & USG"><i class="fas fa-trash-alt"></i></a>
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