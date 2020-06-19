<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('company_id')->references('id')->on('common_companies')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('common_branches')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('hr_departments', function($table) {
            $table->unsignedBigInteger('created_by')->references('id')->on('hr_employees');
        });
         Schema::table('hr_departments', function($table) {
            $table->unsignedBigInteger('created_byc')->references('id')->on('hr_employees');
        });
        Schema::create('hr_positions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('company_id')->references('id')->on('common_companies')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('common_branches')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('hr_employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('common_branches')->onDelete('cascade');
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
        Schema::dropIfExists('hr_departments');
        Schema::dropIfExists('hr_positions');
        Schema::dropIfExists('hr_employees');
    }
}
