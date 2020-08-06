<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Virtoiwh_save;
use Illuminate\Support\Facades\Schema;

class CreateOfflinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlines', function (Blueprint $table) {
            $table->bigIncrements('id', 10);
            $table->string('name', 191);
            $table->string('image', 191);
            $table->string('account', 191);
            $table->decimal('fixed', 10,2);
            $table->decimal('percent', 10,2);
            $table->string('ex_percent', 10,2);
            $table->string('val1', 191);
            $table->string('val2', 191);
            $table->text('details');
            $table->tinyint('status');
            $table->timestamp();
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
        Schema::dropIfExists('buycards');
    }
}
