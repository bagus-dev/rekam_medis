<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rapid</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-notes-medical"></i> Rapid</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/rapid/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($rapids as $r) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $r->pid ?></td>
                                        <td><?= $r->name ?></td>
                                        <td><?= $r->supporting_investigation ?></td>
                                        <td><?= $r->rapid_type ?></td>
                                        <td><?= $r->result ?></td>
                                        <td><?= $r->complaint ?></td>
                                        <td><?= $r->therapy ?></td>
                                        <td><?= "Rp. ".$r->price ?></td>
                                        <td><?= $r->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($r->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/rapid/edit/'.$r->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/rapid/delete/'.$r->id) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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