<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matrice_id');
            $table->string('name',20);
            $table->string('prix_ht',20);
            $table->string('prix_supv',20);
            $table->foreign('matrice_id')->references('id')->on('matrices')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('menus')->insert(
            array(
                array('id' => '1','matrice_id' => '1','name' => 'EAU1','prix_ht' => '300','prix_supv' => '300'),
                array('id' => '2','matrice_id' => '1','name' => 'EAU2','prix_ht' => '240','prix_supv' => '240'),
                array('id' => '3','matrice_id' => '2','name' => 'WPOTA','prix_ht' => '400','prix_supv' => '395'),
                array('id' => '4','matrice_id' => '3','name' => 'SOL1','prix_ht' => '400','prix_supv' => '400'),
                array('id' => '5','matrice_id' => '3','name' => 'SOL2','prix_ht' => '375','prix_supv' => '375'),
                array('id' => '6','matrice_id' => '3','name' => 'SOL3','prix_ht' => '340','prix_supv' => '340'),
                array('id' => '7','matrice_id' => '3','name' => 'SOL4','prix_ht' => '300','prix_supv' => '300'),
                array('id' => '8','matrice_id' => '3','name' => 'SOL5','prix_ht' => '250','prix_supv' => '221'),
                array('id' => '9','matrice_id' => '4','name' => 'FOL1','prix_ht' => '400','prix_supv' => '400'),
                array('id' => '10','matrice_id' => '4','name' => 'FOL2','prix_ht' => '330','prix_supv' => '330'),
                array('id' => '11','matrice_id' => '4','name' => 'FOL3','prix_ht' => '270','prix_supv' => '265'),
                array('id' => '12','matrice_id' => '5','name' => 'ORG1','prix_ht' => '570','prix_supv' => '0'),
                array('id' => '13','matrice_id' => '5','name' => 'ORG2','prix_ht' => '418','prix_supv' => '0'),
                array('id' => '14','matrice_id' => '5','name' => 'ORGQ','prix_ht' => '1200','prix_supv' => '0'),
                array('id' => '15','matrice_id' => '5','name' => 'ORG-ETM','prix_ht' => '1000','prix_supv' => '0'),
                array('id' => '16','matrice_id' => '6','name' => 'MIC1','prix_ht' => '550','prix_supv' => '0'),
                array('id' => '17','matrice_id' => '6','name' => 'MIC2','prix_ht' => '450','prix_supv' => '0'),
                array('id' => '18','matrice_id' => '6','name' => 'MIC-AGRI','prix_ht' => '500','prix_supv' => '0'),
                array('id' => '19','matrice_id' => '6','name' => 'M-ALI','prix_ht' => '600','prix_supv' => '0'),
                array('id' => '20','matrice_id' => '6','name' => 'MIC-SUR','prix_ht' => '350','prix_supv' => '0'),
                array('id' => '21','matrice_id' => '6','name' => 'MIC-AIR','prix_ht' => '350','prix_supv' => '0'),
                array('id' => '22','matrice_id' => '7','name' => 'R-BASI','prix_ht' => '1200','prix_supv' => '0'),
                array('id' => '23','matrice_id' => '7','name' => 'R-DITH','prix_ht' => '800','prix_supv' => '0'),
                array('id' => '24','matrice_id' => '7','name' => 'S-TOXI','prix_ht' => '500','prix_supv' => '0'),
                array('id' => '25','matrice_id' => '7','name' => 'S-ETM','prix_ht' => '1000','prix_supv' => '0'),
                array('id' => '26','matrice_id' => '8','name' => 'DIAGV','prix_ht' => '1000','prix_supv' => '0'),
                array('id' => '27','matrice_id' => '8','name' => 'DIAGC','prix_ht' => '1000','prix_supv' => '0'),
                array('id' => '28','matrice_id' => '8','name' => 'DIAGB','prix_ht' => '1000','prix_supv' => '0'),
                array('id' => '29','matrice_id' => '8','name' => 'DIAGN','prix_ht' => '700','prix_supv' => '0'),
                array('id' => '30','matrice_id' => '9','name' => 'SOLM1','prix_ht' => '335','prix_supv' => '335'),
                array('id' => '31','matrice_id' => '9','name' => 'SOLM2','prix_ht' => '270','prix_supv' => '270'),
                array('id' => '32','matrice_id' => '9','name' => 'SOLRF1','prix_ht' => '495','prix_supv' => '401'),
                array('id' => '33','matrice_id' => '9','name' => 'SOLRF2','prix_ht' => '400','prix_supv' => '282'),
                array('id' => '34','matrice_id' => '9','name' => 'SOLRF3','prix_ht' => '317','prix_supv' => '0'),
                array('id' => '35','matrice_id' => '5','name' => 'MO 48H','prix_ht' => '200','prix_supv' => '0'),
                array('id' => '36','matrice_id' => '5','name' => 'MO24H','prix_ht' => '400','prix_supv' => '0'),
                array('id' => '37','matrice_id' => '5','name' => 'ORG2+ MO 48H','prix_ht' => '618','prix_supv' => '0'),
                array('id' => '38','matrice_id' => '5','name' => 'ORG1+ETM','prix_ht' => '1570','prix_supv' => '0'),
                array('id' => '39','matrice_id' => '5','name' => 'ORG2+ETM','prix_ht' => '1418','prix_supv' => '0'),
                array('id' => '40','matrice_id' => '5','name' => 'ISMO','prix_ht' => '8000','prix_supv' => '0'),
                array('id' => '41','matrice_id' => '3','name' => 'SOL1+SULFT','prix_ht' => '400','prix_supv' => '400'),
                array('id' => '42','matrice_id' => '1','name' => 'MENU BIPEA','prix_ht' => '0','prix_supv' => '0'),
                array('id' => '43','matrice_id' => '1','name' => 'EAU1+BORE','prix_ht' => '300','prix_supv' => '300'),
                array('id' => '44','matrice_id' => '9','name' => 'SOLM1+BORE','prix_ht' => '335','prix_supv' => '335'),
                array('id' => '45','matrice_id' => '5','name' => 'PH+EC+MO','prix_ht' => '300','prix_supv' => '0'),
                array('id' => '46','matrice_id' => '5','name' => 'PH+EC','prix_ht' => '100','prix_supv' => '0'),
                array('id' => '47','matrice_id' => '5','name' => 'MO ','prix_ht' => '100','prix_supv' => '0'),
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
        Schema::dropIfExists('menus');
    }
}
