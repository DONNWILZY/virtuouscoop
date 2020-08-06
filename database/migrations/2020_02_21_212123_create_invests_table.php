<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invests', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('reference_id', 191);
            $table->int('user_id', 10);
            $table->int('plan_id', 10);
            $table->string('name', 44);
            $table->decimal('amount', 15,2,);
            $table->datetime('start_time');
            $table->int('status', 11);
            $table->timestamps();
            $table->string('created_at');
            $table->string('updated_at');
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
