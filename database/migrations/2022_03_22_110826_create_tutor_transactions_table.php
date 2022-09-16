<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('student_id');
            $table->integer('tutor_id');
            $table->decimal('amount',10,2);
            $table->decimal('vat',10,2);
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
        Schema::dropIfExists('tutor_transactions');
    }
}
