<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateTransfer_logsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference', 191);
            $table->int('user_id', 10);
            $table->string('name', 191);
            $table->string('email', 191);
            $table->decimal('amount', 15,2);
            $table->decimal('charge', 15,2);
            $table->decimal('net_amount', 15,2);
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
