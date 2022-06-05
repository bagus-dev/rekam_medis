<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?> &mdash; Rekam Medis Klinik PMB Bidan Hj. Ade F. Isma</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/ibi.png" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
</head>

<body style="background: #e2e8f0">

    <?= $this->renderSection('content'); ?>

    <!-- General JS Scripts -->
    <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/popper.js"></script>
    <script src="<?= base_url(); ?>/assets/js/tooltip.js"></script>
    <script src="<?= base_url(); ?>/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/moment.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/assets/js/custom.js"></script>
    <?php if($title == "Login") { ?>
    <script>
        $("#btn-login").click(function() {
            var login = document.getElementById("login");
            var password = document.getElementById("password");

            if(login.value.length >= 1 && password.value.length >= 1) {
                $("#btn-login").html('<i class="fas fa-spinner fa-spin" id="btnload"></i> Loading...');
                $("#btn-login").attr("disabled","disabled");
                $("#form-login").submit();
            }
        });
    </script>
    <?php } ?>
    <?php if($title == "Lupa Password") { ?>
    <script>
        $("#btn-forgot").click(function() {
            $("#btn-forgot").html('<i class="fas fa-spinner fa-spin" id="btnload"></i> Loading...');
            $("#btn-forgot").attr("disabled","disabled");
            $("#form-forgot").submit();
        });
    </script>
    <?php } ?>
    <?php if($title == "Ubah Password") { ?>
    <script>
        $("#btn-reset").click(function() {
            $("#btn-reset").html('<i class="fas fa-spinner fa-spin" id="btnload"></i> Loading...');
            $("#btn-reset").attr("disabled","disabled");
            $("#form-reset").submit();
        });
    </script>
    <?php } ?>
</body>
</html>