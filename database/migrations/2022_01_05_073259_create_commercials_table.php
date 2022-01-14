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
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('commercials')->insert(
            array(
                array(
                    'id' => '1',
                    'name' => "MOHAMMED EL ABIDI",
                    "zone" => "FES MEKNES"
                ),
                array(
                    'id' => '2',
                    'name' => "MOHAMMED OUSSAMA EL MOUSAOUI",
                    "zone" => "KENITRA EL GHARB"
                ),
                array(
                    'id' => '3',
                    'name' => "AMAL EL KABOUS",
                    "zone" => "CASA BLANCA"
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
        Schema::dropIfExists('commercials');
    }
}
