<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });
        DB::table('roles')->insert(
            array(
                array(
                    'id' => '1',
                    'role' => "administrateur"
                ),
                array(
                    'id' => '2',
                    'role' => "responsable"
                ),
                array(
                    'id' => '3',
                    'role' => "cordinateur"
                ),
                array(
                    'id' => '4',
                    'role' => "receptionniste"
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
        Schema::dropIfExists('roles');
    }
}
