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
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-medkit"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/immunization'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="card border-left-info">
                            <div class="card-body pt-2 pb-0">
                                <h4 class="text-info"><i class="fas fa-info-circle" style="font-size:18pt"></i> Informasi</h4>
                                <p class="mt-3">
                                    Untuk input yang menggunakan <b>koma (,)</b> ganti dengan <b>titik (.)</b>
                                </p>
                            </div>
                        </div>

                        <form action="<?= base_url('admin/immunization/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="patient_id">Nama Pasien</label>
                                <select name="patient_id" id="select2" class="custom-select <?= ($validation->hasError('patient_id')) ? 'is-invalid' : '' ?>">
                                    <option></option>
                                    <?php
                                        foreach($patients as $p) {
                                    ?>
                                    <option value="<?= $p->id ?>" <?= (old('patient_id') == $p->id) ? 'selected' : '' ?>><?= $p->id." - ".$p->name ?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('patient_id') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control datetimepicker-input <?= ($validation->hasError('date_of_birth')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#date_of_birth" placeholder="Tanggal Lahir" value="<?= old('date_of_birth') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('date_of_birth') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" placeholder="Alamat" value="<?= old('address') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight">Berat Badan</label>
                                    <input type="number" name="weight" class="form-control <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>" placeholder="Berat Badan" value="<?= old('weight') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="body_temp">Suhu Badan</label>
                                    <input type="number" name="body_temp" step=".01" class="form-control <?= ($validation->hasError('body_temp')) ? 'is-invalid' : '' ?>" placeholder="Suhu Badan" value="<?= old('body_temp') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('body_temp') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height">Tinggi Badan</label>
                                    <input type="number" name="height" class="form-control <?= ($validation->hasError('height')) ? 'is-invalid' : '' ?>" placeholder="Tinggi Badan" value="<?= old('height') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('height') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="parent_name">Nama Orang Tua</label>
                                <input type="text" name="parent_name" class="form-control <?= ($validation->hasError('parent_name')) ? 'is-invalid' : '' ?>" placeholder="Nama Orang Tua" value="<?= old('parent_name') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('parent_name') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bcg">BCG</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="bcg" id="bcgCheck" class="custom-control-input" value="1" <?= (old('bcg') == '1') ? 'checked' : '' ?>>
                                    <label for="bcgCheck" class="custom-control-label">Check</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hb_neo">HB NEO</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="hb_neo" id="hbCheck" class="custom-control-input" value="1" <?= (old('hb_neo') == '1') ? 'checked' : '' ?>>
                                    <label for="hbCheck" class="custom-control-label">Check</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="display:block">DPT PENTABIO (HIB)</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="hib_1" id="hib1Check" class="custom-control-input" value="1" <?= (old('hib_1') == '1') ? 'checked' : '' ?>>
                                        <label for="hib1Check" class="custom-control-label">DPT PENTABIO (HIB) 1</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="hib_2" id="hib2Check" class="custom-control-input" value="1" <?= (old('hib_2') == '1') ? 'checked' : '' ?>>
                                        <label for="hib2Check" class="custom-control-label">DPT PENTABIO (HIB) 2</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="hib_3" id="hib3Check" class="custom-control-input" value="1" <?= (old('hib_3') == '1') ? 'checked' : '' ?>>
                                        <label for="hib3Check" class="custom-control-label">DPT PENTABIO (HIB) 3</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="display:block">Polio</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="polio_1" id="polio1Check" class="custom-control-input" value="1" <?= (old('polio_1') == '1') ? 'checked' : '' ?>>
                                        <label for="polio1Check" class="custom-control-label">Tetes 1</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="polio_2" id="polio2Check" class="custom-control-input" value="1" <?= (old('polio_2') == '1') ? 'checked' : '' ?>>
                                        <label for="polio2Check" class="custom-control-label">Tetes 2</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="polio_3" id="polio3Check" class="custom-control-input" value="1" <?= (old('polio_3') == '1') ? 'checked' : '' ?>>
                                        <label for="polio3Check" class="custom-control-label">Tetes 3</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="polio_4" id="polio4Check" class="custom-control-input" value="1" <?= (old('polio_4') == '1') ? 'checked' : '' ?>>
                                        <label for="polio4Check" class="custom-control-label">Tetes 4</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="campak">CAMPAK</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="campak" id="campakCheck" class="custom-control-input" value="1" <?= (old('campak') == '1') ? 'checked' : '' ?>>
                                    <label for="campakCheck" class="custom-control-label">Check</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="booster">IM BOOSTER</label>
                                <select name="booster" class="custom-select <?= ($validation->hasError('booster')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('booster') == '1') ? 'selected' : '' ?>>Campak</option>
                                    <option value="2" <?= (old('booster') == '2') ? 'selected' : '' ?>>DPT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="polio_ipv">POLIO IPV</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="polio_ipv" id="ipvCheck" class="custom-control-input" value="1" <?= (old('polio_ipv') == '1') ? 'checked' : '' ?>>
                                    <label for="ipvCheck" class="custom-control-label">Check</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supporting_investigation">Pemeriksaan Penunjang</label>
                                <input type="text" name="supporting_investigation" class="form-control <?= ($validation->hasError('supporting_investigation')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Penunjang" value="<?= old('supporting_investigation') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('supporting_investigation') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="immune_type">Jenis Imunisasi</label>
                                <input type="text" name="immune_type" class="form-control <?= ($validation->hasError('immune_type')) ? 'is-invalid' : '' ?>" placeholder="Jenis Imunisasi" value="<?= old('immune_type') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('immune_type') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Therapy</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Therapy" value="<?= old('therapy') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="Harga" value="<?= old('price') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="examiner">Nama Pemeriksa</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="Nama Pemeriksa" value="<?= old('examiner') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('examiner') ?></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>