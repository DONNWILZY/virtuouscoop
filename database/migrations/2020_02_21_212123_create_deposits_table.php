<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('transaction_id',191);
            $table->int('user_id',10);
            $table->string('gateway_name',191);
            $table->decimal('amount', 15.2);
            $table->decimal('charge', 15.2);
            $table->decimal('net_amount', 15.3);
            $table->string('details', 191);
            $table->tinyint('status', 4);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
