<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateThrift_withdrawalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrift_withdrawals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 100);
            $table->int('amount', 100);
            $table->string('transaction_id', 33);
            $table->string('thrift_id', 33);
            $table->text('bank');
            $table->timestamps();
            $table->string('created_at', 55); 
            $table->string('updated_at', 55); 
            $table->int('status', 2);
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
