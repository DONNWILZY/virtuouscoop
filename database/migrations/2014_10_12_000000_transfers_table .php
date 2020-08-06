<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference', 191);
            $table->int('user_id', 10);
            $table->int('receipt', 10);
            $table->decimal('amount', 10,2);
            $table->decimal('charge', 10,2);
            $table->decimal('net_amount', 10,2);
            $table->int('verify', 11);
            $table->tinyint('counter', 4);
            $table->tinyint('status', 4);
            $table->tinyint('type', 3);
            $table->timestamps();
            $table->int('created_at'); 
            $table->int('updated_at'); 
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
