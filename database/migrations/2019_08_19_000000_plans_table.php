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
            $table->bigIncrements('id', 20);
            $table->int('style_id', 10);
            $table->string('color', 44);
            $table->string('name', 191);
            $table->decimal('minimum', 15,2);
            $table->decimal('maximum', 15, 2);
            $table->decimal('percentage', 15,2);
            $table->int('start_duration', 10);
            $table->int('repeat', 10);
            $table->tinyint('status', );
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
        Schema::dropIfExists('failed_jobs');
    }
}
