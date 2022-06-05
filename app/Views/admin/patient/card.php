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
        <h1><b>KARTU BEROBAT</b></h1>
    </div>

    <table style="width:80%;margin-left:10%;font-family:arial;" cellspacing="5">
        <tbody>
            <tr>
                <td width="200">NO. REGISTRASI</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->id ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->name ?></td>
            </tr>
            <tr>
                <td>TEMPAT, TANGGAL LAHIR</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey">
                    <?php
                        $tgl = date("d",strtotime($patient->date_of_birth));
                        $bln = date("m",strtotime($patient->date_of_birth));
                        $thn = date("Y",strtotime($patient->date_of_birth));

                        if($bln == "01") {
                            $bln = "Januari";
                        } elseif($bln == "02") {
                            $bln = "Februari";
                        } elseif($bln == "03") {
                            $bln = "Maret";
                        } elseif($bln == "04") {
                            $bln = "April";
                        } elseif($bln == "05") {
                            $bln = "Mei";
                        } elseif($bln == "06") {
                            $bln = "Juni";
                        } elseif($bln == "07") {
                            $bln = "Juli";
                        } elseif($bln == "08") {
                            $bln = "Agustus";
                        } elseif($bln == "09") {
                            $bln = "September";
                        } elseif($bln == "10") {
                            $bln = "Oktober";
                        } elseif($bln == "11") {
                            $bln = "November";
                        } elseif($bln == "12") {
                            $bln = "Desember";
                        }

                        echo $patient->place_of_birth.", ".$tgl." ".$bln." ".$thn;
                    ?>
                </td>
            </tr>
            <tr>
                <td>UMUR</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->age." Tahun" ?></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->address ?></td>
            </tr>
            <tr>
                <td>KEPALA KELUARGA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->head_of_family ?></td>
            </tr>
            <tr>
                <td>NO. KARTU KELUARGA</td>
                <td style="text-align:center"> : </td>
                <td style="border-bottom:1px dotted grey"><?= $patient->number_family_card ?></td>
            </tr>
        </tbody>
    </table>

    <div style="text-align:center;border:1px solid grey;margin-top:10px;">
        <table style="width:100%;font-family:arial;">
            <tbody>
                <tr>
                    <td><h3>PERHATIAN :</h3></td>
                    <td>
                        <h3>
                            - KARTU INI TIDAK BOLEH HILANG
                            <br>
                            - SETIAP BEROBAT HARUS DIBAWA
                        </h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>