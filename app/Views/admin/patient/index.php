<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pasien</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-users"></i> Data Pasien</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/patients/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Registrasi</th>
                                        <th>Nama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Umur</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($patients as $p) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $p->id ?></td>
                                        <td><?= $p->name ?></td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($p->date_of_birth));
                                                $bln = date("m",strtotime($p->date_of_birth));
                                                $thn = date("Y",strtotime($p->date_of_birth));

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

                                                echo $p->place_of_birth.", ".$tgl." ".$bln." ".$thn;
                                            ?>
                                        </td>
                                        <td><?= $p->age." Tahun" ?></td>
                                        <td><?= $p->head_of_family ?></td>
                                        <td><?= $p->number_family_card ?></td>
                                        <td><?= $p->address ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/patients/edit/'.$p->id) ?>" class="btn btn-warning" title="Edit Pasien"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/patients/delete/'.$p->id) ?>" class="btn btn-danger" title="Hapus Pasien"><i class="fas fa-trash-alt"></i></a>
                                                <a href="<?= base_url('admin/patients/patient_card/'.$p->id) ?>" class="btn btn-success" target="_blank" title="Cetak Kartu Pasien"><i class="fas fa-print"></i></a>
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