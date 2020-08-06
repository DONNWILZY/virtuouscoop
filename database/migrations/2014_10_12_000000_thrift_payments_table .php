<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateThrift_paymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrift_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id', 111);
            $table->string('reference_id', 111);
            $table->float('amount', 11,2);
            $table->int('number', 130);
            $table->int('cycle', 99);
            $table->timestamps();
            $table->string('created_at', 77); 
            $table->string('updated_at', 77); 
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
