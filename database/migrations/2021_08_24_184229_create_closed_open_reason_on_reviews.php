<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosedOpenReasonOnReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('close_reason_id')->nullable();
            $table->foreign('close_reason_id')
                ->references('id')
                ->on('review_lists');

            // Review for Which Job
            $table->unsignedBigInteger('open_reason_id');
            $table->foreign('open_reason_id')
                ->references('id')
                ->on('review_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('closed_open_reason_on_reviews');
    }
}
