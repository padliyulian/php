<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
	        $table->string('description');
	        $table->tinyInteger('removable')->default('1');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'app administrator', 'removable' => '0', 'created_at' => NOW()],
            ['name' => 'operator', 'description' => 'app operator', 'removable' => '1', 'created_at' => NOW()],
            ['name' => 'user', 'description' => 'app user', 'removable' => '1', 'created_at' => NOW()]
        ]);
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
