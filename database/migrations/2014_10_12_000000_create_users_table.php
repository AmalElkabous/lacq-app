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
                    "password" =>  Hash::make("admin@admin"),
                    "role_id" => 1,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '2',
                    'name' => "mohammed",
                    "last_name" => "el-abidi",
                    "email" => "test@elephant-vert.com",
                    "password" =>  Hash::make("admin@admin"),
                    "role_id" => 2,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '3',
                    'name' => "mohammed",
                    "last_name" => "el-abidi",
                    "email" => "test2@elephant-vert.com",
                    "password" =>  Hash::make("admin@admin"),
                    "role_id" => 3,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '4',
                    'name' => "mohammed",
                    "last_name" => "el-abidi",
                    "email" => "test3@elephant-vert.com",
                    "password" =>  Hash::make("admin@admin"),
                    "role_id" => 4,
                    "avatar" => "user.png"
                ),
                array(
                    'id' => '5',
                    'name' => "mohammed",
                    "last_name" => "el-abidi",
                    "email" => "test4@elephant-vert.com",
                    "password" =>  Hash::make("admin@admin"),
                    "role_id" => 1,
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
