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
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-notes-medical"></i> Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/rapid/save') ?>" method="post">
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
                                <label for="supporting_investigation">Pemeriksaan Penunjang</label>
                                <input type="text" name="supporting_investigation" class="form-control <?= ($validation->hasError('supporting_investigation')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Penunjang" value="<?= old('supporting_investigation') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('supporting_investigation') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="rapid_type">Jenis Rapid</label>
                                <input type="text" name="rapid_type" class="form-control <?= ($validation->hasError('rapid_type')) ? 'is-invalid' : '' ?>" placeholder="Jenis Rapid" value="<?= old('rapid_type') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('rapid_type') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="result">Hasil</label>
                                <input type="text" name="result" class="form-control <?= ($validation->hasError('result')) ? 'is-invalid' : '' ?>" placeholder="Hasil" value="<?= old('result') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('result') ?></div>
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