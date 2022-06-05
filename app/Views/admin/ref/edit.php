<?= $this->extend('admin/template/index') ?>

<?= $this->section('content') ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Rujukan</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4><i class="fas fa-hospital-alt"></i> Edit Data</h4>
                        <a href="<?= base_url('admin/reference'); ?>" class="btn bg-warning text-white py-1"><i class="fas fa-arrow-left circle-icon text-warning"></i> &nbsp;Kembali</a>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/reference/update') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $ref->id ?>">

                            <div class="form-group">
                                <label for="patient_id">Nama Pasien</label>
                                <input type="text" class="form-control" value="<?= $ref->name ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="husband">Suami</label>
                                <input type="text" name="husband" class="form-control <?= ($validation->hasError('husband')) ? 'is-invalid' : '' ?>" placeholder="Suami" value="<?= old('husband') ? old('husband') : $ref->husband ?>">
                                <div class="invalid-feedback"><?= $validation->getError('husband') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="datetime">Tanggal dan Jam</label>
                                <input type="text" name="datetime" id="datetime" class="form-control datetimepicker-input <?= ($validation->hasError('datetime')) ? 'is-invalid' : '' ?>" data-toggle="datetimepicker" data-target="#datetime" placeholder="Tanggal dan Jam" value="<?= old('datetime') ? old('datetime') : date('d/m/Y H.i',strtotime($ref->datetime)) ?>">
                                <div class="invalid-feedback"><?= $validation->getError('datetime') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="ref_to">Dirujuk Ke</label>
                                <input type="text" name="ref_to" class="form-control <?= ($validation->hasError('ref_to')) ? 'is-invalid' : '' ?>" placeholder="Dirujuk Ke" value="<?= old('ref_to') ? old('ref_to') : $ref->ref_to ?>">
                                <div class="invalid-feedback"><?= $validation->getError('ref_to') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="cause">Sebab Dirujuk</label>
                                <input type="text" name="cause" class="form-control <?= ($validation->hasError('cause')) ? 'is-invalid' : '' ?>" placeholder="Sebab Dirujuk" value="<?= old('cause') ? old('cause') : $ref->cause ?>">
                                <div class="invalid-feedback"><?= $validation->getError('cause') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="diagnose">Diagnosa Sementara</label>
                                <input type="text" name="diagnose" class="form-control <?= ($validation->hasError('diagnose')) ? 'is-invalid' : '' ?>" placeholder="Diagnosa Sementara" value="<?= old('diagnose') ? old('diagnose') : $ref->diagnose ?>">
                                <div class="invalid-feedback"><?= $validation->getError('diagnose') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="act">Tindakan Sementara</label>
                                <input type="text" name="act" class="form-control <?= ($validation->hasError('act')) ? 'is-invalid' : '' ?>" placeholder="Tindakan Sementara" value="<?= old('act') ? old('act') : $ref->act ?>">
                                <div class="invalid-feedback"><?= $validation->getError('act') ?></div>
                            </div>
                            <div class="form-group">
                                <label for="who">Yang Merujuk</label>
                                <input type="text" name="who" class="form-control <?= ($validation->hasError('who')) ? 'is-invalid' : '' ?>" placeholder="Yang Merujuk" value="<?= old('who') ? old('who') : $ref->who ?>">
                                <div class="invalid-feedback"><?= $validation->getError('who') ?></div>
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