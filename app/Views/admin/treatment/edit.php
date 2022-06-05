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
                        <h4><i class="fas fa-user-injured"></i> Edit Data</h4>
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
                        <form action="<?= base_url('admin/treatments/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $treatment->id ?>">

                            <div class="form-group">
                                <label for="patient_id">Nama Pasien</label>
                                <input type="text" class="form-control" value="<?= $treatment->patient_id." - ".$treatment->name ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="complaint">Keluhan</label>
                                <input type="text" name="complaint" class="form-control <?= ($validation->hasError('complaint')) ? 'is-invalid' : '' ?>" placeholder="Keluhan" value="<?= old('complaint') ? old('complaint') : $treatment->complaint ?>">
                                <div class="invalid-feedback"><?= $validation->getError('complaint') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="supporting_investigation">Pemeriksaan Penunjang</label>
                                <input type="text" name="supporting_investigation" id="" class="form-control <?= ($validation->hasError('supporting_investigation')) ? 'is-invalid' : '' ?>" placeholder="Pemeriksaan Penunjang" value="<?= old('supporting_investigation') ? old('supporting_investigation') : $treatment->supporting_investigation ?>">
                                <div class="invalid-feedback"><?= $validation->getError('supporting_investigation') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="weight">Berat Badan</label>
                                    <input type="number" name="weight" class="form-control <?= ($validation->hasError('weight')) ? 'is-invalid' : '' ?>" placeholder="Berat Badan" value="<?= old('weight') ? old('weight') : $treatment->weight ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('weight') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="body_temperature">Suhu Badan</label>
                                    <input type="number" name="body_temperature" class="form-control <?= ($validation->hasError('body_temperature')) ? 'is-invalid' : '' ?>" placeholder="Suhu Badan" value="<?= old('body_temperature') ? old('body_temperature') : $treatment->body_temperature ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('body_temperature') ?></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="tension">Tensi</label>
                                    <input type="number" name="tension" class="form-control <?= ($validation->hasError('tension')) ? 'is-invalid' : '' ?>" placeholder="Tensi" value="<?= old('tension') ? old('tension') : $treatment->tension ?>" min="0" step="0.01">
                                    <div class="invalid-feedback"><?= $validation->getError('tension') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="therapy">Therapy</label>
                                <input type="text" name="therapy" class="form-control <?= ($validation->hasError('therapy')) ? 'is-invalid' : '' ?>" placeholder="Therapy" value="<?= old('therapy') ? old('therapy') : $treatment->therapy ?>">
                                <div class="invalid-feedback"><?= $validation->getError('therapy') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : '' ?>" placeholder="Harga" value="<?= old('price') ? old('price') : $treatment->price ?>" min="0" step="0.01">
                                <div class="invalid-feedback"><?= $validation->getError('price') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <select name="code" id="select3" class="custom-select">
                                    <option></option>
                                    <option value="J06" <?php if(old('code') !== NULL){if(old('code') == 'J06'){echo 'selected'; }}else{if($treatment->code == 'J06'){echo 'selected'; }} ?>>J06 - ISPA</option>
                                    <option value="R50" <?php if(old('code') !== NULL){if(old('code') == 'R50'){echo 'selected'; }}else{if($treatment->code == 'R50'){echo 'selected'; }} ?>>R50 - FEBRIS</option>
                                    <option value="J00" <?php if(old('code') !== NULL){if(old('code') == 'J00'){echo 'selected'; }}else{if($treatment->code == 'J00'){echo 'selected'; }} ?>>J00 - CC/COMMOND COLD</option>
                                    <option value="A091" <?php if(old('code') !== NULL){if(old('code') == 'A091'){echo 'selected'; }}else{if($treatment->code == 'A091'){echo 'selected'; }} ?>>A091 - GEA</option>
                                    <option value="K29" <?php if(old('code') !== NULL){if(old('code') == 'K29'){echo 'selected'; }}else{if($treatment->code == 'K29'){echo 'selected'; }} ?>>K29 - GASTRITIS</option>
                                    <option value="I10" <?php if(old('code') !== NULL){if(old('code') == 'I10'){echo 'selected'; }}else{if($treatment->code == 'I10'){echo 'selected'; }} ?>>I10 - HIPERTENSI</option>
                                    <option value="E11" <?php if(old('code') !== NULL){if(old('code') == 'E11'){echo 'selected'; }}else{if($treatment->code == 'E11'){echo 'selected'; }} ?>>E11 - DM/DIABETES</option>
                                    <option value="L30" <?php if(old('code') !== NULL){if(old('code') == 'L30'){echo 'selected'; }}else{if($treatment->code == 'L30'){echo 'selected'; }} ?>>L30 - DERMATITIS</option>
                                    <option value="M13" <?php if(old('code') !== NULL){if(old('code') == 'M13'){echo 'selected'; }}else{if($treatment->code == 'M13'){echo 'selected'; }} ?>>M13 - ARTRITIS</option>
                                    <option value="J18" <?php if(old('code') !== NULL){if(old('code') == 'J18'){echo 'selected'; }}else{if($treatment->code == 'J18'){echo 'selected'; }} ?>>J18 - PNEUMONIA</option>
                                    <option value="R51" <?php if(old('code') !== NULL){if(old('code') == 'R51'){echo 'selected'; }}else{if($treatment->code == 'R51'){echo 'selected'; }} ?>>R51 - CHEPALGIA</option>
                                    <option value="K64" <?php if(old('code') !== NULL){if(old('code') == 'K64'){echo 'selected'; }}else{if($treatment->code == 'K64'){echo 'selected'; }} ?>>K64 - HEMOROID</option>
                                    <option value="H10" <?php if(old('code') !== NULL){if(old('code') == 'H10'){echo 'selected'; }}else{if($treatment->code == 'H10'){echo 'selected'; }} ?>>H10 - CONJUNGTIVITIS</option>
                                    <option value="L02" <?php if(old('code') !== NULL){if(old('code') == 'L02'){echo 'selected'; }}else{if($treatment->code == 'L02'){echo 'selected'; }} ?>>L02 - BISUL</option>
                                    <option value="F02" <?php if(old('code') !== NULL){if(old('code') == 'F02'){echo 'selected'; }}else{if($treatment->code == 'F02'){echo 'selected'; }} ?>>F02 - PHARYNGITIS</option>
                                    <option value="N39" <?php if(old('code') !== NULL){if(old('code') == 'N39'){echo 'selected'; }}else{if($treatment->code == 'N39'){echo 'selected'; }} ?>>N39 - ISK</option>
                                    <option value="J45" <?php if(old('code') !== NULL){if(old('code') == 'J45'){echo 'selected'; }}else{if($treatment->code == 'J45'){echo 'selected'; }} ?>>J45 - ASMA</option>
                                    <option value="H65" <?php if(old('code') !== NULL){if(old('code') == 'H65'){echo 'selected'; }}else{if($treatment->code == 'H65'){echo 'selected'; }} ?>>H65 - OTITIS/OMA</option>
                                    <option value="K04" <?php if(old('code') !== NULL){if(old('code') == 'K04'){echo 'selected'; }}else{if($treatment->code == 'K04'){echo 'selected'; }} ?>>K04 - GINGIVITIS</option>
                                    <option value="I02" <?php if(old('code') !== NULL){if(old('code') == 'I02'){echo 'selected'; }}else{if($treatment->code == 'I02'){echo 'selected'; }} ?>>I02 - ABSES</option>
                                    <option value="N61" <?php if(old('code') !== NULL){if(old('code') == 'N61'){echo 'selected'; }}else{if($treatment->code == 'N61'){echo 'selected'; }} ?>>N61 - MASTITIS</option>
                                    <option value="R11" <?php if(old('code') !== NULL){if(old('code') == 'R11'){echo 'selected'; }}else{if($treatment->code == 'R11'){echo 'selected'; }} ?>>R11 - VOMITUS</option>
                                    <option value="J35" <?php if(old('code') !== NULL){if(old('code') == 'J35'){echo 'selected'; }}else{if($treatment->code == 'J35'){echo 'selected'; }} ?>>J35 - TONSILLITIS</option>
                                    <option value="K12" <?php if(old('code') !== NULL){if(old('code') == 'K12'){echo 'selected'; }}else{if($treatment->code == 'K12'){echo 'selected'; }} ?>>K12 - STOMATITIS</option>
                                    <option value="H81" <?php if(old('code') !== NULL){if(old('code') == 'H81'){echo 'selected'; }}else{if($treatment->code == 'H81'){echo 'selected'; }} ?>>H81 - VERTIGO</option>
                                    <option value="N92" <?php if(old('code') !== NULL){if(old('code') == 'N92'){echo 'selected'; }}else{if($treatment->code == 'N92'){echo 'selected'; }} ?>>N92 - MENORRHAGIA</option>
                                    <option value="B01" <?php if(old('code') !== NULL){if(old('code') == 'B01'){echo 'selected'; }}else{if($treatment->code == 'B01'){echo 'selected'; }} ?>>B01 - VARICELLA</option>
                                    <option value="B00" <?php if(old('code') !== NULL){if(old('code') == 'B00'){echo 'selected'; }}else{if($treatment->code == 'B00'){echo 'selected'; }} ?>>B00 - HERPES</option>
                                    <option value="N89" <?php if(old('code') !== NULL){if(old('code') == 'N89'){echo 'selected'; }}else{if($treatment->code == 'N89'){echo 'selected'; }} ?>>N89 - FLOUR ALBUS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="examiner">Nama Pemeriksa</label>
                                <input type="text" name="examiner" class="form-control <?= ($validation->hasError('examiner')) ? 'is-invalid' : '' ?>" placeholder="Nama Pemeriksa" value="<?= old('examiner') ? old('examiner') : $treatment->examiner ?>">
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