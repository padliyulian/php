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
            $table->string('email');
            $table->timestamps();
        });

        DB::table('employees')->insert([
            ['nik' => '0807051001', 'name' => 'padli yulian', 'sex' => 'Male', 'position_id' => 1, 'email' => 'padli@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051002', 'name' => 'iwan saputra', 'sex' => 'Male', 'position_id' => 2, 'email' => 'iwan@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051003', 'name' => 'rudi agus susanto', 'sex' => 'Male', 'position_id' => 3, 'email' => 'rudi@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051004', 'name' => 'nanang qosim', 'sex' => 'Male', 'position_id' => 4, 'email' => 'nanang@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051005', 'name' => 'tri yulian', 'sex' => 'Female', 'position_id' => 5, 'email' => 'tri@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051006', 'name' => 'raisa aprilia', 'sex' => 'Female', 'position_id' => 1, 'email' => 'raisa@gmail.com', 'created_at' => NOW()],
            ['nik' => '0807051007', 'name' => 'lebron james', 'sex' => 'Male', 'position_id' => 6, 'email' => 'james@gmail.com', 'created_at' => NOW()],
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
