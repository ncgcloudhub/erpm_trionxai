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
        Schema::create('service_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('service_date');
            $table->text('details')->nullable();
            $table->float('sub_total',10,2);  
            $table->float('grand_total',10,2);  
            $table->string('service _discount')->nullable();;
            $table->string('total_discount')->nullable();;
            $table->string('total_vat')->nullable();;
            $table->string('p_paid_amount');
            $table->string('due_amount');
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
        Schema::dropIfExists('service_invoices');
    }
};
