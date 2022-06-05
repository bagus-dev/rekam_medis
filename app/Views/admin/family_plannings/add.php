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
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-child"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/family-planning'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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
                        
                        <form action="<?= base_url('admin/family-planning/save') ?>" method="post">
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
                                <label for="type">Jenis KB</label>
                                <select name="type" class="custom-select <?= ($validation->hasError('type')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Jenis</option>
                                    <option value="1" <?= (old('type') == '1') ? 'selected' : '' ?>>Suntik</option>
                                    <option value="2" <?= (old('type') == '2') ? 'selected' : '' ?>>Ayudi</option>
                                    <option value="3" <?= (old('type') == '3') ? 'selected' : '' ?>>Pil</option>
                                    <option value="4" <?= (old('type') == '4') ? 'selected' : '' ?>>Implan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('type') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="number_of_children">Jumlah Anak</label>
                                    <input type="number" name="number_of_children" class="form-control <?= ($validation->hasError('number_of_children')) ? 'is-invalid' : '' ?>" placeholder="Jumlah Anak" value="<?= old('number_of_children') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('number_of_children') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_child_age">Umur Anak Terakhir</label>
                                    <input type="number" name="last_child_age" class="form-control <?= ($validation->hasError('last_child_age')) ? 'is-invalid' : '' ?>" placeholder="Umur Anak Terakhir" value="<?= old('last_child_age') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('last_child_age') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supporting_investigation">Pemeriksaan Penunjang</label>
                                <input type="text" name="supporting_investigation" class="form-control <?= ($validation->hasError('supporting_investigation')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Penunjang" value="<?= old('supporting_investigation') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('supporting_investigation') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="revisit">Kunjungan Ulang</label>
                                <input type="text" name="revisit" id="revisit" class="form-control datetimepicker-input <?= ($validation->hasError('revisit')) ? 'is-invalid' : '' ?>" placeholder="Kunjungan Ulang" data-toggle="datetimepicker" data-target="#revisit" value="<?= old('revisit') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('revisit') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="weight">Berat Badan</label>
                                    <input type="number" name="weight" class="form-control <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>" placeholder="Berat Badan" value="<?= old('weight') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="blood">Tensi</label>
                                    <input type="number" name="blood" class="form-control <?= ($validation->hasError('blood')) ? 'is-invalid' : '' ?>" placeholder="Tekanan Darah" value="<?= old('blood') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('blood') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <input type="text" name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" placeholder="Keterangan" value="<?= old('description') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
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