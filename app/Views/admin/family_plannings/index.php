<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Keluarga Berencana</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-child"></i> Keluarga Berencana</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/family-planning/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($families as $f) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $f->pid ?></td>
                                        <td><?= $f->name ?></td>
                                        <td><?= $f->age ?></td>
                                        <td><?= $f->head_of_family ?></td>
                                        <td><?= $f->address ?></td>
                                        <td><?= $f->number_of_children ?></td>
                                        <td>
                                            <?php
                                                if($f->type == "1") {
                                                    echo "Suntik";
                                                } elseif($f->type == "2") {
                                                    echo "Ayudi";
                                                } elseif($f->type == "3") {
                                                    echo "Pil";
                                                } elseif($f->type == "4") {
                                                    echo "Implan";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $f->last_child_age ?></td>
                                        <td><?= $f->supporting_investigation ?></td>
                                        <td><?= date("d/m/Y",strtotime($f->revisit)) ?></td>
                                        <td><?= $f->weight ?></td>
                                        <td><?= $f->blood ?></td>
                                        <td><?= $f->description ?></td>
                                        <td><?= $f->complaint ?></td>
                                        <td><?= $f->therapy ?></td>
                                        <td><?= "Rp. ".$f->price ?></td>
                                        <td><?= $f->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($f->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/family-planning/edit/'.$f->id) ?>" class="btn btn-warning" title="Edit Keluarga Berencana"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/family-planning/delete/'.$f->id) ?>" class="btn btn-danger" title="Hapus Keluarga Berencana"><i class="fas fa-trash-alt"></i></a>
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