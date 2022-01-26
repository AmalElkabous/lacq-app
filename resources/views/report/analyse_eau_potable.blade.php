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
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/preloader.css') }}">
    <script src="{{ asset('assets/js/jquery.preloader.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}">
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
        }

        h6{ 
            display:inline !important;
            font-family: DejaVu Sans;
        
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
            padding: 2px 10px !important;
           
        }

        .th,
        .col-md-3 {
            text-align: center;
            border: 1px solid black;
        }

        .bordered {
            padding: 1px 5px;
            border: 1px solid black;
        }

    </style>

    @php use App\Custom\Archivos; @endphp
    <table border="0">
        <tr>
            <td><img src="{{ Archivos::imagenABase64(public_path('img/LacqLogo.jpg')) }}" width="160px" height="40px">
            </td>
            <td>
                <h5 style="color:green;text-align:center; font-size:14px;">RAPPORT D'ANALYSE PHYSICO-CHIMIQUE D'EAU
                    </br>N° EAUVEG100001 </h5>
            </td>
            <td style="text-align:right;"><img src="{{ Archivos::imagenABase64(public_path('img/semac.png')) }}"
                    width="90px" height="40px"></td>
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

    <table style="width:100%;font-size:10px;margin-top:">

        <tr>
            <th class="head bordered">Client :</th>
            <td class="col-md-3 bordered">{{ $client_info->exploiteur }}</td>
            <th class=" head bordered">Dossier suivi par :</th>
            <td class="col-md-3 bordered">{{ $commande_info->commercial }}</td>
        </tr>

        <tr>
            <th class="head bordered">N°CIN :</th>
            <td class="col-md-3 bordered">{{ $client_info->cin_rc }}</td>
            <th class="head bordered">Référence de l'échantillon :</th>
            <td class="col-md-3 bordered"></td>
        </tr>

        <tr>
            <th class="head bordered">Adresse :</th>
            <td class="col-md-3 bordered">{{ $client_info->address }}</td>
            <th class="head bordered">Date de prélèvement :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_prelevement }}</td>
        </tr>

        <tr>
            <th class="head bordered">Référence client :</th>
            <td class="col-md-3 bordered">{{ $commande_info->ref_client }}</td>
            <th class="head bordered">Date de réception :</th>
            <td class="col-md-3 bordered">{{ $commande_info->date_reception }}</td>
        </tr>

        <tr>
            <th class="head bordered">Nature déchantillon :</th>
            <td class="col-md-3 bordered">{{ $commande_info->nature }}</td>
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

    <table style="width:100%;font-size:10px;margin-top:10px">
            <tr>
                <th style="text-align: center" class="head bordered">Paramètres</th>
                <th style="text-align: center" class="head bordered">Sym. </th>
                <th style="text-align: center" class="head bordered">Méthodes</th>
                <th style="text-align: center" class="head bordered">Unités</th>
                <th style="text-align: center" class="head bordered">Résultats</th>
                <th style="text-align: center" class="head bordered">N.S</th>
                <th style="text-align: center" class="head bordered">Critères</th>
            </tr>
            @php
                $nitra = $analyse_data->NO3_ppm;
                $commantair_analyse = $commantair[0];
                if (floatval($nitra) <= 0.5) {
                    $nitra = 'Inf à 0,5';
                }
                $nitri = $analyse_data->NO2_ppm;
                $ammon = $analyse_data->NH4_ppm;
                if (floatval($nitri) <= 0.1) {
                    $nitri = 'Inf à 0,1';
                } elseif (floatval($ammon) <= 0.1) {
                    $ammon = 'Inf à 0,1';
                }
                $cu = $analyse_data->Cu_ppm;
                $zn = $analyse_data->Zn_ppm;
                $mn = $analyse_data->Mn_ppm;
                if (floatval($cu) <= 0.01) {
                    $cu = 'Inf à 0,1';
                } elseif (floatval($zn) <= 0.01) {
                    $zn = 'Inf à 0,1';
                } elseif (floatval($mn) <= 0.01) {
                    $mn = 'Inf à 0,1';
                }
                $fe = $analyse_data->Fe_ppm;
                if (floatval($fe) <= 0.005) {
                    $fe = 'Inf à 0,005';
                }
            @endphp
            <tr>
                <td class="col-md-3 bordered">Potentiel hydrogène(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">PH</td>
                <td class="col-md-3 bordered">NM ISO 10523:V2012</td>
                <td class="col-md-3 bordered">Unités pH</td>
                <td class="col-md-3 bordered">{{ $analyse_data->PH_Unité_PH }}</td>
                <td class="col-md-3 bordered">
                    @php
                        
                        if ($analyse_data->PH_Unité_PH > 8.5 or $analyse_data->PH_Unité_PH < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 6,5_8,5</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Conductivité éléctrique(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">EC</td>
                <td class="col-md-3 bordered"> NF EN 27888:V2001</td>
                <td class="col-md-3 bordered">uS/cm</td>
                <td class="col-md-3 bordered"><?= $analyse_data->EC_mS_Cm * 1000 ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->EC_mS_Cm * 1000 > 8.5 or $analyse_data->EC_mS_Cm * 1000 < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered">2700</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Nitrates</td>
                <td class="col-md-3 bordered">NO3</td>
                <td class="col-md-3 bordered">NF EN ISO 13395:V1996</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $nitra ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($nitra > 8.5 or $nitra < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 50</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Nitrites</td>
                <td class="col-md-3 bordered">NO2</td>
                <td class="col-md-3 bordered">NF EN ISO 13395:V1996</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"> <?= $nitri ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($nitri > 8.5 or $nitri < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered">0,5 </td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Ammonium</td>
                <td class="col-md-3 bordered">NH4</td>
                <td class="col-md-3 bordered">NF EN ISO 11732:V2005</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $ammon ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($ammon > 8.5 or $ammon < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered">0,5 </td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Chlorures</td>
                <td class="col-md-3 bordered">Cl</td>
                <td class="col-md-3 bordered"> NF EN ISO 15682:V2001</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $analyse_data->Cl_ppm ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->Cl_ppm > 8.5 or $analyse_data->Cl_ppm < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 750</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Sulfates</td>
                <td class="col-md-3 bordered">SO4</td>
                <td class="col-md-3 bordered"> NF T 90_040:V1986</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $analyse_data->SO4_ppm ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->SO4_ppm > 8.5 or $analyse_data->SO4_ppm < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 400</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Calcium(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">Ca</td>
                <td class="col-md-3 bordered"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"> <?= $analyse_data->Ca_ppm ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->Ca_ppm > 8.5 or $analyse_data->Ca_ppm < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp

                </td>
                <td class="col-md-3 bordered"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Magnésium(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">Mg</td>
                <td class="col-md-3 bordered"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"> <?= $analyse_data->Mg_ppm ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->Mg_ppm > 8.5 or $analyse_data->Mg_ppm < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered">Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Dureté total</td>
                <td class="col-md-3 bordered">THt</td>
                <td class="col-md-3 bordered"> Calcul.</td>
                <td class="col-md-3 bordered">°f</td>
                <td class="col-md-3 bordered"> <?= round(($analyse_data->Ca_ppm / 20 + $analyse_data->Mg_ppm / 12) * 5,2) ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if (($analyse_data->Ca_ppm / 20 + $analyse_data->Mg_ppm / 12) * 5 > 8.5 or ($analyse_data->Ca_ppm / 20 + $analyse_data->Mg_ppm / 12) * 5 < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Bicarbonates</td>
                <td class="col-md-3 bordered">HCO3</td>
                <td class="col-md-3 bordered"> MN ISO 9963-1:V2001</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $analyse_data->HCO3_ppm ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->HCO3_ppm > 8.5 or $analyse_data->HCO3_ppm < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Alcalinité</td>
                <td class="col-md-3 bordered">TAC</td>
                <td class="col-md-3 bordered"> MN ISO 9963-1 </td>
                <td class="col-md-3 bordered">°f</td>
                <td class="col-md-3 bordered"> <?= round($analyse_data->HCO3_ppm / 12.2 ,2) ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->HCO3_ppm / 12.2 > 8.5 or $analyse_data->HCO3_ppm / 12.2 < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> Non spécifié</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Oxydabilité ay KMnO4</td>
                <td class="col-md-3 bordered">-</td>
                <td class="col-md-3 bordered"> MN 03 7 015 </td>
                <td class="col-md-3 bordered">mgO2/L</td>
                <td class="col-md-3 bordered"><?= $analyse_data->Oxydabilite ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->Oxydabilite > 8.5 or $analyse_data->Oxydabilite < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 5</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Turbidité</td>
                <td class="col-md-3 bordered"> -</td>
                <td class="col-md-3 bordered"> MN 03 7 010</td>
                <td class="col-md-3 bordered">NTU</td>
                <td class="col-md-3 bordered"><?= $analyse_data->Turbidite ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($analyse_data->Turbidite > 8.5 or $analyse_data->Turbidite < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 5</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Cuivre(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">Cu</td>
                <td class="col-md-3 bordered"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $cu ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($cu > 8.5 or $cu < 6.5) {
                            echo "<h6 style='color:red;'>◉</h5>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 2 </td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Zinc(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered">Zn</td>
                <td class="col-md-3 bordered">NF EN ISO 11885:V2009 </td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $zn ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($zn > 8.5 or $zn < 6.5) {
                            echo "<h6 style='color:red;' >◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 3</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Mangénèse(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered"> Mn</td>
                <td class="col-md-3 bordered"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"> <?= $mn ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($mn > 8.5 or $mn < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 0,5</td>
            </tr>

            <tr>
                <td class="col-md-3 bordered">Fer(<h6 style='color:red;'>*</h6>)</td>
                <td class="col-md-3 bordered"> Fe</td>
                <td class="col-md-3 bordered"> NF EN ISO 11885:V2009</td>
                <td class="col-md-3 bordered">mg/L</td>
                <td class="col-md-3 bordered"><?= $fe ?></td>
                <td class="col-md-3 bordered">
                    @php
                        if ($fe > 8.5 or $fe < 6.5) {
                            echo "<h6 style='color:red;'>◉</h6>";
                            $commantair_analyse = $commantair[1];
                        }
                    @endphp
                </td>
                <td class="col-md-3 bordered"> 0,30</td>
            </tr>
            <tr class='head'>
                <td colspan='7'>
                    Le présent rapport ne concerne que les objets soumis à l'essai.
                    Il comporte une seule page et ne doit pas être reproduit partiellement sans l’approbation du
                    laboratoire.
                    Seule une reproduction sous sa forme intégrale est autorisée.
                    Les échantillons sont conservés au Laboratoire 7 jours maximum après communication des résultats aux
                    clients.<br>
                    <h6 style='color:red;'>&#9673;</h6>: Résultat non satisfaisant</td>
            </tr>
    </table>

    <h5 style="font-size:14px;text-align:left;margin:2px;padding:0"> <u>Commentaire :</u> </h5>
    <p style="font-size:10px; text-align:left;margin:2px;padding:0">{{ $commantair_analyse }}</p>
    <h4 style="font-size:12px;text-align:left;margin:2px;padding:0"> Paramètre accrédité</h4>
    <img src="{{ Archivos::imagenABase64(public_path('img/signature.png')) }}" style="margin-top:15px" width="500px" height="100px">
    <p style="font-size:9px;text-align:center;">Laboratoire LACQ <br>
        AGROPOLIS-GI5 GI6, Commune de Mejjate, Meknès, Maroc <br>
        Tel:+212 538 00 49 20 <br>
        www.elephantvert.ch - contactmaroc@elephantvert.ch</p>

</body>

</html>
