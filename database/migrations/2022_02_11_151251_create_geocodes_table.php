<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geocodes', function (Blueprint $table) {
            $table->id();
            $table->string('division', 50);
            $table->string('district', 50);
            $table->string('subordinate', 100);
            $table->string('branch', 100);
            $table->string('post_code', 100);
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
        Schema::dropIfExists('geocodes');
    }
}
