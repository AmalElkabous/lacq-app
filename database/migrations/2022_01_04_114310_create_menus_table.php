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
                array(
                    'id' => '1',
                    'matrice_id' => '1',
                    'name' => "SOL1",
                    "prix_ht" => 200,
                    "prix_supv" => 100
                ),
                array(
                    'id' => '2',
                    'matrice_id' => '2',
                    'name' => "EAU1",
                    "prix_ht" => 200,
                    "prix_supv" => 100
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
        Schema::dropIfExists('menus');
    }
}
