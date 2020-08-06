<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateLoanpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loanpayments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 22); 
           $table->string('loancode', 22);
           $table->string('loanplan', 22);
           $table->int('amount', 44);
           $table->timestamp();
           $table->string('created_at', 22);
           $table->string('created_at', 33);
           $table->string('status', 55);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buycards');
    }
}
