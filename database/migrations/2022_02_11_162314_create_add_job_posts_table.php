<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_id');
            $table->string('student_name');
            $table->string('categories_id');
            $table->string('job_heading');
            $table->string('location');
            $table->string('salary');
            $table->string('subject');
            $table->string('in_details');
            $table->string('status');
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
        Schema::dropIfExists('add_job_posts');
    }
}
