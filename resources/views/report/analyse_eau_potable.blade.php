<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head bordered>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title trspan="authPortal"></title>
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/preloader.css') }}">
    <script src="{{ asset('assets/js/jquery.preloader.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="https://auth.sso.elephant-vert.com/static/common/favicon.ico" rel="icon" type="image/vnd.microsoft.icon"
        sizes="16x16 32x32 48x48 64x64 128x128">
    <link href="https://auth.sso.elephant-vert.com/static/common/favicon.ico" rel="shortcut icon"
        type="image/vnd.microsoft.icon" sizes="16x16 32x32 48x48 64x64 128x128">
</head bordered>

<body style="text-align: center;margin:0 auto">
    <style>
        table {
            border-collapse: collapse;
        }


        .head {
            text-align: left;
            background-color: #b5feb4 !important;
        }

        h4::before {
            content: "*";
            color: red
        }

        tr,
        td {
            margin: 0 !important;
            padding: 4px 10px !important;

        }

        .th,
        .col-md-3 {
            text-align: center;
            border: 1px solid black;
        }

        .bordered {
            padding: 2px 5px;
            border: 1px solid black;
        }

    </style>

    @php use App\Custom\Archivos; @endphp
    <table border="0">
        <tr style="height: 50px">
            <td><img src="{{ Archivos::imagenABase64(public_path('img\LacqLogo.jpg')) }}" width="160px" height="50px">
            </td>
            <td>
                <h5 style="color:green;text-align:center; font-size:14px;">RAPPORT D'ANALYSE PHYSICO-CHIMIQUE D'EAU
                    </br>N° EAUVEG100001 </h5>
            </td>
            <td style="text-align:right;"><img src="{{ Archivos::imagenABase64(public_path('img\semac.png')) }}"
                    width="90px" height="50px"></td>
        </tr>
        <tr>
            <td><label style="font-size:9px;margin:0;padding:0;">Laboratoire d'Analyses et Contrôle<br> Qualité ELEPHANT
                    VERT <br>MAROC S.A. </label></td>
            <td></td>
            <td style="text-align:right;">
                <h6 style="color:brown;font-size:10px;margin:0;padding:0;">N° MCI/CE AL 93/2018</h6>
            </td>
        </tr>
        <tr>
            <td><label style="color:green;font-size:13px;">LAB03F62-Vb</label></td>
            <td></td>
            <td></td>
        </tr>
    </table>









    <table style="width:100%;font-size:11px;margin-top:">

        <tr>
            <th class="head bordered">Client :</th>
            <td class="col-md-3 bordered">{{ $client_info->exploiteur }}</td>
            <th class=" head bordered">Dossier suivi par :</th>
            <td class="col-md-3 bordered"></td>
        </tr>

        <tr>
            <th class="head bordered">N°CIN :</th>
            <td class="col-md-3 bordered">{{ $client_info->cin_rc }}</td>
            <th class="head bordered">Référence de l'échantillon :</th>
            <td class="col-md-3 bordered"></td>
        </tr>

        <tr>
            <th class="head bordered">Adresse :</th>
            <td class="col-md-3 bordered"></td>
            <th class="head bordered">Date de prélèvement :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_prelevement }}</td>
        </tr>

        <tr>
            <th class="head bordered">Référence client :</th>
            <td class="col-md-3 bordered"></td>
            <th class="head bordered">Date de réception :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_reception }}</td>
        </tr>

        <tr>
            <th class="head bordered">Nature déchantillon :</th>
            <td class="col-md-3 bordered"></td>
            <th class="head bordered">Date d'analyse :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_edition }}</td>
        </tr>

        <tr>
            <th class="head bordered">Température à la réception :</th>
            <td class="col-md-3 bordered">{{ $commande_info->temperature }}</td>
            <th class="head bordered">Date d'édition :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_edition }}</td>
        </tr>

        <tr>
            <th class="head bordered">Coordonnées GPS :</th>
            <td class="col-md-3 bordered">{{ $commande_info->gps_1 }}</td>
            <th class="head bordered">Organisme :</th>
            <td class="col-md-3 bordered">{{ $client_info->organisme }}</td>
        </tr>

        <tr>
            <th class="head bordered">Lieu d'analyse :</th>
            <td class="col-md-3 bordered">{{ $commande_info->lieu }}</td>
            <th class="head bordered">Quantité:</th>
            <td class="col-md-3 bordered"></td>
        </tr>
    </table>




</body>

</html>
