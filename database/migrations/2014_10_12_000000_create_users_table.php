<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->rememberToken();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@mail.com', 'email_verified_at' => NOW(), 'username' => 'admin', 'password' => Hash::make('admin'), 'api_token' => Str::random(80), 'role_id' => '1', 'created_at' => NOW()],
            ['name' => 'operator', 'email' => 'operator@mail.com', 'email_verified_at' => NOW(), 'username' => 'operator', 'password' => Hash::make('operator'), 'api_token' => Str::random(80), 'role_id' => '2', 'created_at' => NOW()],
            ['name' => 'user', 'email' => 'user@mail.com', 'email_verified_at' => NOW(), 'username' => 'user', 'password' => Hash::make('user'), 'api_token' => Str::random(80), 'role_id' => '3', 'created_at' => NOW()],
        ]);
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
