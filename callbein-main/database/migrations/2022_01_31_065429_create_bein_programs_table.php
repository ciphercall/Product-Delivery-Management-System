<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeinProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bein_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('programId');
            $table->string('programIncharge');
            $table->string('member');
            $table->string('reason');
            $table->date('firstSchedule');
            $table->date('lastSchedule');
            $table->longText('programDesc');
            $table->string('prepared_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bein_programs');
    }
}
