<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ibu Nifas</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-female"></i> Ibu Nifas</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/postpartum_mother/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($posts as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $p->pid?></td>
                                        <td><?= $p->name?></td>
                                        <td><?= $p->age ?></td>
                                        <td><?= $p->husband ?></td>
                                        <td><?= $p->address?></td>
                                        <td>
                                            <?php
                                                if($p->visit == '1') {
                                                    echo '6 jam - 3 hari';
                                                } elseif($p->visit == '2') {
                                                    echo '4 - 28 hari';
                                                } elseif($p->visit == '3') {
                                                    echo '29 - 42 hari';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->condition == '1') {
                                                    echo 'Baik';
                                                } elseif($p->condition == '2') {
                                                    echo 'Sedang';
                                                } elseif($p->condition == '3') {
                                                    echo 'Kurang Baik';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->td ?></td>
                                        <td><?= $p->body_temp ?></td>
                                        <td><?= $p->respiration ?></td>
                                        <td><?= $p->pulse ?></td>
                                        <td>
                                            <?php
                                                if($p->bleeding == '1') {
                                                    echo 'Normal';
                                                } else {
                                                    echo 'Tidak Normal';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->perineum == '1') {
                                                    echo 'Kering';
                                                } else {
                                                    echo 'Basah';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->infection == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->uteri == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->tfu ?></td>
                                        <td>
                                            <?php
                                                if($p->lokhia == '1') {
                                                    echo 'rubra';
                                                } elseif($p->lokhia == '2') {
                                                    echo 'sanguinolenta';
                                                } elseif($p->lokhia == '3') {
                                                    echo 'serosa';
                                                } elseif($p->lokhia == '4') {
                                                    echo 'alba';
                                                } elseif($p->lokhia == '5') {
                                                    echo 'parulenta';
                                                } elseif($p->lokhia == '6') {
                                                    echo 'lochiotosis';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->inspection ?></td>
                                        <td><?= $p->breast ?></td>
                                        <td>
                                            <?php
                                                if($p->asi == '1') {
                                                    echo 'Menyusui';
                                                } else {
                                                    echo 'Tidak Menyusui';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->capsule == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->contraception ?></td>
                                        <td><?= $p->handling ?></td>
                                        <td>
                                            <?php
                                                if($p->bab == '1') {
                                                    echo 'Normal';
                                                } else {
                                                    echo 'Tidak Normal';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($p->bak == '1') {
                                                    echo 'Normal';
                                                } else {
                                                    echo 'Tidak Normal';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $p->complaint ?></td>
                                        <td><?= $p->therapy ?></td>
                                        <td><?= 'Rp. '.$p->price ?></td>
                                        <td><?= $p->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($p->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/postpartum_mother/edit/'.$p->id) ?>" class="btn btn-warning" title="Edit Data"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/postpartum_mother/delete/'.$p->id) ?>" class="btn btn-danger" title="Hapus Data"><i class="fas fa-trash-alt"></i></a>
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