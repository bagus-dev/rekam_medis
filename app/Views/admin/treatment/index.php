<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengobatan</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user-injured"></i> Pengobatan</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/treatments/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($treatments as $t) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $t->pid ?></td>
                                        <td><?= $t->name ?></td>
                                        <td><?= $t->complaint ?></td>
                                        <td><?= $t->supporting_investigation ?></td>
                                        <td><?= $t->weight ?></td>
                                        <td><?= $t->body_temperature ?></td>
                                        <td><?= $t->tension ?></td>
                                        <td><?= $t->therapy ?></td>
                                        <td><?= "Rp. ".$t->price ?></td>
                                        <td><?= $t->code ?></td>
                                        <td><?= $t->diagnose ?></td>
                                        <td><?= $t->complaints ?></td>
                                        <td><?= $t->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($t->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/treatments/edit/'.$t->id) ?>" class="btn btn-warning" title="Edit Pengobatan"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/treatments/delete/'.$t->id) ?>" class="btn btn-danger" title="Hapus Pengobatan"><i class="fas fa-trash-alt"></i></a>
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