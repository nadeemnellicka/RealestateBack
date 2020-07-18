<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinanceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin_groups', function (Blueprint $table) {
            $table->id()->start_from(1000);
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('default_identifier')->nullable()->comment = 'to identify the default groups';
            $table->unsignedBigInteger('parent_id');
            $table->enum('is_default', ['yes', 'no']);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        }); 
        Schema::create('fin_ledgers', function (Blueprint $table) {
            $table->id()->start_from(1000);
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('default_identifier')->comment = 'to identify the default ledgers';
            $table->unsignedBigInteger('group_id');
            $table->enum('reference', ['NA','customer', 'supplier','employee','bank'])->default('NA');
            $table->unsignedBigInteger('reference_id')->default('0');
            $table->enum('is_default', ['yes', 'no']);
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });          
        Schema::create('fin_entrytypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('default_identifier')->comment = 'to identify the transaction';
            $table->string('module');
            $table->timestamps();
        });        
        Schema::create('fin_entries', function (Blueprint $table) {
            $table->id();
            $table->string('doc_no');
            $table->date('entry_date');
            $table->double('amount');
            $table->enum('status', ['approved', 'deleted','pending']);
            $table->mediumText('notes')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->timestamps();
        });        
        Schema::create('fin_entryitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('ledger_id');
            $table->double('amount');
            $table->enum('dc', ['D', 'C']);
            $table->mediumText('notes')->nullable();
            $table->string('purpose')->nullable()->comment='for what this entry has been made,eg:inventory if the entryitem corresponds to and inventory entry.';
            $table->string('purpose_type')->nullable()->comment='item';
            $table->unsignedBigInteger('purpose_id')->nullable()->comment='item-id';
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
        Schema::dropIfExists('fin_groups');
    }
}
