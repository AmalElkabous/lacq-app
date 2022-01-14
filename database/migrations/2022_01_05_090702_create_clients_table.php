<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("cin_rc",50)->unique();
            $table->string("address",50);
            $table->string("exploiteur",50);
            $table->string("organisme",50);
            $table->timestamps();
        });
        DB::table('clients')->insert(
            array(
                array(
                    'id' => '1',
                    'cin_rc' => 'R541265',
                    'address' => "Kenitra",
                    "exploiteur" => "Elabidi Mohammed",
                    "organisme" => "Ev Meknes",
                ),
                array(
                    'id' => '2',
                    'cin_rc' => 'C91265',
                    'address' => "Meknes",
                    "exploiteur" => "Amal el kabous",
                    "organisme" => "Ev casa",
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
        Schema::dropIfExists('clients');
    }
}
