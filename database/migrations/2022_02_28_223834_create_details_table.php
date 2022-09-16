<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
          $table->id();
          $table->string('tutor_name');
          $table->string('gender');
          $table->string('categories_id');
          $table->string('designation');
          $table->string('education');
          $table->string('background');
          $table->string('salary');
          $table->string('address');
          $table->longText('subject');
          $table->longText('experience');
          $table->longText('in_details');
          $table->string('photo');
          $table->string('phone');
          $table->string('status');
          $table->string('video_link')->nullable();
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
        Schema::dropIfExists('details');
    }
}
