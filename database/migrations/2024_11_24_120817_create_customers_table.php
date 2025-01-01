<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ssid');
            $table->string('pass_wifi');
            $table->string('ip_router');
            $table->string('user_router');
            $table->string('pass_router');
            $table->string('user_pppoe');
            $table->string('pass_pppoe');
            $table->string('remote_address')->nullable();
            $table->decimal('monthly_fee', 10, 2);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
