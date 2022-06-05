<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Imunisasi</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-medkit"></i> Imunisasi</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/immunization/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($immunizations as $i) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $i->pid ?></td>
                                        <td><?= $i->name ?></td>
                                        <td><?= date('d/m/Y',strtotime($i->date_of_birth)) ?></td>
                                        <td><?= $i->address ?></td>
                                        <td><?= $i->weight ?></td>
                                        <td><?= $i->body_temp ?></td>
                                        <td><?= $i->height ?></td>
                                        <td><?= $i->parent_name ?></td>
                                        <td>
                                            <?php
                                                if($i->bcg == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->hb_neo == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->hib_1 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->hib_2 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->hib_3 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->polio_1 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->polio_2 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->polio_3 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->polio_4 == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->campak == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->booster == "1") {
                                                    echo "Campak";
                                                } else {
                                                    echo "DPT";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($i->polio_ipv == "1") {
                                                    echo "✓";
                                                }
                                            ?>
                                        </td>
                                        <td><?= $i->supporting_investigation ?></td>
                                        <td><?= $i->immune_type ?></td>
                                        <td><?= $i->complaint ?></td>
                                        <td><?= $i->therapy ?></td>
                                        <td><?= "Rp. ".$i->price ?></td>
                                        <td><?= $i->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($i->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/immunization/edit/'.$i->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/immunization/delete/'.$i->id) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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