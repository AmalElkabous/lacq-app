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
                    'name' => "EAU",
                    "code" => 100,
                    "delai" => 4,
                    
                ),
                array(
                    'id' => '2',
                    'name' => "EAU POTABLE",
                    "code" => 102,
                    "delai" => 4,
                    
                ),
                array(
                    'id' => '3',
                    'name' => "SOL",
                    "code" => 103,
                    "delai" => 7,
                    
                ),
                array(
                    'id' => '4',
                    'name' => "VEG",
                    "code" => 106,
                    "delai" => 4, 
                ),
                array(
                    'id' => '5',
                    'name' => "AMEO",
                    "code" => 109,
                    "delai" => 7,
                    
                ),
                array(
                    'id' => '6',
                    'name' => "MIC",
                    "code" => 110,
                    "delai" => 7,
                    
                ),
                array(
                    'id' => '7',
                    'name' => "SPV",
                    "code" => 111,
                    "delai" => 7,
                    
                ),
                array(
                    'id' => '8',
                    'name' => "DIAG",
                    "code" => 112,
                    "delai" => 7,
                    
                ),
                array(
                    'id' => '9',
                    'name' => "EAP",
                    "code" => 113,
                    "delai" => 5,
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
