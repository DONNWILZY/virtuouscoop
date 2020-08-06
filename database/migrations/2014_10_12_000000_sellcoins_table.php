<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateSellcoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellcoins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id',200);
            $table->string('amount', 300);
            $table->string('pick', 500);
            $table->string('type', 200);
            $table->string('trans_id', 200);
            $table->string('photo', 500);
            $table->timestamps();
            $table->string('balance_before',200); 
            $table->string('balance_after',200); 
            $table->string('status', 200);
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
