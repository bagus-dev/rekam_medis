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
                        <h4><i class="fas fa-hospital"></i> Edit Data</h4>
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
                        
                        <form action="<?= base_url('admin/anc-usg/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $id ?>">

                            <div class="form-group">
                                <label for="patient_id">Pasien</label>
                                <input type="text" name="patient_id" class="form-control" value="<?= $anc->pid." - ".$anc->name ?>" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="husband">Nama Suami</label>
                                    <input type="text" name="husband" class="form-control <?= ($validation->hasError('husband')) ? 'is-invalid' : '' ?>" placeholder="Nama Suami" value="<?= old('husband') ? old('husband') : $anc->husband ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('husband') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mother">Nama Ibu Kandung</label>
                                    <input type="text" name="mother" class="form-control <?= ($validation->hasError('mother')) ? 'is-invalid' : '' ?>" placeholder="Nama Ibu Kandung" value="<?= old('mother') ? old('mother') : $anc->mother ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('mother') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" placeholder="Alamat" value="<?= old('address') ? old('address') : $anc->address ?>">
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="education">Pendidikan</label>
                                    <input type="text" name="education" class="form-control <?= ($validation->hasError('education')) ? 'is-invalid' : '' ?>" placeholder="Pendidikan" value="<?= old('education') ? old('education') : $anc->education ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('education') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="job">Pekerjaan</label>
                                    <input type="text" name="job" class="form-control <?= ($validation->hasError('job')) ? 'is-invalid' : '' ?>" placeholder="Pekerjaan" value="<?= old('job') ? old('job') : $anc->job ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('job') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nik">Nomor NIK</label>
                                    <input type="text" name="nik" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>" placeholder="Nomor NIK" value="<?= old('nik') ? old('nik') : $anc->nik ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nik') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="visit">Kunjungan</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="visit" id="visit1" class="custom-control-input" value="l" <?php if(old('visit') !== NULL){if(old('visit') == 'l'){echo 'checked'; }}else{if($anc->visit == 'l'){echo 'checked'; }} ?>>
                                    <label for="visit1" class="custom-control-label">Lama</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" name="visit" id="visit2" class="custom-control-input" value="b" <?php if(old('visit') !== NULL){if(old('visit') == 'b'){echo 'checked'; }}else{if($anc->visit == 'b'){echo 'checked'; }} ?>>
                                    <label for="visit2" class="custom-control-label">Baru</label>
                                </div>
                                <div class="invalid-feedback"><?= $validation->getError('visit') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="revisit">Kunjungan Ulang</label>
                                <input type="text" name="revisit" id="revisit" class="form-control datetimepicker-input <?= ($validation->hasError('revisit')) ? 'is-invalid' : '' ?>" placeholder="Kunjungan Ulang" data-toggle="datetimepicker" data-target="#revisit" value="<?= old('revisit') ? old('revisit') : date('d/m/Y',strtotime($anc->revisit)) ?>">
                                <div class="invalid-feedback"><?= $validation->getError('revisit') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="g">GPA</label>
                                    <div class="input-group <?= ($validation->hasError('g')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">G</span>
                                        </div>
                                        <input type="text" name="g" class="form-control <?= ($validation->hasError('g')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('g') ? old('g') : $anc->g ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('g') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="p" style="visibility:hidden">a</label>
                                    <div class="input-group <?= ($validation->hasError('p')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">P</span>
                                        </div>
                                        <input type="text" name="p" class="form-control <?= ($validation->hasError('p')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('p') ? old('p') : $anc->p ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('p') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="a" style="visibility:hidden">a</label>
                                    <div class="input-group <?= ($validation->hasError('a')) ? 'is-invalid' : '' ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">A</span>
                                        </div>
                                        <input type="text" name="a" class="form-control <?= ($validation->hasError('a')) ? 'is-invalid' : '' ?>" placeholder=". . . . ." value="<?= old('a') ? old('a') : $anc->a ?>">
                                    </div>
                                    <div class="invalid-feedback"><?= $validation->getError('a') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="hpht">HPHT</label>
                                    <input type="text" name="hpht" id="hpht" class="form-control datetimepicker-input <?= ($validation->hasError('hpht')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#hpht" placeholder="HPHT" placeholder="HPHT" value="<?= old('hpht') ? old('hpht') : date('d/m/Y',strtotime($anc->hpht)) ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('hpht') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <laebl for="tp">TP</label>
                                    <input type="text" name="tp" class="form-control <?= ($validation->hasError('tp')) ? 'is-invalid' : '' ?>" placeholder="TP" value="<?= old('tp') ? old('tp') : $anc->tp ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tp') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gestational_age">Usia Kehamilan</label>
                                    <input type="number" name="gestational_age" class="form-control <?= ($validation->hasError('gestational_age')) ? 'is-invalid' : '' ?>" placeholder="Usia Kehamilan" value="<?= old('gestational_age') ? old('gestational_age') : $anc->gestational_age ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('gestational_age') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="td">TD</label>
                                    <input type="text" name="td" class="form-control <?= ($validation->hasError('td')) ? 'is-invalid' : '' ?>" placeholder="TD" value="<?= old('td') ? old('td') : $anc->td ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('td') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bb">BB</label>
                                    <input type="number" name="bb" class="form-control <?= ($validation->hasError('bb')) ? 'is-invalid' : '' ?>" placeholder="BB" value="<?= old('bb') ? old('bb') : $anc->bb ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('bb') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tb">TB</label>
                                    <input type="number" name="tb" class="form-control <?= ($validation->hasError('tb')) ? 'is-invalid' : '' ?>" placeholder="TB" value="<?= old('tb') ? old('tb') : $anc->tb ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tb') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lila">LILA</label>
                                    <input type="text" name="lila" class="form-control <?= ($validation->hasError('lila')) ? 'is-invalid' : '' ?>" placeholder="LILA" value="<?= old('lila') ? old('lila') : $anc->lila ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('lila') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tfu">TFU</label>
                                <input type="text" name="tfu" class="form-control <?= ($validation->hasError('tfu')) ? 'is-invalid' : '' ?>" placeholder="TFU" value="<?= old('tfu') ? old('tfu') : $anc->tfu ?>">
                                <div class="invalid-feedback"><?= $validation->getError('tfu') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dii">DII</label>
                                    <input type="number" name="dii" class="form-control <?= ($validation->hasError('dii')) ? 'is-invalid' : '' ?>" placeholder="DII" value="<?= old('dii') ? old('dii') : $anc->dii ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('dii') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pres">PRES</label>
                                    <input type="text" name="pres" class="form-control <?= ($validation->hasError('pres')) ? 'is-invalid' : '' ?>" placeholder="PRES" value="<?= old('pres') ? old('pres') : $anc->pres ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('pres') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tt">TT</label>
                                    <input type="number" name="tt" min="1" max="5" class="form-control <?= ($validation->hasError('tt')) ? 'is-invalid' : '' ?>" placeholder="TT" value="<?= old('tt') ? old('tt') : $anc->tt ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('tt') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fe">FE</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkFe" name="fe" value="1" <?php if(old('fe') == '1'){echo 'checked'; }else{if($anc->fe == '1'){echo 'checked'; }} ?>>
                                        <label class="custom-control-label" for="checkFe">Check</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fetal_position">LETAK JANIN</label>
                                    <input type="text" name="fetal_position" class="form-control <?= ($validation->hasError('fetal_position')) ? 'is-invalid' : '' ?>" placeholder="LETAK JANIN" value="<?= old('fetal_position') ? old('fetal_position') : $anc->fetal_position ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('fetal_position') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fetal_heart_rate">DETAK JANTUNG JANIN</label>
                                    <input type="text" name="fetal_heart_rate" class="form-control <?= ($validation->hasError('fetal_heart_rate')) ? 'is-invalid' : '' ?>" placeholder="DETAK JANTUNG JANIN" value="<?= old('fetal_heart_rate') ? old('fetal_heart_rate') : $anc->fetal_heart_rate ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('fetal_heart_rate') ?></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="immunization">IMUNISASI</label>
                                    <input type="text" name="immunization" class="form-control <?= ($validation->hasError('immunization')) ? 'is-invalid' : '' ?>" placeholder="IMUNISASI" value="<?= old('immunization') ? old('immunization') : $anc->immunization ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('immunization') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="blood_boost_tablets">TABLET TAMBAH DARAH</label>
                                    <input type="text" name="blood_boost_tablets" class="form-control <?= ($validation->hasError('blood_boost_tablets')) ? 'is-invalid' : '' ?>" placeholder="TABLET TAMBAH DARAH" value="<?= old('blood_boost_tablets') ? old('blood_boost_tablets') : $anc->blood_boost_tablets ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('blood_boost_tablets') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lab">LAB</label>
                                <input type="text" name="lab" class="form-control <?= ($validation->hasError('lab')) ? 'is-invalid' : '' ?>" placeholder="LAB" value="<?= old('lab') ? old('lab') : $anc->lab ?>">
                                <div class="invalid-feedback"><?= $validation->getError('lab') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="blood">GOLDAR</label>
                                    <select name="blood" class="custom-select <?= ($validation->hasError('blood')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('blood') !== NULL){if(old('blood') == '1'){echo 'selected'; }}else{if($anc->blood == '1'){echo 'selected'; }} ?>>A</option>
                                        <option value="2" <?php if(old('blood') !== NULL){if(old('blood') == '2'){echo 'selected'; }}else{if($anc->blood == '2'){echo 'selected'; }} ?>>B</option>
                                        <option value="3" <?php if(old('blood') !== NULL){if(old('blood') == '3'){echo 'selected'; }}else{if($anc->blood == '3'){echo 'selected'; }} ?>>AB</option>
                                        <option value="4" <?php if(old('blood') !== NULL){if(old('blood') == '4'){echo 'selected'; }}else{if($anc->blood == '4'){echo 'selected'; }} ?>>O</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('blood') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hb">HB</label>
                                    <input type="number" name="hb" min="1" max="15" class="form-control <?= ($validation->hasError('hb')) ? 'is-invalid' : '' ?>" placeholder="HB" value="<?= old('hb') ? old('hb') : $anc->hb ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('hb') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hiv">HIV</label>
                                    <select name="hiv" class="custom-select <?= ($validation->hasError('hiv')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('hiv') !== NULL){if(old('hiv') == '1'){echo 'selected'; }}else{if($anc->hiv == '1'){echo 'selected'; }} ?>>Reaktif</option>
                                        <option value="2" <?php if(old('hiv') !== NULL){if(old('hiv') == '2'){echo 'selected'; }}else{if($anc->hiv == '2'){echo 'selected'; }} ?>>Non Reaktif</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('hiv') ?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hbsag">HBSAG</label>
                                    <select name="hbsag" class="custom-select <?= ($validation->hasError('hbsag')) ? 'is-invalid' : '' ?>">
                                        <option value="0">Pilih Opsi</option>
                                        <option value="1" <?php if(old('hbsag') !== NULL){if(old('hbsag') == '1'){echo 'selected'; }}else{if($anc->hbsag == '1'){echo 'selected'; }} ?>>Reaktif</option>
                                        <option value="2" <?php if(old('hbsag') !== NULL){if(old('hbsag') == '2'){echo 'selected'; }}else{if($anc->hbsag == '2'){echo 'selected'; }} ?>>Non Reaktif</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('hbsag') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sifilis">SIFILIS</label>
                                <select name="sifilis" class="custom-select <?= ($validation->hasError('sifilis')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('sifilis') !== NULL){if(old('sifilis') == '1'){echo 'selected'; }}else{if($anc->sifilis == '1'){echo 'selected'; }} ?>>Reaktif</option>
                                    <option value="2" <?php if(old('sifilis') !== NULL){if(old('sifilis') == '2'){echo 'selected'; }}else{if($anc->sifilis == '2'){echo 'selected'; }} ?>>Non Reaktif</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('sifilis') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="urine">URINE PROTEIN</label>
                                <select name="urine" class="custom-select <?= ($validation->hasError('urine')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Opsi</option>
                                    <option value="1" <?php if(old('urine') !== NULL){if(old('urine') == '1'){echo 'selected'; }}else{if($anc->urine == '1'){echo 'selected'; }} ?>>-</option>
                                    <option value="2" <?php if(old('urine') !== NULL){if(old('urine') == '2'){echo 'selected'; }}else{if($anc->urine == '2'){echo 'selected'; }} ?>>+1</option>
                                    <option value="3" <?php if(old('urine') !== NULL){if(old('urine') == '3'){echo 'selected'; }}else{if($anc->urine == '3'){echo 'selected'; }} ?>>+2</option>
                                    <option value="4" <?php if(old('urine') !== NULL){if(old('urine') == '4'){echo 'selected'; }}else{if($anc->urine == '4'){echo 'selected'; }} ?>>+3</option>
                                </select>
                                <div class="invalid-feedback"><?= $validation->getError('urine') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="glukosa">GLUKOSA</label>
                                <input type="number" name="glukosa" class="form-control <?= ($validation->hasError('glukosa')) ? 'is-invalid' : '' ?>" placeholder="GLUKOSA" value="<?= old('glukosa') ? old('glukosa') : $anc->glukosa ?>">
                                <div class="invalid-feedback"><?= $validation->getError('glukosa') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="ref">RUJUKAN</label>
                                <input type="text" name="ref" class="form-control <?= ($validation->hasError('ref')) ? 'is-invalid' : '' ?>" placeholder="RUJUKAN" value="<?= old('ref') ? old('ref') : $anc->ref ?>">
                                <div class="invalid-feedback"><?= $validation->getError('ref') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="diagnose">DIAGNOSA</label>
                                <input type="text" name="diagnose" class="form-control <?= ($validation->hasError('diagnose')) ? 'is-invalid' : '' ?>" placeholder="DIAGNOSA" value="<?= old('diagnose') ? old('diagnose') : $anc->diagnose ?>">
                                <div class="invalid-feedback"><?= $validation->getError('diagnose') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="complaint">KELUHAN</label>
                                    <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="KELUHAN" value="<?= old('complaint') ? old('complaint') : $anc->complaint ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="therapy">THERAPY</label>
                                    <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="THERAPY" value="<?= old('therapy') ? old('therapy') : $anc->therapy ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Pasien</label>
                                <select name="status" class="custom-select <?= ($validation->hasError('status')) ? 'is-invalid' : '' ?>">
                                    <option value="0">Pilih Status</option>
                                    <option value="1" <?php if(old('status') !== NULL){if(old('status') == '1'){echo 'selected'; }}else{if($anc->status == '1'){echo 'selected'; }} ?>>PBI</option>
                                    <option value="2" <?php if(old('status') !== NULL){if(old('status') == '2'){echo 'selected'; }}else{if($anc->status == '2'){echo 'selected'; }} ?>>Non PBI</option>
                                    <option value="3" <?php if(old('status') !== NULL){if(old('status') == '3'){echo 'selected'; }}else{if($anc->status == '3'){echo 'selected'; }} ?>>Umum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="governance">TATA LAKSANA</label>
                                <input type="text" name="governance" class="form-control <?= ($validation->hasError('governance')) ? 'is-invalid' : '' ?>" placeholder="TATA LAKSANA" value="<?= old('governance') ? old('governance') : $anc->governance ?>">
                                <div class="invalid-feedback"><?= $validation->getError('governance') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="counseling">KONSELING</label>
                                <input type="text" name="counseling" class="form-control <?= ($validation->hasError('counseling')) ? 'is-invalid' : '' ?>" placeholder="KONSELING" value="<?= old('counseling') ? old('counseling') : $anc->counseling ?>">
                                <div class="invalid-feedback"><?= $validation->getError('counseling') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="service_place">TEMPAT PELAYANAN</label>
                                <input type="text" name="service_place" class="form-control <?= ($validation->hasError('service_place')) ? 'is-invalid' : '' ?>" placeholder="TEMPAT PELAYANAN" value="<?= old('service_place') ? old('service_place') : $anc->service_place ?>">
                                <div class="invalid-feedback"><?= $validation->getError('service_place') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">HARGA</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="HARGA" value="<?= old('price') ? old('price') : $anc->price ?>">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="examiner">PETUGAS</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="PETUGAS" value="<?= old('examiner') ? old('examiner') : $anc->examiner ?>">
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