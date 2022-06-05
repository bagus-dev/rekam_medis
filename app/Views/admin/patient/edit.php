<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pasien</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-users"></i> Edit Data</h4>
                        <a href="<?= base_url('admin/patients'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/patients/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $patient->id ?>">

                            <div class="form-group">
                                <label for="name">Nama Pasien</label>
                                <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>" placeholder="Nama Pasien" value="<?= (old('name')) ? old('name') : $patient->name ?>">
                                <div class="invalid-feedback"><?= $validation->getError('name') ?></div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="place_of_birth">Tempat Lahir</label>
                                    <input type="text" name="place_of_birth" class="form-control <?= ($validation->hasError('place_of_birth')) ? 'is-invalid' : '' ?>" placeholder="Tempat Lahir" value="<?= (old('place_of_birth')) ? old('place_of_birth') : $patient->place_of_birth ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('place_of_birth') ?></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control datetimepicker-input <?= ($validation->hasError('date_of_birth')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#date_of_birth" placeholder="Tanggal Lahir" value="<?= (old('date_of_birth')) ? old('date_of_birth') : date('d/m/Y',strtotime($patient->date_of_birth)) ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('date_of_birth') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <textarea name="address" rows="3" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : '' ?>" placeholder="Alamat" style="height:auto"><?= (old('address')) ? old('address') : $patient->address ?></textarea>
                                <div class="invalid-feedback"><?= $validation->getError('address') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="age">Umur</label>
                                <input type="number" name="age" class="form-control <?= ($validation->hasError('age')) ? 'is-invalid' : '' ?>" placeholder="Umur" value="<?= (old('age')) ? old('age') : $patient->age ?>">
                                <div class="invalid-feedback"><?= $validation->getError('age') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="head_of_family">Kepala Keluarga</label>
                                <input type="text" name="head_of_family" class="form-control <?= ($validation->hasError('head_of_family')) ? 'is-invalid' : '' ?>" placeholder="Kepala Keluarga" value="<?= (old('head_of_family')) ? old('head_of_family') : $patient->head_of_family ?>">
                                <div class="invalid-feedback"><?= $validation->getError('head_of_family') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="number_family_card">Nomor Kartu Keluarga</label>
                                <input type="number" name="number_family_card" class="form-control <?= ($validation->hasError('number_family_card')) ? 'is-invalid' : '' ?>" placeholder="Nomor Kartu Keluarga" value="<?= (old('number_family_card')) ? old('number_family_card') : $patient->number_family_card ?>">
                                <div class="invalid-feedback"><?= $validation->getError('number_family_card') ?></div>
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