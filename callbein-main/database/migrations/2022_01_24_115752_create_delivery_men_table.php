<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deliveryman_name');
            $table->string('deliveryman_email')->nullable();
            $table->string('deliveryman_phone');
            $table->string('deliveryman_address')->nullable();
            $table->string('deliveryman_image')->nullable();
            $table->string('deliveryman_nid')->nullable();
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
        Schema::dropIfExists('delivery_men');
    }
}
