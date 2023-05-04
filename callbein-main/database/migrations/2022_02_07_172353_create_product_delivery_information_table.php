<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDeliveryInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_delivery_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_id');
            $table->string('chalanId');
            $table->string('received_amount');
            $table->string('received_by');
            $table->string('doc_file');
            $table->string('return_status');
            $table->string('return_reason')->nullable();
            $table->date('date');
            $table->time('time')->nullable();
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
        Schema::dropIfExists('product_delivery_information');
    }
}
