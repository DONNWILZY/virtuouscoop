<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateBuycoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buycoins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id', 300 );
            $table->string('user_id',200);
            $table->string('account',400);
            $table->string('type', 200);
            $table->string('amount', 200);
            $table->timestamps();
            $table->string('created_at', 300);
            $table->string('updated_at', 300);
            $table->int('status',10);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buycoins');
    }
}
