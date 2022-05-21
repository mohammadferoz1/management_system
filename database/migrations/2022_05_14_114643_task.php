<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('created_by');
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('num_of_workers');
            $table->enum('employee_acceptance_status', ['not accepted', 'partially accepted', 'accepted by all'])->default('not accepted');
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
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
