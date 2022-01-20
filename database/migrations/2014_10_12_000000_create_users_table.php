<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->boolean('is_active');
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                array(
                    'id' => '1',
                    'name' => "mohammed",
                    "last_name" => "el-abidi",
                    "email" => "mohammed.el-abidi@elephant-vert.com",
                    "password" =>  Hash::make("Xwgpdz1ds5@"),
                    "role_id" => 1,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '2',
                    'name' => "faical",
                    "last_name" => "rouissi",
                    "email" => "faical.rouissi@elephant-vert.com",
                    "password" =>  Hash::make("Xwgpdz1ds5@"),
                    "role_id" => 1,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '3',
                    'name' => "mohammed oussama",
                    "last_name" => "mousaouy",
                    "email" => "m-o.el-mousaouy@elephant-vert.com",
                    "password" =>  Hash::make("@"),
                    "role_id" => 1,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '4',
                    'name' => "amal",
                    "last_name" => "el-kabous",
                    "email" => "amal.el-kabous@elephant-vert.com",
                    "password" =>  Hash::make("Meknes2021"),
                    "role_id" => 1,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '5',
                    'name' => "amine",
                    "last_name" => "el-kabous",
                    "email" => "amine.bouslamti@elephant-vert.com",
                    "password" =>  Hash::make("Lacq2021"),
                    "role_id" => 1,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                
                array(
                    'id' => '6',
                    'name' => "asmaa",
                    "last_name" => "benhida",
                    "email" => "asmaa.benhida@elephant-vert.com",
                    "password" =>  Hash::make("Lacq2021"),
                    "role_id" => 2,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '7',
                    'name' => "mohamed",
                    "last_name" => "amzad",
                    "email" => "mohamed.amzad@elephant-vert.com",
                    "password" =>  Hash::make("Lacq2021"),
                    "role_id" => 3,
                    "is_active" => true,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '8',
                    'name' => "fatima",
                    "last_name" => "zarrouk",
                    "email" => "fatima.zarrouk@elephant-vert.com",
                    "password" =>  Hash::make("Lacq2021"),
                    "role_id" => 4,
                    "is_active" => true,
                    "avatar" => "user.png"
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
        Schema::dropIfExists('users');
    }
}
