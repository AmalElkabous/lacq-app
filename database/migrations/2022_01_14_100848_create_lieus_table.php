<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieus', function (Blueprint $table) {
            $table->id();
            $table->text("lieu");
            $table->timestamps();
        });
        DB::table('lieus')->insert(
            array(
                array(
                    'id' => '1',
                    'lieu' => 'null'
                ),
                array(
                    'id' => '2',
                    'lieu' => 'intern'
                ),
                array(
                    'id' => '3',
                    'lieu' => 'extern'
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
        Schema::dropIfExists('lieus');
    }
}
