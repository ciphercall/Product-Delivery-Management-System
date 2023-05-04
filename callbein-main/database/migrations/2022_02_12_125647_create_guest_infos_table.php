<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_name');
            $table->string('guestId');
            $table->string('guest_name');
            $table->integer('member_id');
            $table->string('member_name');
            $table->string('guest_email')->nullable();
            $table->string('guest_number')->nullable();
            $table->string('guest_address')->nullable();
            $table->string('guest_area')->nullable();
            $table->string('guest_designation')->nullable();
            $table->string('member_relation')->nullable();
            $table->string('guest_nid')->nullable();
            $table->string('guest_driver')->nullable();
            $table->string('driver_mobile')->nullable();
            $table->longText('guest_remark')->nullable();
            $table->string('guest_photo')->nullable();
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
        Schema::dropIfExists('guest_infos');
    }
}
