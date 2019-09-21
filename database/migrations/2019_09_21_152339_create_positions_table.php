<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position');
            $table->timestamps();
        });

        DB::table('positions')->insert([
            ['position' => 'Project Manager', 'created_at' => NOW()],
            ['position' => 'Front End', 'created_at' => NOW()],
            ['position' => 'Back End', 'created_at' => NOW()],
            ['position' => 'UI/UX', 'created_at' => NOW()],
            ['position' => 'Softaware QA', 'created_at' => NOW()],
            ['position' => 'System Analist', 'created_at' => NOW()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
