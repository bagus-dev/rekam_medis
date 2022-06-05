<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dasbor</h1>
        </div>

        <div class="row mb-2">
            <div class="col-md-1 col-5">
                Rekam Medis
            </div>
            <div class="col-md-11 col-7 pl-0">
                <hr style="margin-top:10px">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-users text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Pasien</h4>
                        </div>
                        <div class="card-body">
                            <?= count($patients); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-user-injured text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Pengobatan</h4>
                        </div>
                        <div class="card-body">
                            <?= count($treatments); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fa fa-child text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Keluarga Berencana</h4>
                        </div>
                        <div class="card-body">
                            <?= count($families); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-hospital text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>ANC & USG</h4>
                        </div>
                        <div class="card-body">
                            <?= count($ancs); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-heartbeat text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Partus</h4>
                        </div>
                        <div class="card-body">
                            <?= count($partus); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-medkit text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Imunisasi</h4>
                        </div>
                        <div class="card-body">
                            <?= count($immunizations); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-female text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Ibu Nifas</h4>
                        </div>
                        <div class="card-body">
                            <?= count($posts); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fa fa-file-medical text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Bayi Saat Lahir</h4>
                        </div>
                        <div class="card-body">
                            <?= count($babies); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa fa-hospital-alt text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Rujukan</h4>
                        </div>
                        <div class="card-body">
                            <?= count($refs); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fa fa-notes-medical text-white fa-2x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header pt-3">
                            <h4>Rapid</h4>
                        </div>
                        <div class="card-body">
                            <?= count($rapids); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row no-gutters mb-2 mt-3">
            <div class="col-md-2 col-6">
                Daftar Pasien Terbaru
            </div>
            <div class="col-md-10 col-6 pl-0">
                <hr style="margin-top:11px">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-users"></i> Pasien Terbaru</h4>
                        <a href="<?= base_url('admin/patients'); ?>" class="btn bg-primary text-white py-1" id="btn_more"><i class="fas fa-arrow-right circle-icon"></i> &nbsp;Selengkapnya</a>
                    </div>
                    <div class="card-body pt-0">
                        <div class="border p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Umur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($latest as $l) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $l->name ?></td>
                                        <td>
                                            <?php
                                                $tgl = date("d",strtotime($l->date_of_birth));
                                                $bln = date("m",strtotime($l->date_of_birth));
                                                $thn = date("Y",strtotime($l->date_of_birth));

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

                                                echo $l->place_of_birth.", ".$tgl." ".$bln." ".$thn;
                                            ?>
                                        </td>
                                        <td><?= $l->age." Tahun" ?></td>
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