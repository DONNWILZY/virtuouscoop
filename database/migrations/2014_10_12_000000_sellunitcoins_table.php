<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateSellunitcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellunitcoins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 11);
            $table->string('transaction_id', 111);
            $table->string('name', 122);
            $table->int('units', 11);
            $table->int('balance', 44);
            $table->int('amount', 11);
            $table->timestamps();
            $table->string('created_at',44); 
            $table->string('updated_at',44);
            $table->string('status', 22); 
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
