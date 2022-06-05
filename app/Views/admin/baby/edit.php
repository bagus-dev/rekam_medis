<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bayi Saat Lahir</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-file-medical"></i> Edit Data</h4>
                        <a href="<?= base_url('admin/baby_at_birth'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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
                        
                        <form action="<?= base_url('admin/baby_at_birth/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $baby->id ?>">

                            <div class="form-group">
                                <label for="patient_id">Pasien</label>
                                <input type="text" name="patient_id" class="form-control" value="<?= $baby->pid." - ".$baby->name ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="husband_name">Nama Suami</label>
                                <input type="text" name="husband_name" class="form-control <?= ($validation->hasError('husband_name')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband_name') ? old('husband_name') : $baby->husband_name ?>">
                                <div class="invalid-feedback"><?= $validation->getError('husband_name') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal dan Jam Persalinan</label>
                                <input type="text" name="datetime" id="datetime" class="form-control datetimepicker-input <?= ($validation->hasError('datetime')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#datetime" placeholder="Tanggal dan Jam Persalinan" value="<?= old('datetime') ? old('datetime') : date('d/m/Y H.i',strtotime($baby->datetime)) ?>">
                                <div class="invalid-feedback"><?= $validation->getError('datetime') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="gestational_age">Umur Kehamilan</label>
                                <div class="input-group <?= ($validation->hasError('gestational_age')) ? 'is-invalid' : '' ?>">
                                    <input type="number" name="gestational_age" step="0.01" class="form-control" placeholder="Umur Kehamilan" value="<?= old('gestational_age') ? old('gestational_age') : $baby->gestational_age ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">minggu</span>
                                    </div>
                                </div>
                                <div class="invalid-feedback"><?= $validation->getError('gestational_age') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="birth_attendant">Penolong Persalinan</label>
                                <input type="text" name="birth_attendant" class="form-control <?= ($validation->hasError('birth_attendant')) ? 'is-invalid' : '' ?>" placeholder="Penolong Persalinan" value="<?= old('birth_attendant') ? old('birth_attendant') : $baby->birth_attendant?>">
                                <div class="invalid-feedback"><?= $validation->getError('birth_attendant') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="how">Cara Persalinan</label>
                                <select name="how" class="custom-select <?= ($validation->hasError('how')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('how') !== NULL){if(old('how') == '1'){echo 'selected'; }}else{if($baby->how == '1'){echo 'selected'; }} ?>>Normal</option>
                                    <option value="2" <?php if(old('how') !== NULL){if(old('how') == '2'){echo 'selected'; }}else{if($baby->how == '2'){echo 'selected'; }} ?>>Tindakan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('how') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition">Keadaan Ibu</label>
                                <select name="condition" class="custom-select <?= ($validation->hasError('condition')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('condition') !== NULL){if(old('condition') == '1'){echo 'selected'; }}else{if($baby->condition == '1'){echo 'selected'; }} ?>>Sehat</option>
                                    <option value="2" <?php if(old('condition') !== NULL){if(old('condition') == '2'){echo 'selected'; }}else{if($baby->condition == '2'){echo 'selected'; }} ?>>Pendarahan</option>
                                    <option value="3" <?php if(old('condition') !== NULL){if(old('condition') == '3'){echo 'selected'; }}else{if($baby->condition == '3'){echo 'selected'; }} ?>>Demam</option>
                                    <option value="4" <?php if(old('condition') !== NULL){if(old('condition') == '4'){echo 'selected'; }}else{if($baby->condition == '4'){echo 'selected'; }} ?>>Kejang</option>
                                    <option value="5" <?php if(old('condition') !== NULL){if(old('condition') == '5'){echo 'selected'; }}else{if($baby->condition == '5'){echo 'selected'; }} ?>>Lokhia berbau</option>
                                    <option value="6" <?php if(old('condition') !== NULL){if(old('condition') == '6'){echo 'selected'; }}else{if($baby->condition == '6'){echo 'selected'; }} ?>>Meninggal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('condition') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="add_info">Keterangan Tambahan</label>
                                <input type="text" name="add_info" class="form-control <?= ($validation->hasError('add_info')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Tambahan" value="<?= old('add_info') ? old('add_info') : $baby->add_info ?>">
                                <div class="invalid-feedback"><?= $validation->getError('add_info') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="child">Anak Ke</label>
                                <input type="number" name="child" class="form-control <?= ($validation->hasError('child')) ? 'is-invalid' : '' ?>" placeholder="Anak Ke" value="<?= old('child') ? old('child') : $baby->child ?>">
                                <div class="invalid-feedback"><?= $validation->getError('child') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight">Berat Lahir</label>
                                    <div class="input-group <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="weight" step="0.01" class="form-control" placeholder="Berat Lahir" value="<?= old('weight') ? old('weight') : $baby->weight ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height">Panjang Badan</label>
                                    <div class="input-group <?= ($validation->hasError('height')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="height" step="0.01" class="form-control" placeholder="Panjang Badan" value="<?= old('height') ? old('height') : $baby->height ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('height') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="head">Lingkar Kepala</label>
                                    <div class="input-group <?= ($validation->hasError('head')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="head" step="0.01" class="form-control" placeholder="Lingkar Kepala" value="<?= old('head') ? old('head') : $baby->head ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('head') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" class="custom-select <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('gender') !== NULL){if(old('gender') == '1'){echo 'selected'; }}else{if($baby->gender == '1'){echo 'selected'; }} ?>>Laki-laki</option>
                                    <option value="2" <?php if(old('gender') !== NULL){if(old('gender') == '2'){echo 'selected'; }}else{if($baby->gender == '2'){echo 'selected'; }} ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('gender') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition_1" style="display:block">Kondisi Bayi Saat Lahir</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_1" id="condition_1" class="custom-control-input" value="1" <?php if(old('condition_1') !== NULL){if(old('condition_1') == '1'){echo 'checked'; }}else{if($baby->condition_1 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_1" class="custom-control-label">Segera menangis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_2" id="condition_2" class="custom-control-input" value="1" <?php if(old('condition_2') !== NULL){if(old('condition_2') == '1'){echo 'checked'; }}else{if($baby->condition_2 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_2" class="custom-control-label">Menangis beberapa saat</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_3" id="condition_3" class="custom-control-input" value="1" <?php if(old('condition_3') !== NULL){if(old('condition_3') == '1'){echo 'checked'; }}else{if($baby->condition_3 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_3" class="custom-control-label">Tidak menangis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_4" id="condition_4" class="custom-control-input" value="1" <?php if(old('condition_4') !== NULL){if(old('condition_4') == '1'){echo 'checked'; }}else{if($baby->condition_4 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_4" class="custom-control-label">Seluruh tubuh kemerahan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_5" id="condition_5" class="custom-control-input" value="1" <?php if(old('condition_5') !== NULL){if(old('condition_5') == '1'){echo 'checked'; }}else{if($baby->condition_5 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_5" class="custom-control-label">Anggota gerak kebiruan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_6" id="condition_6" class="custom-control-input" value="1" <?php if(old('condition_6') !== NULL){if(old('condition_6') == '1'){echo 'checked'; }}else{if($baby->condition_6 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_6" class="custom-control-label">Seluruh tubuh biru</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_7" id="condition_7" class="custom-control-input" value="1" <?php if(old('condition_7') !== NULL){if(old('condition_7') == '1'){echo 'checked'; }}else{if($baby->condition_7 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_7" class="custom-control-label">Kelainan bawaan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_8" id="condition_8" class="custom-control-input" value="1" <?php if(old('condition_8') !== NULL){if(old('condition_8') == '1'){echo 'checked'; }}else{if($baby->condition_8 == '1'){echo 'checked'; }} ?>>
                                        <label for="condition_8" class="custom-control-label">Meninggal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="care_1" style="display:block">Asuhan Bayi Baru Lahir</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_1" id="care_1" class="custom-control-input" value="1" <?php if(old('care_1') !== NULL){if(old('care_1') == '1'){echo 'checked'; }}else{if($baby->care_1 == '1'){echo 'checked'; }} ?>>
                                        <label for="care_1" class="custom-control-label">Inisiasi menyusu dini (IMD) dalam 1 jam pertama kelahiran bayi</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_2" id="care_2" class="custom-control-input" value="1" <?php if(old('care_2') !== NULL){if(old('care_2') == '1'){echo 'checked'; }}else{if($baby->care_2 == '1'){echo 'checked'; }} ?>>
                                        <label for="care_2" class="custom-control-label">Suntikan vitamin k1</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_3" id="care_3" class="custom-control-input" value="1" <?php if(old('care_3') !== NULL){if(old('care_3') == '1'){echo 'checked'; }}else{if($baby->care_3 == '1'){echo 'checked'; }} ?>>
                                        <label for="care_3" class="custom-control-label">Salep mata antibiotik profilaksis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_4" id="care_4" class="custom-control-input" value="1" <?php if(old('care_4') !== NULL){if(old('care_4') == '1'){echo 'checked'; }}else{if($baby->care_4 == '1'){echo 'checked'; }} ?>>
                                        <label for="care_4" class="custom-control-label">Imunisasi Hepatitis B</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_info2">Keterangan Tambahan</label>
                                <input type="text" name="add_info2" class="form-control <?= ($validation->hasError('add_info2')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Tambahan" value="<?= old('add_info2') ? old('add_info2') : $baby->add_info2 ?>">
                                <div class="invalid-feedback"><?= $validation->getError('add_info2') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="temp">Suhu</label>
                                <input type="number" name="temp" step="0.01" class="form-control <?= ($validation->hasError('temp')) ? 'is-invalid' : '' ?>" placeholder="Suhu" value="<?= old('temp') ? old('temp') : $baby->temp ?>">
                                <div class="invalid-feedback"><?= $validation->getError('temp') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="ikterik">Ikterik</label>
                                    <select name="ikterik" class="custom-select <?= ($validation->hasError('ikterik')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('ikterik') !== NULL){if(old('ikterik') == '1'){echo 'selected'; }}else{if($baby->ikterik == '1'){echo 'selected'; }} ?>>Ya</option>
                                        <option value="2" <?php if(old('ikterik') !== NULL){if(old('ikterik') == '2'){echo 'selected'; }}else{if($baby->ikterik == '2'){echo 'selected'; }} ?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('ikterik') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="navel">Pusar</label>
                                    <select name="navel" class="custom-select <?= ($validation->hasError('navel')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('navel') !== NULL){if(old('navel') == '1'){echo 'selected'; }}else{if($baby->navel == '1'){echo 'selected'; }} ?>>Puput</option>
                                        <option value="2" <?php if(old('navel') !== NULL){if(old('navel') == '2'){echo 'selected'; }}else{if($baby->navel == '2'){echo 'selected'; }} ?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('navel') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feed">Menyusui</label>
                                    <select name="feed" class="custom-select <?= ($validation->hasError('feed')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('feed') !== NULL){if(old('feed') == '1'){echo 'selected'; }}else{if($baby->feed == '1'){echo 'selected'; }} ?>>ASI</option>
                                        <option value="2" <?php if(old('feed') !== NULL){if(old('feed') == '2'){echo 'selected'; }}else{if($baby->feed == '2'){echo 'selected'; }} ?>>ASI & Sufor</option>
                                        <option value="3" <?php if(old('feed') !== NULL){if(old('feed') == '3'){echo 'selected'; }}else{if($baby->feed == '3'){echo 'selected'; }} ?>>Sufor</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('feed') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ? old('complaint') : $baby->complaint ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Therapy</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Therapy" value="<?= old('therapy') ? old('therapy') : $baby->therapy ?>">
                                <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="Harga" value="<?= old('price') ? old('price') : $baby->price ?>">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="examiner">Nama Pemeriksa</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="Nama Pemeriksa" value="<?= old('examiner') ? old('examiner') : $baby->examiner ?>">
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