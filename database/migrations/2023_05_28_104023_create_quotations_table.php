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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('sale_date');
            $table->text('details')->nullable();
            $table->float('sub_total',8,2);  
            $table->float('grand_total',8,2);  
            $table->string('discount_flat')->nullable();;
            $table->string('discount_per')->nullable();;
            $table->string('total_vat')->nullable();;
            $table->string('p_paid_amount');
            $table->string('due_amount');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('quotations');
    }
};
