<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->int('user_id', 77,);
            $table->string('transaction_id',44 );
            $table->int('amount', 100 );
            $table->string('next', 100 );
            $table->string('plan', 100);
            $table->int('cycle', 20);
            $table->timestamps();
            $table->string('created_at', 200);
            $table->string('updated_at', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
}
