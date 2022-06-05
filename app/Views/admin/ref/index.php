<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rujukan</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-hospital-alt"></i> Rujukan</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/reference/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($refs as $r) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $r->pid ?></td>
                                        <td><?= $r->name ?></td>
                                        <td><?= $r->age ?></td>
                                        <td><?= $r->husband ?></td>
                                        <td><?= $r->address ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($r->datetime)) ?></td>
                                        <td><?= $r->ref_to ?></td>
                                        <td><?= $r->cause ?></td>
                                        <td><?= $r->diagnose ?></td>
                                        <td><?= $r->act ?></td>
                                        <td><?= $r->who ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($r->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/reference/edit/'.$r->id) ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/reference/delete/'.$r->id) ?>" class="btn btn-danger" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                                <a href="<?= base_url('admin/reference/print/'.$r->id) ?>" class="btn btn-success" title="Print" target="_blank"><i class="fas fa-print"></i></a>
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