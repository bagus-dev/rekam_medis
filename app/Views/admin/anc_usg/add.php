<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>ANC & USG</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-hospital"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/anc-usg'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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
                        
                        <form action="<?= base_url('admin/anc-usg/save') ?>" method="post">
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="husband">Nama Suami</label>
                                    <input type="text" name="husband" class="form-control <?= ($validation->hasError('husband')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('husband') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mother">Nama Ibu Kandung</label>
                                    <input type="text" name="mother" class="form-control <?= ($validation->hasError('mother')) ? 'is-invalid' : '' ?>" placeholder="Nama Ibu Kandung" value="<?= old('mother') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('mother') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" placeholder="Alamat" value="<?= old('address') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="education">Pendidikan</label>
                                    <input type="text" name="education" class="form-control <?= ($validation->hasError('education')) ? 'is-invalid' : '' ?>" placeholder="Pendidikan" value="<?= old('education') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('education') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="job">Pekerjaan</label>
                                    <input type="text" name="job" class="form-control <?= ($validation->hasError('job')) ? 'is-invalid' : '' ?>" placeholder="Pekerjaan" value="<?= old('job') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('job') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nik">Nomor NIK</label>
                                    <input type="text" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" placeholder="Nomor NIK" value="<?= old('nik') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nik') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="visit">Kunjungan</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="visit" id="visit1" class="custom-control-input" value="l" <?= (old('visit') == 'l') ? 'checked' : '' ?>>
                                    <label for="visit1" class="custom-control-label">Lama</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="visit" id="visit2" class="custom-control-input" value="b" <?= (old('visit') == 'b') ? 'checked' : '' ?>>
                                    <label for="visit2" class="custom-control-label">Baru</label>
                                </div>
                                <div class="invalid-feedback"><?= $validation->getError('visit') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="revisit">Kunjungan Ulang</label>
                                <input type="text" name="revisit" id="revisit" class="form-control datetimepicker-input <?= ($validation->hasError('revisit')) ? 'is-invalid' : '' ?>" placeholder="Kunjungan Ulang" data-toggle="datetimepicker" data-target="#revisit" value="<?= old('revisit') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('revisit') ?></div>
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
                                <div class="form-group col-md-4">
                                    <label for="hpht">HPHT</label>
                                    <input type="text" name="hpht" id="hpht" class="form-control datetimepicker-input <?= ($validation->hasError('hpht')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#hpht" placeholder="HPHT" value="<?= old('hpht') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('hpht') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tp">TP</label>
                                    <input type="text" name="tp" class="form-control <?= ($validation->hasError('tp')) ? 'is-invalid' : '' ?>" placeholder="TP" value="<?= old('tp') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tp') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gestational_age">Usia Kehamilan</label>
                                    <input type="number" name="gestational_age" class="form-control <?= ($validation->hasError('gestational_age')) ? 'is-invalid' : '' ?>" placeholder="Usia Kehamilan" value="<?= old('gestational_age') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('gestational_age') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="td">TD</label>
                                    <input type="text" name="td" class="form-control <?= ($validation->hasError('td')) ? 'is-invalid' : '' ?>" placeholder="TD" value="<?= old('td') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('td') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bb">BB</label>
                                    <input type="number" name="bb" class="form-control <?= ($validation->hasError('bb')) ? 'is-invalid' : '' ?>" placeholder="BB" value="<?= old('bb') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('bb') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tb">TB</label>
                                    <input type="number" name="tb" class="form-control <?= ($validation->hasError('tb')) ? 'is-invalid' : '' ?>" placeholder="TB" value="<?= old('tb') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tb') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lila">LILA</label>
                                    <input type="text" name="lila" class="form-control <?= ($validation->hasError('lila')) ? 'is-invalid' : '' ?>" placeholder="LILA" value="<?= old('lila') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('lila') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tfu">TFU</label>
                                <input type="text" name="tfu" class="form-control <?= ($validation->hasError('tfu')) ? 'is-invalid' : '' ?>" placeholder="TFU" value="<?= old('tfu') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tfu') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dii">DII</label>
                                    <input type="number" name="dii" class="form-control <?= ($validation->hasError('dii')) ? 'is-invalid' : '' ?>" placeholder="DII" value="<?= old('dii') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('dii') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pres">PRES</label>
                                    <input type="text" name="pres" class="form-control <?= ($validation->hasError('pres')) ? 'is-invalid' : '' ?>" placeholder="PRES" value="<?= old('pres') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('pres') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tt">TT</label>
                                    <input type="number" name="tt" min="1" max="5" class="form-control <?= ($validation->hasError('tt')) ? 'is-invalid' : '' ?>" placeholder="TT" value="<?= old('tt') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tt') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fe">FE</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkFe" name="fe" value="1" <?= (old('fe') == '1') ? 'checked' : '' ?>>
                                        <label class="custom-control-label" for="checkFe">Check</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fetal_position">LETAK JANIN</label>
                                    <input type="text" name="fetal_position" class="form-control <?= ($validation->hasError('fetal_position')) ? 'is-invalid' : '' ?>" placeholder="LETAK JANIN" value="<?= old('fetal_position') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('fetal_position') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fetal_heart_rate">DETAK JANTUNG JANIN</label>
                                    <input type="text" name="fetal_heart_rate" class="form-control <?= ($validation->hasError('fetal_heart_rate')) ? 'is-invalid' : '' ?>" placeholder="DETAK JANTUNG JANIN" value="<?= old('fetal_heart_rate') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('fetal_heart_rate') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="immunization">IMUNISASI</label>
                                    <input type="text" name="immunization" class="form-control <?= ($validation->hasError('immunization')) ? 'is-invalid' : '' ?>" placeholder="IMUNISASI" value="<?= old('immunization') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('immunization') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="blood_boost_tablets">TABLET TAMBAH DARAH</label>
                                    <input type="text" name="blood_boost_tablets" class="form-control <?= ($validation->hasError('blood_boost_tablets')) ? 'is-invalid' : '' ?>" placeholder="TABLET TAMBAH DARAH" value="<?= old('blood_boost_tablets') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('blood_boost_tablets') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lab">LAB</label>
                                <input type="text" name="lab" class="form-control <?= ($validation->hasError('lab')) ? 'is-invalid' : '' ?>" placeholder="LAB" value="<?= old('lab') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('lab') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="blood">GOLDAR</label>
                                    <select name="blood" class="custom-select <?= ($validation->hasError('blood')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('blood') == '1') ? 'selected' : '' ?>>A</option>
                                        <option value="2" <?= (old('blood') == '2') ? 'selected' : '' ?>>B</option>
                                        <option value="3" <?= (old('blood') == '3') ? 'selected' : '' ?>>AB</option>
                                        <option value="4" <?= (old('blood') == '4') ? 'selected' : '' ?>>O</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('blood') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hb">HB</label>
                                    <input type="number" name="hb" min="1" max="15" class="form-control <?= ($validation->hasError('hb')) ? 'is-invalid' : '' ?>" placeholder="HB" value="<?= old('hb') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('hb') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hiv">HIV</label>
                                    <select name="hiv" class="custom-select <?= ($validation->hasError('hiv')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('hiv') == '1') ? 'selected' : '' ?>>Reaktif</option>
                                        <option value="2" <?= (old('hiv') == '2') ? 'selected' : '' ?>>Non Reaktif</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('hiv') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hbsag">HBSAG</label>
                                    <select name="hbsag" class="custom-select <?= ($validation->hasError('hbsag')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?= (old('hbsag') == '1') ? 'selected' : '' ?>>Reaktif</option>
                                        <option value="2" <?= (old('hbsag') == '2') ? 'selected' : '' ?>>Non Reaktif</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('hbsag') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sifilis">SIFILIS</label>
                                <select name="sifilis" class="custom-select <?= ($validation->hasError('sifilis')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('sifilis') == '1') ? 'selected' : '' ?>>Reaktif</option>
                                    <option value="2" <?= (old('sifilis') == '2') ? 'selected' : '' ?>>Non Reaktif</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('sifilis') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="urine">URINE PROTEIN</label>
                                <select name="urine" class="custom-select <?= ($validation->hasError('urine')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?= (old('urine') == '1') ? 'selected' : '' ?>>-</option>
                                    <option value="2" <?= (old('urine') == '2') ? 'selected' : '' ?>>+1</option>
                                    <option value="3" <?= (old('urine') == '3') ? 'selected' : '' ?>>+2</option>
                                    <option value="4" <?= (old('urine') == '4') ? 'selected' : '' ?>>+3</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('urine') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="glukosa">GLUKOSA</label>
                                <input type="number" name="glukosa" class="form-control <?= ($validation->hasError('glukosa')) ? 'is-invalid' : '' ?>" placeholder="GLUKOSA" value="<?= old('glukosa') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('glukosa') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="ref">RUJUKAN</label>
                                <input type="text" name="ref" class="form-control <?= ($validation->hasError('ref')) ? 'is-invalid' : '' ?>" placeholder="RUJUKAN" value="<?= old('ref') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('ref') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="diagnose">DIAGNOSA</label>
                                <input type="text" name="diagnose" class="form-control <?= ($validation->hasError('diagnose')) ? 'is-invalid' : '' ?>" placeholder="DIAGNOSA" value="<?= old('diagnose') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('diagnose') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="complaint">KELUHAN</label>
                                    <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="KELUHAN" value="<?= old('complaint') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="therapy">THERAPY</label>
                                    <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="THERAPY" value="<?= old('therapy') ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Pasien</label>
                                <select name="status" class="custom-select <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Status</option>
                                    <option value="1" <?= (old('status') == '1') ? 'selected' : '' ?>>PBI</option>
                                    <option value="2" <?= (old('status') == '2') ? 'selected' : '' ?>>Non PBI</option>
                                    <option value="3" <?= (old('status') == '3') ? 'selected' : '' ?>>Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="governance">TATA LAKSANA</label>
                                <input type="text" name="governance" class="form-control <?= ($validation->hasError('governance')) ? 'is-invalid' : '' ?>" placeholder="TATA LAKSANA" value="<?= old('governance') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('governance') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="counseling">KONSELING</label>
                                <input type="text" name="counseling" class="form-control <?= ($validation->hasError('counseling')) ? 'is-invalid' : '' ?>" placeholder="KONSELING" value="<?= old('counseling') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('counseling') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="service_place">TEMPAT PELAYANAN</label>
                                <input type="text" name="service_place" class="form-control <?= ($validation->hasError('service_place')) ? 'is-invalid' : '' ?>" placeholder="TEMPAT PELAYANAN" value="<?= old('service_place') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('service_place') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">HARGA</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="HARGA" value="<?= old('price') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="examiner">PETUGAS</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="PETUGAS" value="<?= old('examiner') ?>">
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