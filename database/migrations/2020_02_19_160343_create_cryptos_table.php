<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCryptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cryptos', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->string('transaction_id', 191);
            $table->string('currency1', 191);
            $table->string('currency2', 191);
            $table->int('user_id', 10);
            $table->int('gateway_id', 10);
            $table->decimal('amount', 15.2);
            $table->decimal('amount2', 16.6);
            $table->decimal('charge', 15.2);
            $table->decimal('net_amount', 15.2);
            $table->string('details', 191);
            $table->int('status', 11);
            $table->tinyint('payment', 1);
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
