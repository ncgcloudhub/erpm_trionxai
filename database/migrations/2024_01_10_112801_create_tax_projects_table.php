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
        Schema::create('tax_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->text('description')->nullable();
            $table->text('comment')->nullable();
            $table->date('assign_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('assigned_by')->nullable();
            $table->string('assign_to')->nullable();
            $table->string('bug')->nullable();
            $table->string('issue')->nullable();
            $table->string('hyperlinks')->nullable();
            $table->string('priority')->nullable();
          
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
        Schema::dropIfExists('tax_projects');
    }
};
