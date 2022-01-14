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
                    'code_commande' => null,
                    'client_id' => 1,
                    'commercial_id' => 1,
                    'menu_id' => 1,
                    'ref_client' => "5862kk",
                    'nature' => "tomato",
                    'culture' => "tair",
                    'varite' => "varite",
                    'gps_1' => "Posision 1",
                    'gps_2' => "Posision 2",
                    'horizon_1' => 0,
                    'horizon_2' => 20,
                    'temperature' => 40,
                    'date_reception' => '2022/01/10',
                    'date_prelevement' => '2022/01/11',
                    'date_edition' => '2022/01/20',
                    'state' => 'En cours'
                ),
                array(
                    'id' => '2',
                    'code_commande' => null,
                    'client_id' => 1,
                    'commercial_id' => 2,
                    'menu_id' => 1,
                    'ref_client' => "5862kk",
                    'nature' => "tomato",
                    'culture' => "tair",
                    'varite' => "varite",
                    'gps_1' => "Posision 1",
                    'gps_2' => "Posision 2",
                    'horizon_1' => 0,
                    'horizon_2' => 20,
                    'temperature' => 40,
                    'date_reception' => '2022/01/10',
                    'date_prelevement' => '2022/01/11',
                    'date_edition' => '2022/01/20',
                    'state' => 'En cours'
                ),
                array(
                    'id' => '3',
                    'code_commande' => null,
                    'client_id' => 2,
                    'commercial_id' => 3,
                    'menu_id' => 1,
                    'ref_client' => "5862kk",
                    'nature' => "tomato",
                    'culture' => "tair",
                    'varite' => "varite",
                    'gps_1' => "Posision 1",
                    'gps_2' => "Posision 2",
                    'horizon_1' => 0,
                    'horizon_2' => 20,
                    'temperature' => 40,
                    'date_reception' => '2022/01/10',
                    'date_prelevement' => '2022/01/11',
                    'date_edition' => '2022/01/20',
                    'state' => 'En cours'
                ),
                array(
                    'id' => '4',
                    'code_commande' => null,
                    'client_id' => 2,
                    'commercial_id' => 3,
                    'menu_id' => 2,
                    'ref_client' => "5862kk",
                    'nature' => "tomato",
                    'culture' => "tair",
                    'varite' => "varite",
                    'gps_1' => "Posision 1",
                    'gps_2' => "Posision 2",
                    'horizon_1' => 0,
                    'horizon_2' => 20,
                    'temperature' => 40,
                    'date_reception' => '2022/01/10',
                    'date_prelevement' => '2022/01/11',
                    'date_edition' => '2022/01/20',
                    'state' => 'En cours'
                )
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
