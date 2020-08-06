<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterest_logsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_logs', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('reference_id',  191);
            $table->int('user_id', 10);
            $table->int('invest_id', 10);
            $table->decimal('amount', 15,4);
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
