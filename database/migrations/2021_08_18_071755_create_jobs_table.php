<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('key', '100');
            $table->string('title', '300');
            $table->string('description', '10000');
            $table->string('job_type', '30');
            $table->string('job_url', '300');
            $table->boolean('qualified')->default(false);
            $table->unsignedBigInteger('applied_by')->nullable();
            $table->string('proposal_url')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
