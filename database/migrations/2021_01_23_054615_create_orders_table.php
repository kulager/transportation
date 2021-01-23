<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id');
            $table->date('date');
            $table->date('deadline')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('second_car_brand')->nullable();
            $table->string('car_number')->nullable();
            $table->string('second_car_number')->nullable();
            $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('address_id')->constrained('addresses');
            $table->foreignId('driver_id')->constrained('drivers');
            $table->foreignId('second_driver_id')->nullable()->constrained('drivers');
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
        Schema::dropIfExists('orders');
    }
}
