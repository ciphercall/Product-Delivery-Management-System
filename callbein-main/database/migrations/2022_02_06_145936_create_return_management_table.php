<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('return_reason');
            $table->string('member_id');
            $table->string('member_name');
            $table->string('requisitionId');
            $table->string('invoiceId');
            $table->string('product_name');
            $table->string('dc_no');
            $table->date('date');
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
        Schema::dropIfExists('return_management');
    }
}
