<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->timestamps();

            // Review for Which Job
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs');

            // Review Created by
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
            ->on('users');

            // Review Completed by
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
