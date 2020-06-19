<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestateModuleTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('real_masters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });
           Schema::create('real_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type');
            $table->string('building_no');
            $table->string('elecrticity_no');
            $table->string('name');
            $table->string('phone');
            $table->string('national_id');
            $table->double('rent');
            $table->double('electricity_charges');
            $table->double('other_expenses');
            $table->mediumText('address');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });
            Schema::create('real_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('unit_type');
            $table->string('name');
            $table->unsignedBigInteger('furnish_status');
            $table->double('rent');
            $table->string('unit_code');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });
            Schema::create('real_tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('national_id');
            $table->string('phone');
            $table->string('nationality');
            $table->string('tenant_code');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });
            Schema::create('real_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('tenant_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('rent');
            $table->double('deposit');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
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
         Schema::dropIfExists('real_masters');
         Schema::dropIfExists('real_properties');
         Schema::dropIfExists('real_units');
         Schema::dropIfExists('real_tenants');
         Schema::dropIfExists('real_contracts');
    }
}
