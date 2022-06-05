<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?> &mdash; Rekam Medis Klinik PMB Bidan Hj. Ade F. Isma</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/ibi.png" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/select2-bootstrap4.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap-switch.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/tempusdominus-bootstrap-4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fullcalendar/main.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">

    <!-- JQuery -->
    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
</head>
<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg bg-primary"></div>
            <nav class="navbar navbar-expand-lg main-navbar bg-primary">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                    <img src="/assets/img/ibi.png" alt="logo" width="70" style="height:auto">
                    <span class="text-white ml-1 font-weight-bold d-none d-md-block">Klinik PMB Bidan Hj. Ade F. Isma</span>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url().'/assets/img/avatar-1.png'; ?>" class="rounded-circle mr-1" id="pp-top">
                            <div class="d-sm-none d-lg-inline-block">Hai, <span id="top-fullname"><?= ucwords($profile->username); ?></span></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= base_url('logout'); ?>" style="cursor: pointer" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= base_url('admin/dashboard'); ?>">Rekam Medis</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= base_url('admin/dashboard'); ?>" class="bg-warning text-white" style="font-size:10pt;padding:5px;border-radius:3px;">Medis</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MAIN MENU</li>
                        <li class="<?= ($title == 'Dasbor') ? 'active' : ''; ?>">
                            <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
                                <i class="fas fa-tachometer-alt"></i> <span>Dasbor</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Data Pasien') ? 'active' : ''; ?>">
                            <a href="<?= base_url('admin/patients') ?>" class="nav-link">
                                <i class="fas fa-users"></i> <span>Data Pasien</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Pengobatan') ? 'active' : ''; ?>">
                            <a href="<?= base_url('admin/treatments') ?>" class="nav-link">
                                <i class="fas fa-user-injured"></i> <span>Pengobatan</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Keluarga Berencana') ? 'active' : ''; ?>">
                            <a href="<?= base_url('admin/family-planning') ?>" class="nav-link">
                                <i class="fas fa-child"></i> <span>Keluarga Berencana</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'ANC & USG') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/anc-usg') ?>" class="nav-link"><i class="fas fa-hospital"></i> <span>ANC & USG</span></a>
                        </li>
                        <li class="<?= ($title == 'Partus') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/parturition') ?>" class="nav-link">
                                <i class="fas fa-heartbeat"></i> <span>Partus</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Imunisasi') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/immunization') ?>" class="nav-link"><i class="fas fa-medkit"></i> <span>Imunisasi</span></a>
                        </li>
                        <li class="dropdown <?= ($title == 'Ibu Nifas' OR $title == 'Bayi Saat Lahir' OR $title == 'Rujukan') ? 'active' : '' ?>">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-stethoscope"></i> <span>Nifas</span></a>

                            <ul class="dropdown-menu">
                                <li class="<?= ($title == 'Ibu Nifas') ? 'active' : '' ?>">
                                    <a href="<?= base_url('admin/postpartum_mother') ?>" class="nav-link"><i class="fas fa-female"></i> Ibu Nifas</a>
                                </li>
                                <li class="<?= ($title == 'Bayi Saat Lahir') ? 'active' : '' ?>">
                                    <a href="<?= base_url('admin/baby_at_birth') ?>" class="nav-link"><i class="fas fa-file-medical"></i> Bayi Saat Lahir</a>
                                </li>
                                <li class="<?= ($title == 'Rujukan') ? 'active' : '' ?>">
                                    <a href="<?= base_url('admin/reference') ?>" class="nav-link"><i class="fas fa-hospital-alt"></i> Rujukan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?= ($title == 'Rapid') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/rapid') ?>" class="nav-link">
                                <i class="fas fa-notes-medical"></i> <span>Rapid</span>
                            </a>
                        </li>
                        <li class="<?= ($title == 'Laporan') ? 'active' : '' ?>">
                            <a href="<?= base_url('admin/report') ?>" class="nav-link">
                                <i class="fas fa-archive"></i> <span>Laporan</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <?= $this->renderSection('content'); ?>

            <footer class="main-footer bg-primary text-white">
                <div class="footer-left">
                    Hak Cipta &copy; 2021 <div class="bullet"></div> Klinik PMB Bidan Hj. Ade F. Isma
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>
    <script src="<?= base_url(); ?>/assets/css/select2/dist/js/select2.full.min.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap-switch.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/moment-with-locales.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/tempusdominus-bootstrap-4.js"></script>
    <script src="<?= base_url(); ?>/assets/js/fullcalendar/main.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/fullcalendar/locales-all.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <?php if($title == 'Data Pasien'){echo view('admin/scripts/patients.php'); } ?>
    <?php if($title == 'Pengobatan'){echo view('admin/scripts/treatments.php'); } ?>
    <?php if($title == 'Keluarga Berencana'){echo view('admin/scripts/family.php'); } ?>
    <?php if($title == 'ANC & USG'){echo view('admin/scripts/anc.php'); } ?>
    <?php if($title == 'Kesehatan Ibu Hamil'){echo view('admin/scripts/pwh.php'); } ?>
    <?php if($title == 'Riwayat Obstetri'){echo view('admin/scripts/obstetric.php'); } ?>
    <?php if($title == 'Imunisasi'){echo view('admin/scripts/immunization.php'); } ?>
    <?php if($title == 'Rapid'){echo view('admin/scripts/rapid.php'); } ?>
    <?php if($title == 'Partus'){echo view('admin/scripts/partus.php'); } ?>
    <?php if($title == 'Ibu Nifas'){echo view('admin/scripts/postmother.php'); } ?>
    <?php if($title == 'Bayi Saat Lahir'){echo view('admin/scripts/baby.php'); } ?>
    <?php if($title == 'Rujukan'){echo view('admin/scripts/ref.php'); } ?>
    <?php
        if($title == 'Laporan'){echo view('admin/scripts/report.php');
            if(isset($_GET['start'])) {
    ?>
    <script>
        var start = "<?= urlencode($_GET['start']) ?>";
        var end = "<?= urlencode($_GET['end']) ?>";
        var menu = "<?= urlencode($_GET['menu']) ?>";
    </script>
    <?php }} ?>
    <?php if($title !== "Dasbor") { ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            
            var base_url = "<?= base_url() ?>";
            
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: [
                    {extend: 'excel', className: 'btn btn-success', text: '<i class="fas fa-file-excel"></i> Excel'}
                ]
            });

            var table2 = $('#example3').DataTable({
                lengthChange: false,
                buttons: [
                    {
                        className: 'btn btn-success',
                        text: '<i class="fas fa-print"></i> Cetak',
                        action: function(e,dt,node,config) {
                            window.open(`${base_url}/admin/report/print?start=${start}&end=${end}&menu=${menu}`,'_blank');
                        }
                    }
                ]
            });
            
            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
            table2.buttons().container()
                .appendTo('#example3_wrapper .col-md-6:eq(0)');
        });
    </script>
    <?php } else { ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });
    </script>
    <?php } ?>
    <?php if (session()->getFlashdata('success')) { ?>
    <script>
        var message = "<?= session()->getFlashdata('success'); ?>";

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        })

        Toast.fire({
            icon: "success",
            title: message
        })
    </script>
    <?php } elseif(session()->getFlashdata('failed')) { ?>
    <script>
        var title = "<?= session()->getFlashdata('failed'); ?>";

        Swal.fire({
            icon: 'error',
            title: title,
            text: 'Cek kembali isian form...'
        });
    </script>
    <?php } ?>
</body>

</html>