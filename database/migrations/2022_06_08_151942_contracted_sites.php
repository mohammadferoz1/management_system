<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContractedSites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracted_sites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('amount_taken');
            $table->integer('contracted_amount');
            $table->integer('credit')->default(0);
            $table->integer('debit')->default(0);
            $table->string('address');
            $table->date('start_at');
            $table->date('end_at');
            $table->bigInteger('recover');
            $table->bigInteger('phone');
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
