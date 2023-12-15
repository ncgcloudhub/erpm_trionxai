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
        if(!Schema::hasTable('conveyance_items')){
        Schema::create('conveyance_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conveyance_id');
            $table->foreign('conveyance_id')->references('id')->on('conveyances')->onDelete('cascade');
            $table->string('from');
            $table->string('to');
            $table->string('purpose');
            $table->string('transport');
            $table->float('amount',8,2);
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conveyance_items');
    }
};
