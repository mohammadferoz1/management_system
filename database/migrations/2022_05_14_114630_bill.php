<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->json('product_detail');
            $table->integer('total_price');
            $table->integer('credit')->default(0);
            $table->integer('debit')->default(0);
            $table->unsignedBigInteger('site_id');
            $table->enum('site_type', ['contracted', 'non_contracted']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->text('pdf_link');
            $table->text('client_complaint');
            $table->text('repairing_item');
            $table->text('description');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
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
