<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Partus</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-heartbeat"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/parturition'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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

                        <form action="<?= base_url('admin/parturition/save') ?>" method="post">
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="weight">Berat Badan</label>
                                    <input type="number" name="weight" class="form-control <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>" placeholder="Berat Badan" value="<?= old('weight') ?>" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="height">Tinggi Badan</label>
                                    <input type="number" name="height" class="form-control <?= ($validation->hasError('height')) ? 'is-invalid' : '' ?>" placeholder="Tinggi Badan" value="<?= old('height') ?>" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('height') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_day">Hari Pertama Haid Terakhir</label>
                                    <input type="text" name="first_day" id="first_day" class="form-control datetimepicker-input <?= ($validation->hasError('first_day')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#first_day" placeholder="Hari Pertama Haid Terakhir" value="<?= old('first_day') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('first_day') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="estimated_day">Hari Taksiran Persalinan</label>
                                    <input type="text" name="estimated_day" id="estimated_day" class="form-control datetimepicker-input <?= ($validation->hasError('estimated_day')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#estimated_day" placeholder="Hari Taksiran Persalinan" value="<?= old('estimated_day') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('estimated_day') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date">Tanggal dan Jam</label>
                                <input type="text" name="date" id="date" class="form-control datetimepicker-input <?= ($validation->hasError('date')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#date" placeholder="Tanggal dan Jam" value="<?= old('date') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('date') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Golongan Darah</label>
                                <select name="blood_group" class="custom-select <?= ($validation->hasError('blood_group')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Golongan Darah</option>
                                    <option value="1" <?= (old('blood_group') == '1') ? 'selected' : '' ?>>A</option>
                                    <option value="2" <?= (old('blood_group') == '2') ? 'selected' : '' ?>>B</option>
                                    <option value="3" <?= (old('blood_group') == '3') ? 'selected' : '' ?>>AB</option>
                                    <option value="4" <?= (old('blood_group') == '4') ? 'selected' : '' ?>>O</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('blood_group') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="contraceptive_use">Penggunaan Kontrasepsi Sebelum Hamil</label>
                                <input type="text" name="contraceptive_use" class="form-control <?= ($validation->hasError('contraceptive_use')) ? 'is-invalid' : '' ?>" placeholder="Penggunaan Kontrasepsi Sebelum Hamil" value="<?= old('contraceptive_use') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('contraceptive_use') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="disease_history">Riwayat Penyakit yang Diderita Ibu</label>
                                    <input type="text" name="disease_history" class="form-control <?= ($validation->hasError('disease_history')) ? 'is-invalid' : '' ?>" placeholder="Riwayat Penyakit yang Diderita Ibu" value="<?= old('disease_history') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('disease_history') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="allergy_history">Riwayat Alergi</label>
                                    <input type="text" name="allergy_history" class="form-control <?= ($validation->hasError('allergy_history')) ? 'is-invalid' : '' ?>" placeholder="Riwayat Alergi" value="<?= old('allergy_history') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('allergy_history') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="immunization">Status Imunisasi Tetanus Terakhir</label>
                                <input type="text" name="immunization" class="form-control <?= ($validation->hasError('immunization')) ? 'is-invalid' : '' ?>" placeholder="Status Imunisasi Tetanus Terakhir" value="<?= old('immunization') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('allergy_history') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="g">GPA</label>
                                    <div class="input-group <?= ($validation->hasError('g')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">G</span>
                                        </div>
                                        <input type="text" name="g" class="form-control <?= ($validation->hasError('g')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('g') ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('g') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="p" style="visibility:hidden">a</label>
                                    <div class="input-group <?= ($validation->hasError('p')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">P</span>
                                        </div>
                                        <input type="text" name="p" class="form-control <?= ($validation->hasError('p')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('p') ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('p') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="a" style="visibility:hidden">a</label>
                                    <div class="input-group <?= ($validation->hasError('a')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">A</span>
                                        </div>
                                        <input type="text" name="a" class="form-control <?= ($validation->hasError('a')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('a') ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('a') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="obstetric_p">Riwayat Obstetri</label>
                                    <div class="input-group <?= ($validation->hasError('obstetric_p')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">P</span>
                                        </div>
                                        <input type="number" min="1" max="10" name="obstetric_p" class="form-control <?= ($validation->hasError('obstetric_p')) ? 'is-invalid' : '' ?>" placeholder="1 - 10" value="<?= old('obstetric_p') ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('obstetric_p') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="obstetric_a" style="visibility:hidden">a</label>
                                    <div class="input-group <?= ($validation->hasError('obstetric_a')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">A</span>
                                        </div>
                                        <input type="number" min="1" max="10" name="obstetric_a" class="form-control <?= ($validation->hasError('obstetric_a')) ? 'is-invalid' : '' ?>" placeholder="1 - 10" value="<?= old('obstetric_a') ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('obstetric_a') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pregnancy">Kehamilan Ke-</label>
                                    <input type="number" name="pregnancy" class="form-control <?= ($validation->hasError('pregnancy')) ? 'is-invalid' : '' ?>" placeholder="Kehamilan Ke-" value="<?= old('pregnancy') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('pregnancy') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="year">Tahun</label>
                                    <input type="text" name="year" id="year" class="form-control datetimepicker-input <?= ($validation->hasError('year')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#year" placeholder="Tahun" value="<?= old('year') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('year') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="born">Lahir Hidup/Mati/Abortus</label>
                                    <select name="born" class="custom-select <?= ($validation->hasError('born')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih</option>
                                        <option value="1" <?= (old('born') == '1') ? 'selected' : '' ?>>Hidup</option>
                                        <option value="2" <?= (old('born') == '2') ? 'selected' : '' ?>>Mati</option>
                                        <option value="3" <?= (old('born') == '3') ? 'selected' : '' ?>>Abortus</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('born') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="born_app">Lahir Aterm/Pre Term/Post Term</label>
                                    <select name="born_app" class="custom-select <?= ($validation->hasError('born_app')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih</option>
                                        <option value="1" <?= (old('born_app') == '1') ? 'selected' : '' ?>>Aterm</option>
                                        <option value="2" <?= (old('born_app') == '2') ? 'selected' : '' ?>>Pre Term</option>
                                        <option value="3" <?= (old('born_app') == '3') ? 'selected' : '' ?>>Post Term</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('born_app') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="born_sso">Lahir Spontan/SC/Lainnya</label>
                                    <select name="born_sso" class="custom-select <?= ($validation->hasError('born_sso')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih</option>
                                        <option value="1" <?= (old('born_sso') == '1') ? 'selected' : '' ?>>Spontan</option>
                                        <option value="2" <?= (old('born_sso') == '2') ? 'selected' : '' ?>>SC</option>
                                        <option value="3" <?= (old('born_sso') == '3') ? 'selected' : '' ?>>Lainnya</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('born_sso') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight_born">Berat Lahir</label>
                                    <input type="number" name="weight_born" class="form-control <?= ($validation->hasError('weight_born')) ? 'is-invalid' : '' ?>" placeholder="Berat Lahir" value="<?= old('weight_born') ?>" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('weight_born') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="height_born">Panjang Lahir</label>
                                    <input type="number" name="height_born" class="form-control <?= ($validation->hasError('height_born')) ? 'is-invalid' : '' ?>" placeholder="Panjang Lahir" value="<?= old('height_born') ?>" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('height_born') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="head_circ">Lingkar Kepala</label>
                                    <input type="number" name="head_circ" class="form-control <?= ($validation->hasError('head_circ')) ? 'is-invalid' : '' ?>" placeholder="Lingkar Kepala" value="<?= old('head_circ') ?>" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('head_circ') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthing_place">Tempat Bersalin, Nakes</label>
                                <input type="text" name="birthing_place" class="form-control <?= ($validation->hasError('birthing_place')) ? 'is-invalid' : '' ?>" placeholder="Tempat Bersalin, Nakes" value="<?= old('birthing_place') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('birthing_place') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="condition">Kondisi Anak Saat Ini</label>
                                <input type="text" name="condition" class="form-control <?= ($validation->hasError('condition')) ? 'is-invalid' : '' ?>" placeholder="Kondisi Anak Saat Ini" value="<?= old('condition') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('condition') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="child">Anak</label>
                                <input type="text" name="child" class="form-control <?= ($validation->hasError('child')) ? 'is-invalid' : '' ?>" placeholder="Anak" value="<?= old('child') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('child') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" class="custom-select <?= ($validation->hasError('gender')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Jenis Kelamin</option>
                                    <option value="1" <?= (old('gender') == '1') ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="2" <?= (old('gender') == '2') ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('gender') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor HP</label>
                                <input type="number" name="phone" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : '' ?>" placeholder="Nomor HP" value="<?= old('phone') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('phone') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="complication">Komplikasi Kehamilan/Persalinan</label>
                                <select name="complication" id="complication" class="custom-select <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('complication') == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= (old('complication') == '2') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('complication') ?></div>
                            </div>
                            <div class="form-group" id="form-desc" style="display:none">
                                <label for="description">Keterangan Komplikasi</label>
                                <input type="text" name="description" class="form-control <?= ($validation->hasError('description')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Komplikasi" value="<?= old('description') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('description') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="refer">Rujuk</label>
                                <select name="refer" id="refer" class="custom-select <?= ($validation->hasError('refer')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('refer') == '1') ? 'selected' : '' ?>>Ya</option>
                                    <option value="2" <?= (old('refer') == '2') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('refer') ?></div>
                            </div>
                            <div class="form-group" id="form-refer" style="display:none">
                                <label for="desc_refer">Keterangan Rujuk</label>
                                <input type="text" name="desc_refer" class="form-control <?= ($validation->hasError('desc_refer')) ? 'is-invalid' : '' ?>" placeholder="Keterangan Rujuk" value="<?= old('desc_refer') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('desc_refer') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="hecting">Hecting</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="hecting" id="hectingCheck" class="custom-control-input" value="1" <?= (old('hecting') == '1') ? 'checked' : '' ?>>
                                    <label for="hectingCheck" class="custom-control-label">Check</label>
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