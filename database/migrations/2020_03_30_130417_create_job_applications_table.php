<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status',['pending','accepted','rejected'])->default('pending');
            $table->dateTime('meeting_date')->nullable();
            $table->string('meeting_location')->nullable();
            $table->double('meeting_lat')->nullable();
            $table->double('meeting_lng')->nullable();
            $table->text('cover_letter')->nullable();

            $table->uuid('job_id');
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('job_applications');
    }
}
