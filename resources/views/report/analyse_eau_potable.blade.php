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






    <table class="table tab table-bordered table-sm">
        <thead>

            <tr class="head">
                <th class="th">Paramètres</th>
                <th class="th">Sym. </th>
                <th class="th">Méthodes</th>
                <th class="th">Unités</th>
                <th class="th">Résultats</th>
                <th class="th">N.S</th>
                <th class="th">Critères</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td class="col-md-3">Potentiel hydrogène(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">PH</td>
                <td class="col-md-3">NM ISO 10523:V2012</td>
                <td class="col-md-3">Unités pH</td>
                <td class="col-md-3"><?= $row[4] ?></td>
                <td class="col-md-3">
                    <?php
                        if ($row[4] > 8.5 or $row[4] < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                        }
                    ?>
                </td>       
                <td class="col-md-3"> 6,5_8,5</td>
            </tr>

            <tr>
                <td class="col-md-3">Conductivité éléctrique(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">EC</td>
                <td class="col-md-3"> NF EN 27888:V2001</td>
                <td class="col-md-3">uS/cm</td>
                <td class="col-md-3"><?= $row[5] * 1000 ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[5] * 1000 > 8.5 or $row[5] * 1000 < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3">2700</td>
            </tr>

            <tr>
                <td class="col-md-3">Nitrates</td>
                <td class="col-md-3">NO3</td>
                <td class="col-md-3">NF EN ISO 13395:V1996</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $nitra ?></td>
                <td class="col-md-3">
                    <?php
                    if ($nitra > 8.5 or $nitra < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 50</td>
            </tr>

            <tr>
                <td class="col-md-3">Nitrites</td>
                <td class="col-md-3">NO2</td>
                <td class="col-md-3">NF EN ISO 13395:V1996</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"> <?= $nitri ?></td>
                <td class="col-md-3">
                    <?php
                    if ($nitri > 8.5 or $nitri < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3">0,5 </td>
            </tr>

            <tr>
                <td class="col-md-3">Ammonium</td>
                <td class="col-md-3">NH4</td>
                <td class="col-md-3">NF EN ISO 11732:V2005</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $ammon ?></td>
                <td class="col-md-3">
                    <?php
                    if ($ammon > 8.5 or $ammon < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3">0,5 </td>
            </tr>

            <tr>
                <td class="col-md-3">Chlorures</td>
                <td class="col-md-3">Cl</td>
                <td class="col-md-3"> NF EN ISO 15682:V2001</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $row[9] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[9] > 8.5 or $row[9] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 750</td>
            </tr>

            <tr>
                <td class="col-md-3">Sulfates</td>
                <td class="col-md-3">SO4</td>
                <td class="col-md-3"> NF T 90_040:V1986</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $row[10] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[10] > 8.5 or $row[10] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 400</td>
            </tr>

            <tr>
                <td class="col-md-3">Calcium(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">Ca</td>
                <td class="col-md-3"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"> <?= $row[13] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[13] > 8.5 or $row[13] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>

                </td>
                <td class="col-md-3"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3">Magnésium(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">Mg</td>
                <td class="col-md-3"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"> <?= $row[14] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[14] > 8.5 or $row[14] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3">Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3">Dureté total</td>
                <td class="col-md-3">THt</td>
                <td class="col-md-3"> Calcul.</td>
                <td class="col-md-3">°f</td>
                <td class="col-md-3"> <?= ($row[13] / 20 + $row[14] / 12) * 5 ?></td>
                <td class="col-md-3">
                    <?php
                    if (($row[13] / 20 + $row[14] / 12) * 5 > 8.5 or ($row[13] / 20 + $row[14] / 12) * 5 < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3">Bicarbonates</td>
                <td class="col-md-3">HCO3</td>
                <td class="col-md-3"> MN ISO 9963-1:V2001</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $row[11] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[11] > 8.5 or $row[11] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3">Alcalinité</td>
                <td class="col-md-3">TAC</td>
                <td class="col-md-3"> MN ISO 9963-1 </td>
                <td class="col-md-3">°f</td>
                <td class="col-md-3"> <?= $row[11] / 12, 2 ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[11] / 12.2 > 8.5 or $row[11] / 12.2 < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3">Oxydabilité ay KMnO4</td>
                <td class="col-md-3">-</td>
                <td class="col-md-3"> MN 03 7 015 </td>
                <td class="col-md-3">mgO2/L</td>
                <td class="col-md-3"><?= $row[15] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[15] > 8.5 or $row[15] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 5</td>
            </tr>

            <tr>
                <td class="col-md-3">Turbidité</td>
                <td class="col-md-3"> -</td>
                <td class="col-md-3"> MN 03 7 010</td>
                <td class="col-md-3">NTU</td>
                <td class="col-md-3"> <?= $row[16] ?></td>
                <td class="col-md-3">
                    <?php
                    if ($row[16] > 8.5 or $row[16] < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 5</td>
            </tr>

            <tr>
                <td class="col-md-3">Cuivre(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">Cu</td>
                <td class="col-md-3"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $cu ?></td>
                <td class="col-md-3">
                    <?php
                    if ($cu > 8.5 or $cu < 6.5) {
                        echo "<h6 style='color:red;'>◉</h5>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 2 </td>
            </tr>

            <tr>
                <td class="col-md-3">Zinc(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3">Zn</td>
                <td class="col-md-3">NF EN ISO 11885:V2009 </td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $zn ?></td>
                <td class="col-md-3">
                    <?php
                    if ($zn > 8.5 or $zn < 6.5) {
                        echo "<h6 style='color:red;' >◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 3</td>
            </tr>

            <tr>
                <td class="col-md-3">Mangénèse(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3"> Mn</td>
                <td class="col-md-3"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"> <?= $mn ?></td>
                <td class="col-md-3">
                    <?php
                    if ($mn > 8.5 or $mn < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 0,5</td>
            </tr>

            <tr>
                <td class="col-md-3">Fer(<h style='color:red;'>*</h>)</td>
                <td class="col-md-3"> Fe</td>
                <td class="col-md-3"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3">mg/L</td>
                <td class="col-md-3"><?= $fe ?></td>
                <td class="col-md-3">
                    <?php
                    if ($fe > 8.5 or $fe < 6.5) {
                        echo "<h6 style='color:red;'>◉</h6>";
                        $commentaire = "Les valeurs trouvées en paramètres recherchés (pH, Conductivité électrique, Turbidité, Oxydabilité, NO3, NO2, Mn, Cu, Zn et Fer) ne répondent pas aux critères physico-chimique indiqués selon la norme NM 03.70.01-2020 relative à la qualité des eaux d'alimentation humaine.";
                    }
                    ?>
                </td>
                <td class="col-md-3"> 0,30</td>
            </tr>

            <tr class='head'>
                <td colspan='7'>
                    Le présent rapport ne concerne que les objets soumis à l'essai.
                    Il comporte une seule page et ne doit pas être reproduit partiellement sans l’approbation du
                    laboratoire.
                    Seule une reproduction sous sa forme intégrale est autorisée.
                    Les échantillons sont conservés au Laboratoire 7 jours maximum après communication des résultats aux
                    clients.<br>
                    <h style='color:red;'>◉</h> Résultat non satisfaisant
                </td>
            </tr>

        </tbody>
    </table>
    </div>

    <h5 style="font-size:14px;"> <u>Commentaire :</u> </h5>
    <p style="font-size:10px;"><?php echo $commentaire; ?></p>
    <h4 style="font-size:12px;"> Paramètre accrédité</h4>
    <div style="text-align:center;">
        <img src="../img/signature.png" alt="signnLacq" width="510px">
    </div>

    <p style="font-size:9px;text-align:center;">Laboratoire LACQ <br>
        AGROPOLIS-GI5 GI6, Commune de Mejjate, Meknès, Maroc <br>
        Tel:+212 538 00 49 20 <br>
        www.elephantvert.ch - contactmaroc@elephantvert.ch</p>
</body>

</html>
