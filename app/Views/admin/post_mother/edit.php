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
                        <h4><i class="fas fa-female"></i> Edit Data</h4>
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

                        <form action="<?= base_url('admin/postpartum_mother/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $post->id ?>">

                            <div class="form-group">
                                <label for="patient_id">Nama Ibu</label>
                                <input type="text" name="patient_id" class="form-control" value="<?= $post->pid." - ".$post->name ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="husband">Nama Suami</label>
                                <input type="text" name="husband" class="form-control <?= ($validation->hasError('husband')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband') ? old('husband') : $post->husband ?>">
                                <div class="invalid-feedback"><?= $validation->getError('husband') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="visit">Kunjungan</label>
                                <select name="visit" class="custom-select <?= ($validation->hasError('visit')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('visit') !== NULL){if(old('visit') == '1'){echo 'selected'; }}else{if($post->visit == '1'){echo 'selected'; }} ?>>6 jam - 3 hari</option>
                                    <option value="2" <?php if(old('visit') !== NULL){if(old('visit') == '2'){echo 'selected'; }}else{if($post->visit == '2'){echo 'selected'; }} ?>>4 - 28 hari</option>
                                    <option value="3" <?php if(old('visit') !== NULL){if(old('visit') == '3'){echo 'selected'; }}else{if($post->visit == '3'){echo 'selected'; }} ?>>29 - 42 hari</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('visit') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition">Kondisi Ibu Secara Umum</label>
                                <select name="condition" class="custom-select <?= ($validation->hasError('condition')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('condition') !== NULL){if(old('condition') == '1'){echo 'selected'; }}else{if($post->condition == '1'){echo 'selected'; }} ?>>Baik</option>
                                    <option value="2" <?php if(old('condition') !== NULL){if(old('condition') == '2'){echo 'selected'; }}else{if($post->condition == '2'){echo 'selected'; }} ?>>Sedang</option>
                                    <option value="3" <?php if(old('condition') !== NULL){if(old('condition') == '3'){echo 'selected'; }}else{if($post->condition == '3'){echo 'selected'; }} ?>>Kurang Baik</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('condition') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="td">Tekanan Darah</label>
                                    <input type="number" name="td" class="form-control <?= ($validation->hasError('td')) ? 'is-invalid' : '' ?>" placeholder="Tekanan Darah" value="<?= old('td') ? old('td') : $post->td ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('td') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="body_temp">Suhu Tubuh</label>
                                    <input type="number" name="body_temp" class="form-control <?= ($validation->hasError('body_temp')) ? 'is-invalid' : '' ?>" placeholder="Suhu Tubuh" value="<?= old('body_temp') ? old('body_temp') : $post->body_temp ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('body_temp') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="respiration">Respirasi</label>
                                <input type="text" name="respiration" class="form-control <?= ($validation->hasError('respiration')) ? 'is-invalid' : '' ?>" placeholder="Respirasi" value="<?= old('respiration') ? old('respiration') : $post->respiration ?>">
                                <div class="invalid-feedback"><?= $validation->getError('respiration') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="pulse">Nadi</label>
                                <input type="text" name="pulse" class="form-control <?= ($validation->hasError('pulse')) ? 'is-invalid' : '' ?>" placeholder="Nadi" value="<?= old('pulse') ? old('pulse') : $post->pulse ?>">
                                <div class="invalid-feedback"><?= $validation->getError('pulse') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bleeding">Pendarahan Pervagina</label>
                                <select name="bleeding" class="custom-select <?= ($validation->hasError('bleeding')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('bleeding') !== NULL){if(old('bleeding') == '1'){echo 'selected'; }}else{if($post->bleeding == '1'){echo 'selected'; }} ?>>Normal</option>
                                    <option value="2" <?php if(old('bleeding') !== NULL){if(old('bleeding') == '2'){echo 'selected'; }}else{if($post->bleeding == '2'){echo 'selected'; }} ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bleeding') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="perineum">Kondisi Perineum</label>
                                <select name="perineum" class="custom-select <?= ($validation->hasError('perineum')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('perineum') !== NULL){if(old('perineum') == '1'){echo 'selected'; }}else{if($post->perineum == '1'){echo 'selected'; }} ?>>Kering</option>
                                    <option value="2" <?php if(old('perineum') !== NULL){if(old('perineum') == '2'){echo 'selected'; }}else{if($post->perineum == '2'){echo 'selected'; }} ?>>Basah</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('perineum') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="infection">Tanda Infeksi</label>
                                <select name="infection" class="custom-select <?= ($validation->hasError('infection')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('infection') !== NULL){if(old('infection') == '1'){echo 'selected'; }}else{if($post->infection == '1'){echo 'selected'; }} ?>>Ya</option>
                                    <option value="2" <?php if(old('infection') !== NULL){if(old('infection') == '2'){echo 'selected'; }}else{if($post->infection == '2'){echo 'selected'; }} ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('infection') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="uteri">Kontraksi Uteri</label>
                                <select name="uteri" class="custom-select <?= ($validation->hasError('uteri')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('uteri') !== NULL){if(old('uteri') == '1'){echo 'selected'; }}else{if($post->uteri == '1'){echo 'selected'; }} ?>>Ya</option>
                                    <option value="2" <?php if(old('uteri') !== NULL){if(old('uteri') == '2'){echo 'selected'; }}else{if($post->uteri == '2'){echo 'selected'; }} ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('uteri') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="tfu">TFU</label>
                                <input type="text" name="tfu" class="form-control <?= ($validation->hasError('tfu')) ? 'is-invalid' : '' ?>" placeholder="TFU" value="<?= old('tfu') ? old('tfu') : $post->tfu ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tfu') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="lokhia">Lokhia</label>
                                <select name="lokhia" class="custom-select <?= ($validation->hasError('lokhia')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '1'){echo 'selected'; }}else{if($post->lokhia == '1'){echo 'selected'; }} ?>>rubra</option>
                                    <option value="2" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '2'){echo 'selected'; }}else{if($post->lokhia == '2'){echo 'selected'; }} ?>>sanguinolenta</option>
                                    <option value="3" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '3'){echo 'selected'; }}else{if($post->lokhia == '3'){echo 'selected'; }} ?>>serosa</option>
                                    <option value="4" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '4'){echo 'selected'; }}else{if($post->lokhia == '4'){echo 'selected'; }} ?>>alba</option>
                                    <option value="5" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '5'){echo 'selected'; }}else{if($post->lokhia == '5'){echo 'selected'; }} ?>>parulenta</option>
                                    <option value="6" <?php if(old('lokhia') !== NULL){if(old('lokhia') == '6'){echo 'selected'; }}else{if($post->lokhia == '6'){echo 'selected'; }} ?>>lochiotosis</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('lokhia') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="inspection">Pemeriksaan Jalan Lahir</label>
                                <input type="text" name="inspection" class="form-control <?= ($validation->hasError('inspection')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Jalan Lahir" value="<?= old('inspection') ? old('inspection') : $post->inspection ?>">
                                <div class="invalid-feedback"><?= $validation->getError('inspection') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="breast">Pemeriksaan Payudara</label>
                                <input type="text" name="breast" class="form-control <?= ($validation->hasError('breast')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Payudara" value="<?= old('breast') ? old('breast') : $post->breast ?>">
                                <div class="invalid-feedback"><?= $validation->getError('breast') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="asi">Produksi ASI</label>
                                <select name="asi" class="custom-select <?= ($validation->hasError('asi')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('asi') !== NULL){if(old('asi') == '1'){echo 'selected'; }}else{if($post->asi == '1'){echo 'selected'; }} ?>>Menyusui</option>
                                    <option value="2" <?php if(old('asi') !== NULL){if(old('asi') == '2'){echo 'selected'; }}else{if($post->asi == '2'){echo 'selected'; }} ?>>Tidak Menyusui</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('asi') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="capsule">Pemberian Kapsul Vit. A</label>
                                <select name="capsule" class="custom-select <?= ($validation->hasError('capsule')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('capsule') !== NULL){if(old('capsule') == '1'){echo 'selected'; }}else{if($post->capsule == '1'){echo 'selected'; }} ?>>Ya</option>
                                    <option value="2" <?php if(old('capsule') !== NULL){if(old('capsule') == '2'){echo 'selected'; }}else{if($post->capsule == '2'){echo 'selected'; }} ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('capsule') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="contraception">Pelayanan Kontrasepsi Pascapersalinan</label>
                                <input type="text" name="contraception" class="form-control <?= ($validation->hasError('contraception')) ? 'is-invalid' : '' ?>" placeholder="Pelayanan Kontrasepsi Pascapersalinan" value="<?= old('contraception') ? old('contraception') : $post->contraception ?>">
                                <div class="invalid-feedback"><?= $validation->getError('contraception') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="handling">Penanganan Resiko Tinggi dan Komplikasi Pada Nifas</label>
                                <input type="text" name="handling" class="form-control <?= ($validation->hasError('handling')) ? 'is-invalid' : '' ?>" placeholder="Penanganan Resiko Tinggi dan Komplikasi Pada Nifas" value="<?= old('handling') ? old('handling') : $post->handling ?>">
                                <div class="invalid-feedback"><?= $validation->getError('handling') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bab">BAB</label>
                                <select name="bab" class="custom-select <?= ($validation->hasError('bab')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('bab') !== NULL){if(old('bab') == '1'){echo 'selected'; }}else{if($post->bab == '1'){echo 'selected'; }} ?>>Normal</option>
                                    <option value="2" <?php if(old('bab') !== NULL){if(old('bab') == '2'){echo 'selected'; }}else{if($post->bab == '2'){echo 'selected'; }} ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bab') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="bak">BAK</label>
                                <select name="bak" class="custom-select <?= ($validation->hasError('bak')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('bak') !== NULL){if(old('bak') == '1'){echo 'selected'; }}else{if($post->bak == '1'){echo 'selected'; }} ?>>Normal</option>
                                    <option value="2" <?php if(old('bak') !== NULL){if(old('bak') == '2'){echo 'selected'; }}else{if($post->bak == '2'){echo 'selected'; }} ?>>Tidak Normal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('bak') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ? old('complaint') : $post->complaint ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Terapi</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Terapi" value="<?= old('therapy') ? old('therapy') : $post->therapy ?>">
                                <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="Harga" value="<?= old('price') ? old('price') : $post->price ?>">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="examiner">Nama Pemeriksa</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="Nama Pemeriksa" value="<?= old('examiner') ? old('examiner') : $post->examiner ?>">
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