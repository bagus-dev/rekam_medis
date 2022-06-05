<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ibu Nifas</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-female"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/postpartum_mother'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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

                        <form action="<?= base_url('admin/postpartum_mother/save') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="patient_id">Nama Ibu</label>
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
                                <label for="husband">Nama Suami</label>
                                <input type="text" name="husband" class="form-control <?= ($validation->hasError('husband')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('husband') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="visit">Kunjungan</label>
                                <select name="visit" class="custom-select <?= ($validation->hasError('visit')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('visit') == '1') ? 'selected' : '' ?>>6 jam - 3 hari</option>
                                    <option value="2" <?= (old('visit') == '2') ? 'selected' : '' ?>>4 - 28 hari</option>
                                    <option value="3" <?= (old('visit') == '3') ? 'selected' : '' ?>>29 - 42 hari</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('visit') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition">Kondisi Ibu Secara Umum</label>
                                <select name="condition" class="custom-select <?= ($validation->hasError('condition')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('condition') == '1') ? 'selected' : '' ?>>Baik</option>
                                    <option value="2" <?= (old('condition') == '2') ? 'selected' : '' ?>>Sedang</option>
                                    <option value="3" <?= (old('condition') == '3') ? 'selected' : '' ?>>Kurang Baik</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('condition') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="td">Tekanan Darah</label>
                                    <input type="number" name="td" class="form-control <?= ($validation->hasError('td')) ? 'is-invalid' : '' ?>" placeholder="Tekanan Darah" value="<?= old('td') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('td') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="body_temp">Suhu Tubuh</label>
                                    <input type="number" name="body_temp" class="form-control <?= ($validation->hasError('body_temp')) ? 'is-invalid' : '' ?>" placeholder="Suhu Tubuh" value="<?= old('body_temp') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('body_temp') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="respiration">Respirasi</label>
                                <input type="text" name="respiration" class="form-control <?= ($validation->hasError('respiration')) ? 'is-invalid' : '' ?>" placeholder="Respirasi" value="<?= old('respiration') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('respiration') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="pulse">Nadi</label>
                                <input type="text" name="pulse" class="form-control <?= ($validation->hasError('pulse')) ? 'is-invalid' : '' ?>" placeholder="Nadi" value="<?= old('pulse') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('pulse') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bleeding">Pendarahan Pervagina</label>
                                <select name="bleeding" class="custom-select <?= ($validation->hasError('bleeding')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('bleeding') == '1') ? 'selected' : '' ?>>Normal</option>
                                    <option value="2" <?= (old('bleeding') == '2') ? 'selected' : '' ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bleeding') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="perineum">Kondisi Perineum</label>
                                <select name="perineum" class="custom-select <?= ($validation->hasError('perineum')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('perineum') == '1') ? 'selected' : '' ?>>Kering</option>
                                    <option value="2" <?= (old('perineum') == '2') ? 'selected' : '' ?>>Basah</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('perineum') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="infection">Tanda Infeksi</label>
                                <select name="infection" class="custom-select <?= ($validation->hasError('infection')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('infection') == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= (old('infection') == '2') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('infection') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="uteri">Kontraksi Uteri</label>
                                <select name="uteri" class="custom-select <?= ($validation->hasError('uteri')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('uteri') == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= (old('uteri') == '2') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('uteri') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="tfu">TFU</label>
                                <input type="text" name="tfu" class="form-control <?= ($validation->hasError('tfu')) ? 'is-invalid' : '' ?>" placeholder="TFU" value="<?= old('tfu') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tfu') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="lokhia">Lokhia</label>
                                <select name="lokhia" class="custom-select <?= ($validation->hasError('lokhia')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('lokhia') == '1') ? 'selected' : '' ?>>rubra</option>
                                    <option value="2" <?= (old('lokhia') == '2') ? 'selected' : '' ?>>sanguinolenta</option>
                                    <option value="3" <?= (old('lokhia') == '3') ? 'selected' : '' ?>>serosa</option>
                                    <option value="4" <?= (old('lokhia') == '4') ? 'selected' : '' ?>>alba</option>
                                    <option value="5" <?= (old('lokhia') == '5') ? 'selected' : '' ?>>parulenta</option>
                                    <option value="6" <?= (old('lokhia') == '6') ? 'selected' : '' ?>>lochiotosis</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('lokhia') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="inspection">Pemeriksaan Jalan Lahir</label>
                                <input type="text" name="inspection" class="form-control <?= ($validation->hasError('inspection')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Jalan Lahir" value="<?= old('inspection') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('inspection') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="breast">Pemeriksaan Payudara</label>
                                <input type="text" name="breast" class="form-control <?= ($validation->hasError('breast')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Payudara" value="<?= old('breast') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('breast') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="asi">Produksi ASI</label>
                                <select name="asi" class="custom-select <?= ($validation->hasError('asi')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('asi') == '1') ? 'selected' : '' ?>>Menyusui</option>
                                    <option value="2" <?= (old('asi') == '2') ? 'selected' : '' ?>>Tidak Menyusui</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('asi') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="capsule">Pemberian Kapsul Vit. A</label>
                                <select name="capsule" class="custom-select <?= ($validation->hasError('capsule')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('capsule') == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= (old('capsule') == '2') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('capsule') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="contraception">Pelayanan Kontrasepsi Pascapersalinan</label>
                                <input type="text" name="contraception" class="form-control <?= ($validation->hasError('contraception')) ? 'is-invalid' : '' ?>" placeholder="Pelayanan Kontrasepsi Pascapersalinan" value="<?= old('contraception') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('contraception') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="handling">Penanganan Resiko Tinggi dan Komplikasi Pada Nifas</label>
                                <input type="text" name="handling" class="form-control <?= ($validation->hasError('handling')) ? 'is-invalid' : '' ?>" placeholder="Penanganan Resiko Tinggi dan Komplikasi Pada Nifas" value="<?= old('handling') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('handling') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bab">BAB</label>
                                <select name="bab" class="custom-select <?= ($validation->hasError('bab')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('bab') == '1') ? 'selected' : '' ?>>Normal</option>
                                    <option value="2" <?= (old('bab') == '2') ? 'selected' : '' ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bab') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bak">BAK</label>
                                <select name="bak" class="custom-select <?= ($validation->hasError('bak')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('bak') == '1') ? 'selected' : '' ?>>Normal</option>
                                    <option value="2" <?= (old('bak') == '2') ? 'selected' : '' ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bak') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Terapi</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Terapi" value="<?= old('therapy') ?>">
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