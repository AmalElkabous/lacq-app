<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalyseAmeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyse_ameo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("commande_id");
            $table->float("MS_%")->nullable();
            $table->float("Etat")->nullable();
            $table->float("PH_Unité_PH")->nullable();
            $table->float("EC_mS_Cm")->nullable();
            $table->float("NTK_%")->nullable();
            $table->float("PT_%")->nullable();
            $table->float("K_%")->nullable();
            $table->float("Na_%")->nullable();
            $table->float("Ca_%")->nullable();
            $table->float("Mg_%")->nullable();
            $table->float("M-O_%")->nullable();
            $table->float("Zn_mg_Kg")->nullable();
            $table->float("Cu_mg_Kg")->nullable();
            $table->float("Mn_mg_Kg")->nullable();
            $table->float("Fe_mg_Kg")->nullable();
            $table->float("B_mg_Kg")->nullable();
            $table->float("Cl_%")->nullable();
            $table->float("MN-NH4_g_Kg")->nullable();
            $table->float("N-NO3_mg_Kg")->nullable();
            $table->float("As_mg_Kg")->nullable();
            $table->float("Cd_mg_Kg")->nullable();
            $table->float("Co_mg_Kg")->nullable();
            $table->float("Cr_mg_Kg")->nullable();
            $table->float("Hg_mg_Kg")->nullable();
            $table->float("Mo_mg_Kg")->nullable();
            $table->float("Ni_mg_Kg")->nullable();
            $table->float("Pb_mg_Kg")->nullable();
            $table->float("Se_mg_Kg")->nullable();
            $table->float("M-V_G_L")->nullable();
            $table->float("Refus_%")->nullable();
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analyse_ameo');
    }
}
