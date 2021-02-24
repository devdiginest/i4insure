<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('customer_id');
            $table->unsignedBigInteger('phone');
            $table->string('address');
            $table->string('vehicle_number');
            $table->string('type_of_vehicle');
            $table->string('vehicle_class');
            $table->string('make_and_model');
            $table->string('present_policy_no');
            $table->date('expiry_date');
            $table->string('existing_insurer');
            $table->string('remarks');
            $table->integer('status');
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
        Schema::dropIfExists('customers');
    }
}
