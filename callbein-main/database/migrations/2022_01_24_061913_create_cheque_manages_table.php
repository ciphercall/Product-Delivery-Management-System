<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_manages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cheque_no');
            $table->string('cheque_amount');
            $table->string('cheque_image');
            $table->string('member_id');
            $table->string('bank_name');
            $table->string('honoured_by');
            $table->string('honoured_date');
            $table->string('prepared_by');
            $table->date('date');
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
        Schema::dropIfExists('cheque_manages');
    }
}
