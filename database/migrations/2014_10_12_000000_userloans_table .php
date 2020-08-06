<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateUserloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userloans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('user_id', 1);
            $table->string('loancode', 55);
            $table->int('loanid', 11);
            $table->string('loanplan', 55);
            $table->int('amount', 44);
            $table->int('topay', 55);
            $table->int('paid', 44);
            $table->int('balance', 44);
            $table->string('tenure', 33);
            $table->timestamps();
            $table->string('created_at', 66); 
            $table->string('updated_at', 44); 
            $table->int('status', 66);
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
