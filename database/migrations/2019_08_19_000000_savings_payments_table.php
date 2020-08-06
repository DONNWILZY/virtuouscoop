<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavings_paymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings_payments', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->int('user_id', 30);
            $table->string('payment_id', 77);
            $table->string('transaction_id', 77);
            $table->timestamps();
            $table->strin('created_at', 77);
            $table->string('updated_at', 77);
            $table->int('amount', 77);
            $table->string('plan', 77);
            $table->string('cycle', 44);
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
