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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Relasi ke tabel customers
            $table->decimal('monthly_fee', 10, 2); // Biaya bulanan
            $table->decimal('bill_total', 10, 2)->default(0); // Total tagihan
            $table->enum('status', ['no_payment', 'partial_payment', 'fully_paid'])->default('no_payment'); // Status tagihan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
