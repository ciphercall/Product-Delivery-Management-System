<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('expenseId');
            $table->string('company_name');
            $table->string('account_devision');
            $table->string('account_group');
            $table->string('account_head');
            $table->string('amount');
            $table->date('date');
            $table->time('time');
            $table->string('expense_desc');
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
        Schema::dropIfExists('admin_expenses');
    }
}
