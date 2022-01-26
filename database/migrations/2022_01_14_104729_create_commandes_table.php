<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("code_commande")->nullable()->unique();
            $table->unsignedBigInteger("client_id");
            $table->unsignedBigInteger("commercial_id");
            $table->unsignedBigInteger("menu_id");
            $table->unsignedBigInteger("lieu_id");
            $table->string("ref_client",50);
            $table->string("nature",50);
            $table->string("culture",50);
            $table->string("varite",50);
            $table->string("gps_1",50)->nullable();
            $table->string("gps_2",50)->nullable();
            $table->integer("horizon_1")->nullable();
            $table->integer("horizon_2")->nullable();
            $table->float("temperature")->nullable();
            $table->date("date_reception");
            $table->date("date_prelevement");
            $table->date("date_edition");
            $table->string("state")->nullable();
            $table->foreign('lieu_id')->references('id')->on('lieus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('commercial_id')->references('id')->on('commercials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('commandes')->insert(
            array(
                array(
                    'id' => '1',
                    'code_commande' => 103485,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 4,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '2',
                    'code_commande' => 109517,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 12,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '3',
                    'code_commande' => 106158,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 9,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '4',
                    'code_commande' => 112035,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 26,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '5',
                    'code_commande' => 100205,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 1,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '6',
                    'code_commande' => 113033,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 30,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '7',
                    'code_commande' => 110048,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 16,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
                array(
                    'id' => '8',
                    'code_commande' => 111046,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 22,
                    "lieu_id" => 1,
                    'ref_client' => "_",
                    'nature' => "_",
                    'culture' => "_",
                    'varite' => "_",
                    'gps_1' => "_",
                    'gps_2' => "_",
                    'horizon_1' => 0,
                    'horizon_2' => 0,
                    'temperature' => 0,
                    'date_reception' => '2022/01/01',
                    'date_prelevement' => '2022/01/01',
                    'date_edition' => '2022/01/01',
                    'state' => 'Valid'
                ),
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
        Schema::dropIfExists('commandes');
    }
}
