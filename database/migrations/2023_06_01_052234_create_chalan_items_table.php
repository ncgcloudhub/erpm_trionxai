<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chalan_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chalan_id');
            $table->foreign('chalan_id')->references('id')->on('chalans')->onDelete('cascade');
            $table->string('qty');
            $table->float('rate',8,2);
            $table->float('price',8,2);
            $table->float('amount',8,2);
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
        Schema::dropIfExists('chalan_items');
    }
};
