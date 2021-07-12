<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('income_id')->nullable()->constrained('incomes')->onDelete('cascade');
            $table->decimal('credit',8, 3);
            $table->string('percentage');
            $table->string('note');
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
        Schema::dropIfExists('learn_boxes');
    }
}
