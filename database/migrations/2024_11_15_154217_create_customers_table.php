<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pelanggan
            $table->string('ssid')->nullable(); // SSID WiFi
            $table->string('wifi_password')->nullable(); // Password WiFi
            $table->string('remote_ip')->nullable(); // Remote IP
            $table->string('router_ip')->nullable(); // IP Router
            $table->string('router_user')->nullable(); // Username Router
            $table->string('router_password')->nullable(); // Password Router
            $table->string('pppoe_user')->nullable(); // Username PPPoE
            $table->string('pppoe_password')->nullable(); // Password PPPoE
            $table->decimal('monthly_fee', 10, 2)->nullable(); // Biaya bulanan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
