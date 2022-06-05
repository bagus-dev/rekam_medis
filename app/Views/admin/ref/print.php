<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Klinik PMB Bidan Hj. Ade F. Isma</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/ibi.png" type="image/x-icon">
    <style>
        @media print {
            body {
                width: 21cm;
                height: 29.7cm;
            }
        }
        .logo {
            position: relative;
            width: 31%;
            margin-top: 20px;
            margin-right: 2%;
            float: left;
        }
        .logo img {
            position: absolute;
            right: 0px;
        }
        .address {
            width:66%;
            float: left;
        }
        .clearfix {
            clear: both;
        }
    </style>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.close()
            }, 1);
        }
    </script>
</head>
<body>
    <div style="border:1px solid grey;">
        <div class="logo">
            <img src="/assets/img/ibi.png" alt="LOGO" width="90" style="height:auto">
        </div>
        <div class="address">
            <h3>
                KLINIK PMB BIDAN HJ. ADE F. ISMA
            </h3>
            <p>
                Lingkungan Mushola As-Salam RT 01/04, Kramatwatu,
                <br>
                Kec. Kramatwatu, Serang, Banten 42151, Indonesia
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div style="text-align:center;background-color:grey;color:white;margin-top:-10px;font-family:arial;">
        <h1><b>RUJUKAN</b></h1>
    </div>

    <table style="width:80%;margin-left:10%;font-family:arial;" cellspacing="5">
        <tbody>
            <tr>
                <td width="200">NOMOR REGISTRASI</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->pid ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->name ?></td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->age ?></td>
            </tr>
            <tr>
                <td>SUAMI</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->husband ?></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->address ?></td>
            </tr>
            <tr>
                <td>TANGGAL DAN JAM</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= date('d/m/Y H:i:s',strtotime($ref->datetime)) ?></td>
            </tr>
            <tr>
                <td>DIRUJUK KE</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->ref_to ?></td>
            </tr>
            <tr>
                <td>SEBAB DIRUJUK</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->ref_to ?></td>
            </tr>
            <tr>
                <td>DIAGNOSA SEMENTARA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->diagnose ?></td>
            </tr>
            <tr>
                <td>TINDAKAN SEMENTARA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->act ?></td>
            </tr>
            <tr>
                <td>YANG MERUJUK</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $ref->who ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>