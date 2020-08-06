<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class Create__Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id',444);
            $table->int('user_id',99); 
            $table->int('amount',100); 
            $table->int('equivalent',33); 
            $table->int('type',99); 
            $table->string('account',567); 
            $table->int('status',11); 
            $table->timestamps();
            $table->int('balance_before',55); 
            $table->int('balance_after',55); 
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
