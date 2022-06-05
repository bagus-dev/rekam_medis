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
                        <h4><i class="fas fa-file-medical"></i> Tambah Data</h4>
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
                        
                        <form action="<?= base_url('admin/baby_at_birth/save') ?>" method="post">
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
                                <label for="husband_name">Nama Suami</label>
                                <input type="text" name="husband_name" class="form-control <?= ($validation->hasError('husband_name')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband_name') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('husband_name') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal dan Jam Persalinan</label>
                                <input type="text" name="datetime" id="datetime" class="form-control datetimepicker-input <?= ($validation->hasError('datetime')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#datetime" placeholder="Tanggal dan Jam Persalinan" value="<?= old('datetime') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('datetime') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="gestational_age">Umur Kehamilan</label>
                                <div class="input-group <?= ($validation->hasError('gestational_age')) ? 'is-invalid' : '' ?>">
                                    <input type="number" name="gestational_age" step="0.01" class="form-control" placeholder="Umur Kehamilan" value="<?= old('gestational_age') ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">minggu</span>
                                    </div>
                                </div>
                                <div class="invalid-feedback"><?= $validation->getError('gestational_age') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="birth_attendant">Penolong Persalinan</label>
                                <input type="text" name="birth_attendant" class="form-control <?= ($validation->hasError('birth_attendant')) ? 'is-invalid' : '' ?>" placeholder="Penolong Persalinan" value="<?= old('birth_attendant') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('birth_attendant') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="how">Cara Persalinan</label>
                                <select name="how" class="custom-select <?= ($validation->hasError('how')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('how') == '1') ? 'selected' : '' ?>>Normal</option>
                                    <option value="2" <?= (old('how') == '2') ? 'selected' : '' ?>>Tindakan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('how') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition">Keadaan Ibu</label>
                                <select name="condition" class="custom-select <?= ($validation->hasError('condition')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('how') == '1') ? 'selected' : '' ?>>Sehat</option>
                                    <option value="2" <?= (old('how') == '2') ? 'selected' : '' ?>>Pendarahan</option>
                                    <option value="3" <?= (old('how') == '3') ? 'selected' : '' ?>>Demam</option>
                                    <option value="4" <?= (old('how') == '4') ? 'selected' : '' ?>>Kejang</option>
                                    <option value="5" <?= (old('how') == '5') ? 'selected' : '' ?>>Lokhia berbau</option>
                                    <option value="6" <?= (old('how') == '6') ? 'selected' : '' ?>>Meninggal</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('condition') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="add_info">Keterangan Tambahan</label>
                                <input type="text" name="add_info" class="form-control <?= ($validation->hasError('add_info')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Tambahan" value="<?= old('add_info') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('add_info') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="child">Anak Ke</label>
                                <input type="number" name="child" class="form-control <?= ($validation->hasError('child')) ? 'is-invalid' : '' ?>" placeholder="Anak Ke" value="<?= old('child') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('child') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight">Berat Lahir</label>
                                    <div class="input-group <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="weight" step="0.01" class="form-control" placeholder="Berat Lahir" value="<?= old('weight') ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">gram</span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height">Panjang Badan</label>
                                    <div class="input-group <?= ($validation->hasError('height')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="height" step="0.01" class="form-control" placeholder="Panjang Badan" value="<?= old('height') ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('height') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="head">Lingkar Kepala</label>
                                    <div class="input-group <?= ($validation->hasError('head')) ? 'is-invalid' : '' ?>">
                                        <input type="number" name="head" step="0.01" class="form-control" placeholder="Lingkar Kepala" value="<?= old('head') ?>">
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
                                    <option value="1" <?= (old('gender') == '1') ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="2" <?= (old('gender') == '2') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('gender') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition_1" style="display:block">Kondisi Bayi Saat Lahir</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_1" id="condition_1" class="custom-control-input" value="1" <?= (old('condition_1') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_1" class="custom-control-label">Segera menangis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_2" id="condition_2" class="custom-control-input" value="1" <?= (old('condition_2') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_2" class="custom-control-label">Menangis beberapa saat</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_3" id="condition_3" class="custom-control-input" value="1" <?= (old('condition_3') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_3" class="custom-control-label">Tidak menangis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_4" id="condition_4" class="custom-control-input" value="1" <?= (old('condition_4') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_4" class="custom-control-label">Seluruh tubuh kemerahan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_5" id="condition_5" class="custom-control-input" value="1" <?= (old('condition_5') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_5" class="custom-control-label">Anggota gerak kebiruan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_6" id="condition_6" class="custom-control-input" value="1" <?= (old('condition_6') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_6" class="custom-control-label">Seluruh tubuh biru</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_7" id="condition_7" class="custom-control-input" value="1" <?= (old('condition_7') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_7" class="custom-control-label">Kelainan bawaan</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="condition_8" id="condition_8" class="custom-control-input" value="1" <?= (old('condition_8') == '1') ? 'checked' : '' ?>>
                                        <label for="condition_8" class="custom-control-label">Meninggal</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="care_1" style="display:block">Asuhan Bayi Baru Lahir</label>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_1" id="care_1" class="custom-control-input" value="1" <?= (old('care_1') == '1') ? 'checked' : '' ?>>
                                        <label for="care_1" class="custom-control-label">Inisiasi menyusu dini (IMD) dalam 1 jam pertama kelahiran bayi</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_2" id="care_2" class="custom-control-input" value="1" <?= (old('care_2') == '1') ? 'checked' : '' ?>>
                                        <label for="care_2" class="custom-control-label">Suntikan vitamin k1</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_3" id="care_3" class="custom-control-input" value="1" <?= (old('care_3') == '1') ? 'checked' : '' ?>>
                                        <label for="care_3" class="custom-control-label">Salep mata antibiotik profilaksis</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="care_4" id="care_4" class="custom-control-input" value="1" <?= (old('care_4') == '1') ? 'checked' : '' ?>>
                                        <label for="care_4" class="custom-control-label">Imunisasi Hepatitis B</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="add_info2">Keterangan Tambahan</label>
                                <input type="text" name="add_info2" class="form-control <?= ($validation->hasError('add_info2')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Tambahan" value="<?= old('add_info2') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('add_info2') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="temp">Suhu</label>
                                <input type="number" name="temp" step="0.01" class="form-control <?= ($validation->hasError('temp')) ? 'is-invalid' : '' ?>" placeholder="Suhu" value="<?= old('temp') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('temp') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="ikterik">Ikterik</label>
                                    <select name="ikterik" class="custom-select <?= ($validation->hasError('ikterik')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('ikterik') == '1') ? 'selected' : '' ?>>Ya</option>
                                        <option value="2" <?= (old('ikterik') == '2') ? 'selected' : '' ?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('ikterik') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="navel">Pusar</label>
                                    <select name="navel" class="custom-select <?= ($validation->hasError('navel')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('navel') == '1') ? 'selected' : '' ?>>Puput</option>
                                        <option value="2" <?= (old('navel') == '2') ? 'selected' : '' ?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('navel') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="feed">Menyusui</label>
                                    <select name="feed" class="custom-select <?= ($validation->hasError('feed')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('feed') == '1') ? 'selected' : '' ?>>ASI</option>
                                        <option value="2" <?= (old('feed') == '2') ? 'selected' : '' ?>>ASI & Sufor</option>
                                        <option value="3" <?= (old('feed') == '3') ? 'selected' : '' ?>>Sufor</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('feed') ?></div>
                                </div>
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