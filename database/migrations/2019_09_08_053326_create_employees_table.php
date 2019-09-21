<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nik', 10)->unique();
            $table->string('name');
            $table->string('sex');
            $table->unsignedInteger('position_id');
            $table->timestamps();
        });

        DB::table('employees')->insert([
            ['nik' => '0807051001', 'name' => 'padli yulian', 'sex' => 'male', 'position_id' => 1, 'created_at' => NOW()],
            ['nik' => '0807051002', 'name' => 'iwan saputra', 'sex' => 'male', 'position_id' => 2, 'created_at' => NOW()],
            ['nik' => '0807051003', 'name' => 'rudi agus susanto', 'sex' => 'male', 'position_id' => 3, 'created_at' => NOW()],
            ['nik' => '0807051004', 'name' => 'nanang qosim', 'sex' => 'male', 'position_id' => 4, 'created_at' => NOW()],
            ['nik' => '0807051005', 'name' => 'tri yulian', 'sex' => 'female', 'position_id' => 5, 'created_at' => NOW()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
