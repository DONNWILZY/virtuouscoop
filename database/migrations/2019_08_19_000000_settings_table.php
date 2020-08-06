<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name', 191);
            $table->text('site_title');
            $table->string('company_name', 191);
            $table->string('contact_email', 191);
            $table->string('contact_number', 191);
            $table->string('app_contact', 191);
            $table->string('address', 191);
            $table->decimal('minimum_deposit', 10,2);
            $table->decimal('minimum_withdraw', 10,2);
            $table->decimal('self_transfer', 10,12);
            $table->decimal('other_transfer', 10,2);
            $table->decimal('signup_bonus', 10, 2);
            $table->decimal('link_share', 10,2);
            $table->decimal('referral_signup', 10,2);
            $table->decimal('daily_rewards',10,2);
            $table->decimal('referral_deposit', 10,2);
            $table->tinyint('login', 1);
            $table->tinyint('payment_proof', 1);
            $table->tinyint('latest_deposit', 1);
            $table->tinyint('aff_share', 1);
            $table->tinyint('transfer', 1);
            $table->tinyint('invest', 1);
            $table->tinyint('status', 1);
            $table->timestamp();
            $table->string('created_at');
            $table->string('updated_at');
            $table->text('bitcoin');
            $table->text('ripple');
            $table->text('ethereum');
            $table->text('lite');
            $table->int('card_percent', 33);
            $table->string('coin_percent', 33);
            $table->string('dollar_rate', 35);
            $table->string('currency', 11);
            $table->int('withdraw', 11);
            $table->int('deposit', 11);
            $table->int('coinsystem', 11);
            $table->int('coinsell');
            $table->int('cryptosystem', 11);
            $table->int('giftsystem', 11);
            $table->int('userlogin', 2);
            $table->int('userregister', 2);
            $table->int('refer', 2);
            $table->int('verify', 2);
            $table->int('loanpercent', 10);
            $table->int('loan', 2);
            $table->int('thrift', 1);
            $table->int('thrift_penalty', 44);
            $table->int('tenural', 11);



            
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
