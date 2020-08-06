<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateThrift_membersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrift_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 100);
            $table->string('name', 400);
            $table->string('image', 400);
            $table->string('reference_id', 33);
            $table->int('thrift_id', 100);
            $table->string('thrift_name', 200);
            $table->int('number', 100);
            $table->float('amount', 10,2);
            $table->int('status', 1);
            $table->string('payment_date', 100);
            $table->string('next_payment', 66);
            $table->timestamps();
            $table->string('created_at', 100); 
            $table->string('updated_at', 100); 
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
