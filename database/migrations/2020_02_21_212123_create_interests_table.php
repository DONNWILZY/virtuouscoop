<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('reference_id', 191);
            $table->int('user_id', 10);
            $table->int('invest_id', 10);
            $table->datetime('start_time');
            $table->datetime('made_time');
            $table->int('total_repeat', 10);
            $table->tinyint('status', 1);
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
