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
        Schema::create('tax_task_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->text('description')->nullable();
            $table->text('comment')->nullable();
            $table->date('assign_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('assigned_by')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('project_list')->nullable();
            $table->text('hyperlinks')->nullable();
            $table->string('priority')->nullable();
            $table->string('status')->nullable();
            $table->string('tax_year')->nullable();
            $table->string('eSignature')->nullable();
            $table->string('ef_status')->nullable();
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
        Schema::dropIfExists('tax_task_projects');
    }
};
