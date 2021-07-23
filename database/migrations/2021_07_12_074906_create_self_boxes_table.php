<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('income_id')->nullable()->constrained('incomes')->onDelete('cascade');
            $table->decimal('credit',12)->default(0);;
            $table->decimal('debit',12)->default(0);;
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
        Schema::dropIfExists('self_boxes');
    }
}
