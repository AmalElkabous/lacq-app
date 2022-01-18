<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercials', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("zone");
            $table->string("email")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('commercials')->insert(
            array(
                array('id' => '1','name' => 'MOHAMMED BOUTGOURINE ','zone' => 'SOUSS-MASSA'),
                array('id' => '2','name' => 'ABDELJALIL BOUFOUSSI','zone' => 'SOUSS-MASSA'),
                array('id' => '3','name' => 'AMINE LAMNAOUAR','zone' => 'SOUSS-MASSA'),
                array('id' => '4','name' => 'MUSTAPHA  EL HASSANI','zone' => 'SOUSS-MASSA'),
                array('id' => '5','name' => 'MOHAMMED BENZINE','zone' => 'SOUSS-MASSA'),
                array('id' => '6','name' => 'AIT M\'HAMED M\'HAMED','zone' => 'SOUSS-MASSA'),
                array('id' => '7','name' => 'BENTAARITE MED AMINE','zone' => 'SOUSS-MASSA'),
                array('id' => '8','name' => 'IDRISS EL BAZ','zone' => 'SOUSS-MASSA'),
                array('id' => '9','name' => 'TOUIL FOUAD ','zone' => 'TARDOUDANT-OUARZAZATE'),
                array('id' => '10','name' => 'ABDELKARIM AZELMAD','zone' => 'TARDOUDANT-OUARZAZATE'),
                array('id' => '11','name' => 'AHMAD MOUTAWAKIL','zone' => 'TARDOUDANT-OUARZAZATE'),
                array('id' => '12','name' => 'HICHAM HARRAT','zone' => 'TARDOUDANT-OUARZAZATE'),
                array('id' => '13','name' => 'HAMID BAHTAT','zone' => 'TARDOUDANT-OUARZAZATE'),
                array('id' => '14','name' => 'ABDELALI BOUFALA ','zone' => 'GHARB'),
                array('id' => '15','name' => 'AZOUGAGH NOUREDDINE ','zone' => 'GHARB'),
                array('id' => '16','name' => 'BOUCHTA BENHANINE ','zone' => 'GHARB'),
                array('id' => '17','name' => 'MOUHSINE ABOUT ','zone' => 'GHARB'),
                array('id' => '18','name' => 'ALI AIT ASSOU ','zone' => 'ATLAS-DRAA'),
                array('id' => '19','name' => 'ABDELAH SALIMI ','zone' => 'ATLAS-DRAA'),
                array('id' => '20','name' => 'MOHAMMED EL ABBASI ','zone' => 'ATLAS-DRAA'),
                array('id' => '21','name' => 'HASSANE BAOUHAM','zone' => 'ATLAS-DRAA'),
                array('id' => '22','name' => 'M. MUSTAPHA EL HOUARI','zone' => 'ATLAS-DRAA'),
                array('id' => '23','name' => 'AYOUB WOUAI','zone' => 'CENTRE OUEST'),
                array('id' => '24','name' => 'AMINE CHEBLI ','zone' => 'CENTRE OUEST'),
                array('id' => '25','name' => 'LABDALLAOUI NABIL','zone' => 'CENTRE OUEST'),
                array('id' => '26','name' => 'MOHCINE OTMANE','zone' => 'CENTRE OUEST'),
                array('id' => '27','name' => 'MUSTAPHA AZZAKANI','zone' => 'CENTRE OUEST'),
                array('id' => '28','name' => 'ISSAM TALBI ','zone' => 'CENTRE OUEST'),
                array('id' => '29','name' => 'ZINEB ABBAD','zone' => 'CENTRE OUEST'),
                array('id' => '30','name' => 'HICHAM ENNOUBI ','zone' => 'CENTRE SUD'),
                array('id' => '31','name' => 'ABDERAHIM MAROUI ','zone' => 'CENTRE SUD'),
                array('id' => '32','name' => 'LAMIAE ABOUNE ','zone' => 'CENTRE SUD'),
                array('id' => '33','name' => 'BOUCHAIB HOURRANE','zone' => 'CENTRE SUD'),
                array('id' => '34','name' => 'SAMIR BOUHAL','zone' => 'CENTRE SUD'),
                array('id' => '35','name' => 'MUSTAPHA BAKHOU ','zone' => 'CENTRE SUD'),
                array('id' => '36','name' => 'MOHAMED EL GHAZOUANI','zone' => 'CENTRE SUD'),
                array('id' => '37','name' => 'MONSIF BAHIA','zone' => 'CENTRE SUD'),
                array('id' => '38','name' => 'NOUREDDINE KORDASS ','zone' => 'NORD OUEST'),
                array('id' => '39','name' => 'ALI EL AYOUNI','zone' => 'NORD OUEST'),
                array('id' => '40','name' => 'AYOUB HOURMA ','zone' => 'NORD OUEST'),
                array('id' => '41','name' => 'MERYAMA OUHNINI','zone' => 'NORD OUEST'),
                array('id' => '42','name' => 'YOUSSEF RACHID ','zone' => 'MEKNèS-SAîS'),
                array('id' => '43','name' => 'KHALID ZOUAK ','zone' => 'MEKNèS-SAîS'),
                array('id' => '44','name' => 'OUSSAMA ZBITA ','zone' => 'MEKNèS-SAîS'),
                array('id' => '45','name' => 'OUIAM BEN CHARAF ','zone' => 'MEKNèS-SAîS'),
                array('id' => '46','name' => 'YASSINE FARAJ ','zone' => 'MEKNèS-SAîS'),
                array('id' => '47','name' => 'ADIL EL MAHFOUDI ','zone' => 'MEKNèS-SAîS'),
                array('id' => '48','name' => 'AYOUB HAJJAJ','zone' => 'MEKNèS-SAîS'),
                array('id' => '49','name' => 'ISMAIL BOULRHAZIOUI','zone' => 'MEKNèS-SAîS'),
                array('id' => '50','name' => 'ZAKARIA EL KABBAJ ','zone' => 'ORIENTAL'),
                array('id' => '51','name' => 'CHAKIB HAMZA','zone' => 'ORIENTAL'),
                array('id' => '52','name' => 'MOHAMED EL ABDELLAOUI ','zone' => 'ORIENTAL'),
                array('id' => '53','name' => 'KAMAL HADDI ','zone' => 'ORIENTAL'),
                array('id' => '54','name' => 'MEYSAA BENAMAR','zone' => 'ORIENTAL'),
                array('id' => '55','name' => 'BRAHIM ANIJI','zone' => 'NORD OUEST'),
                array('id' => '56','name' => 'MOHAMED AIT M\'HAMED OUAHMED','zone' => 'SOUSS-MASSA'),
                array('id' => '57','name' => 'HAMID JABIR','zone' => 'SOUSS-MASSA'),
                array('id' => '58','name' => 'ABDERRAHIM EL KHARRAZ','zone' => 'CENTRE OUEST'),
                array('id' => '59','name' => 'OUIAM ELGHAZOUANI','zone' => 'EV MAROC'),
                array('id' => '60','name' => 'FADWA MAZOUZ','zone' => 'EV MAROC'),
                array('id' => '61','name' => 'ABDELAZIZ MAHFOUD','zone' => 'EV MAROC'),
                array('id' => '62','name' => 'REDOUANE NDA','zone' => 'EV MAROC'),
                array('id' => '63','name' => ' FATIMAZAHRA MAMOUNI','zone' => 'EVM DéVELOPPEMENT'),
                array('id' => '64','name' => 'EV MARKETING','zone' => 'EVM'),
                array('id' => '65','name' => 'EV SENEGAL','zone' => 'EV SENEGAL'),
                array('id' => '66','name' => 'CLINIQUE DES PLANTES','zone' => 'CLINIQUE DES PLANTES'),
                array('id' => '67','name' => 'EV MALI','zone' => 'EV MALI'),
                array('id' => '68','name' => 'M. F.L MOUNKORO','zone' => 'EV MALI'),
                array('id' => '69','name' => 'EV KENYA','zone' => 'KENYA'),
                array('id' => '70','name' => 'ROLAND AMANI','zone' => 'EV CôTE D\'IVOIRE '),
                array('id' => '71','name' => 'EV CôTE D\'IVOIRE ','zone' => 'CôTE D\'IVOIRE '),
                array('id' => '72','name' => 'EVFRANCE','zone' => 'FRANCE '),
                array('id' => '73','name' => 'CLIENT','zone' => 'DIRECT'),
                array('id' => '74','name' => 'BIPEA','zone' => 'BIPEA'),
                array('id' => '75','name' => 'ROCHDI YOUNES','zone' => 'CENTRE OUEST'),
                array('id' => '76','name' => 'YOUNES ROCHDI','zone' => 'CENTRE OUEST')
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercials');
    }
}
