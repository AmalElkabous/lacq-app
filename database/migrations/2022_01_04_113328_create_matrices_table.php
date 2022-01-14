<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
            $table->integer("code");
            $table->integer("delai");
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('matrices')->insert(
            array(
                array(
                    'id' => '1',
                    'name' => "SOL",
                    "code" => 100,
                    "delai" => 5,
                    
                ),
                array(
                    'id' => '2',
                    'name' => "EAU",
                    "code" => 101,
                    "delai" => 2,
                    
                ),
                array(
                    'id' => '3',
                    'name' => "DIAG",
                    "code" => 102,
                    "delai" => 6,
                    
                ),
                array(
                    'id' => '4',
                    'name' => "POTA",
                    "code" => 103,
                    "delai" => 4,
                    
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
        Schema::dropIfExists('matrices');
    }
}
