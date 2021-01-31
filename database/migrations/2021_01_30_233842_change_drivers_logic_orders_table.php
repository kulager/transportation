<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDriversLogicOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('driver_id')->nullable()->change();
            $table->string('driver_full_name')->nullable();
            $table->string('driver_passport')->nullable();
            $table->string('driver_birth_date')->nullable();
            $table->string('second_driver_full_name')->nullable();
            $table->string('contract_person')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['driver_full_name', 'second_driver_full_name', 'driver_passport', 'driver_birth_date',
                'contract_person']);
//            $table->foreignId('driver_id')->nullable(false)->change();

        });
    }
}
