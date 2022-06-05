<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengobatan</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-user-injured"></i> Tambah Data</h4>
                        <a href="<?= base_url('admin/treatments'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
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
                        <form action="<?= base_url('admin/treatments/save') ?>" method="post">
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
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="supporting_investigation">Pemeriksaan Penunjang</label>
                                <input type="text" name="supporting_investigation" id="" class="form-control <?= ($validation->hasError('supporting_investigation')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Penunjang" value="<?= old('supporting_investigation') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('supporting_investigation') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight">Berat Badan</label>
                                    <input type="number" name="weight" class="form-control <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>" placeholder="Berat Badan" value="<?= old('weight') ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="body_temperature">Suhu Badan</label>
                                    <input type="number" name="body_temperature" class="form-control <?= ($validation->hasError('body_temperature')) ? 'is-invalid' : '' ?>" placeholder="Suhu Badan" value="<?= old('body_temperature') ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('body_temperature') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tension">Tensi</label>
                                    <input type="number" name="tension" class="form-control <?= ($validation->hasError('tension')) ? 'is-invalid' : '' ?>" placeholder="Tensi" value="<?= old('tension') ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('tension') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Therapy</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Therapy" value="<?= old('therapy') ?>">
                                <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="Harga" value="<?= old('price') ?>" min="0" step="0.01">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <select name="code" id="select3" class="custom-select">
                                    <option></option>
                                    <option value="J06" <?= old('code') == 'J06' ? 'selected' : '' ?>>J06 - ISPA</option>
                                    <option value="R50" <?= old('code') == 'R50' ? 'selected' : '' ?>>R50 - FEBRIS</option>
                                    <option value="J00" <?= old('code') == 'J00' ? 'selected' : '' ?>>J00 - CC/COMMOND COLD</option>
                                    <option value="A091" <?= old('code') == 'A091' ? 'selected' : '' ?>>A091 - GEA</option>
                                    <option value="K29" <?= old('code') == 'K29' ? 'selected' : '' ?>>K29 - GASTRITIS</option>
                                    <option value="I10" <?= old('code') == 'I10' ? 'selected' : '' ?>>I10 - HIPERTENSI</option>
                                    <option value="E11" <?= old('code') == 'E11' ? 'selected' : '' ?>>E11 - DM/DIABETES</option>
                                    <option value="L30" <?= old('code') == 'L30' ? 'selected' : '' ?>>L30 - DERMATITIS</option>
                                    <option value="M13" <?= old('code') == 'M13' ? 'selected' : '' ?>>M13 - ARTRITIS</option>
                                    <option value="J18" <?= old('code') == 'J18' ? 'selected' : '' ?>>J18 - PNEUMONIA</option>
                                    <option value="R51" <?= old('code') == 'R51' ? 'selected' : '' ?>>R51 - CHEPALGIA</option>
                                    <option value="K64" <?= old('code') == 'K64' ? 'selected' : '' ?>>K64 - HEMOROID</option>
                                    <option value="H10" <?= old('code') == 'H10' ? 'selected' : '' ?>>H10 - CONJUNGTIVITIS</option>
                                    <option value="L02" <?= old('code') == 'L02' ? 'selected' : '' ?>>L02 - BISUL</option>
                                    <option value="F02" <?= old('code') == 'F02' ? 'selected' : '' ?>>F02 - PHARYNGITIS</option>
                                    <option value="N39" <?= old('code') == 'N39' ? 'selected' : '' ?>>N39 - ISK</option>
                                    <option value="J45" <?= old('code') == 'J45' ? 'selected' : '' ?>>J45 - ASMA</option>
                                    <option value="H65" <?= old('code') == 'H65' ? 'selected' : '' ?>>H65 - OTITIS/OMA</option>
                                    <option value="K04" <?= old('code') == 'K04' ? 'selected' : '' ?>>K04 - GINGIVITIS</option>
                                    <option value="I02" <?= old('code') == 'I02' ? 'selected' : '' ?>>I02 - ABSES</option>
                                    <option value="N61" <?= old('code') == 'N61' ? 'selected' : '' ?>>N61 - MASTITIS</option>
                                    <option value="R11" <?= old('code') == 'R11' ? 'selected' : '' ?>>R11 - VOMITUS</option>
                                    <option value="J35" <?= old('code') == 'J35' ? 'selected' : '' ?>>J35 - TONSILLITIS</option>
                                    <option value="K12" <?= old('code') == 'K12' ? 'selected' : '' ?>>K12 - STOMATITIS</option>
                                    <option value="H81" <?= old('code') == 'H81' ? 'selected' : '' ?>>H81 - VERTIGO</option>
                                    <option value="N92" <?= old('code') == 'N92' ? 'selected' : '' ?>>N92 - MENORRHAGIA</option>
                                    <option value="B01" <?= old('code') == 'B01' ? 'selected' : '' ?>>B01 - VARICELLA</option>
                                    <option value="B00" <?= old('code') == 'B00' ? 'selected' : '' ?>>B00 - HERPES</option>
                                    <option value="N89" <?= old('code') == 'N89' ? 'selected' : '' ?>>N89 - FLOUR ALBUS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="examiner">Nama Pemeriksa</label>
                                <input type="text" name="examiner" class="form-control" placeholder="Nama Pemeriksa" value="<?= old('examiner') ?>">
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