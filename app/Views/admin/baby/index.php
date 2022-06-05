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
                    <div class="card-header">
                        <h4><i class="fas fa-file-medical"></i> Bayi Saat Lahir</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('admin/baby_at_birth/add') ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    
                        <div class="border mt-4 p-2 p-md-3" style="border-radius:5px">
                            <table class="table table-striped dt-responsive nowrap w-100" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Registrasi</th>
                                        <th>Nama Ibu</th>
                                        <th>Umur</th>
                                        <th>Nama Suami</th>
                                        <th>Alamat</th>
                                        <th>Tanggal dan Jam Persalinan</th>
                                        <th>Umur Kehamilan</th>
                                        <th>Penolong Persalinan</th>
                                        <th>Cara Persalinan</th>
                                        <th>Keadaan Ibu</th>
                                        <th>Keterangan Tambahan</th>
                                        <th>Anak Ke</th>
                                        <th>Berat Lahir</th>
                                        <th>Panjang Badan</th>
                                        <th>Lingkar Kepala</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Kondisi Saat Bayi Lahir</th>
                                        <th>Asuhan Bayi Baru Lahir</th>
                                        <th>Keterangan Tambahan</th>
                                        <th>Suhu</th>
                                        <th>Ikterik</th>
                                        <th>Pusar</th>
                                        <th>Menyusui</th>
                                        <th>Keluhan</th>
                                        <th>Therapy</th>
                                        <th>Harga</th>
                                        <th>Nama Pemeriksa</th>
                                        <th>Data Dimasukkan Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        foreach($babies as $b) {
                                    ?>
                                    <tr>
                                        <td><?= $no++."." ?></td>
                                        <td><?= $b->pid ?></td>
                                        <td><?= $b->name ?></td>
                                        <td><?= $b->age ?></td>
                                        <td><?= $b->husband_name ?></td>
                                        <td><?= $b->address ?></td>
                                        <td><?= date('d/m/Y H:i',strtotime($b->datetime)) ?></td>
                                        <td><?= $b->gestational_age." minggu" ?></td>
                                        <td><?= $b->birth_attendant ?></td>
                                        <td>
                                            <?php
                                                if($b->how == '1'){
                                                    echo 'Normal';
                                                } else {
                                                    echo 'Tindakan';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($b->condition == '1') {
                                                    echo 'Sehat';
                                                } elseif($b->condition == '2') {
                                                    echo 'Pendarahan';
                                                } elseif($b->condition == '3') {
                                                    echo 'Demam';
                                                } elseif($b->condition == '4') {
                                                    echo 'Kejang';
                                                } elseif($b->condition == '5') {
                                                    echo 'Lokhia berbau';
                                                } elseif($b->condition == '6') {
                                                    echo 'Meninggal';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $b->add_info ?></td>
                                        <td><?= $b->child ?></td>
                                        <td><?= $b->weight." gram" ?></td>
                                        <td><?= $b->height." cm" ?></td>
                                        <td><?= $b->head." cm" ?></td>
                                        <td>
                                            <?php
                                                if($b->gender == '1') {
                                                    echo 'Laki-laki';
                                                } else {
                                                    echo 'Perempuan';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($b->condition_1 == '1') {
                                                    echo 'Segera menangis';

                                                    if($b->condition_2 == '1' OR $b->condition_3 == '1' OR $b->condition_4 == '1' OR $b->condition_5 == '1' OR $b->condition_6 == '1' OR $b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_2 == '1') {
                                                    echo 'Menangis beberapa saat';

                                                    if($b->condition_3 == '1' OR $b->condition_4 == '1' OR $b->condition_5 == '1' OR $b->condition_6 == '1' OR $b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_3 == '1') {
                                                    echo 'Tidak menangis';

                                                    if($b->condition_4 == '1' OR $b->condition_5 == '1' OR $b->condition_6 == '1' OR $b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_4 == '1') {
                                                    echo 'Seluruh tubuh kemerahan';

                                                    if($b->condition_5 == '1' OR $b->condition_6 == '1' OR $b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_5 == '1') {
                                                    echo 'Anggota gerak kebiruan';

                                                    if($b->condition_6 == '1' OR $b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_6 == '1') {
                                                    echo 'Seluruh tubuh biru';

                                                    if($b->condition_7 == '1' OR $b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_7 == '1') {
                                                    echo 'Kelainan bawaan';

                                                    if($b->condition_8 == '1') {
                                                        echo ", ";
                                                    }
                                                }

                                                if($b->condition_8 == '1') {
                                                    echo 'Meninggal';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($b->care_1 == '1') {
                                                    echo 'Inisiasi menyusu dini (IMD) dalam 1 jam pertama kelahiran bayi';

                                                    if($b->care_2 == '1' OR $b->care_3 == '1' OR $b->care_4 == '1') {
                                                        echo ', ';
                                                    }
                                                }

                                                if($b->care_2 == '1') {
                                                    echo 'Suntikan vitamin k1';

                                                    if($b->care_3 == '1' OR $b->care_4 == '1') {
                                                        echo ', ';
                                                    }
                                                }

                                                if($b->care_3 == '1') {
                                                    echo 'Salep mata antibiotik profilaksis';

                                                    if($b->care_4 == '1') {
                                                        echo ', ';
                                                    }
                                                }

                                                if($b->care_4 == '1') {
                                                    echo 'Imunisasi Hepatitis B';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $b->add_info2 ?></td>
                                        <td><?= $b->temp ?></td>
                                        <td>
                                            <?php
                                                if($b->ikterik == '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($b->navel == '1') {
                                                    echo 'Puput';
                                                } else {
                                                    echo 'Tidak';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($b->feed == '1') {
                                                    echo 'ASI';
                                                } elseif($b->feed == '2') {
                                                    echo 'ASI & Sufor';
                                                } elseif($b->feed == '3') {
                                                    echo 'Sufor';
                                                }
                                            ?>
                                        </td>
                                        <td><?= $b->complaint ?></td>
                                        <td><?= $b->therapy ?></td>
                                        <td><?= "Rp. ".$b->price ?></td>
                                        <td><?= $b->examiner ?></td>
                                        <td><?= date('d/m/Y H:i:s',strtotime($b->created_at)) ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('admin/baby_at_birth/edit/'.$b->id) ?>" class="btn btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/baby_at_birth/delete/'.$b->id) ?>" class="btn btn-danger" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>