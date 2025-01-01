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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('description'); // Deskripsi pengeluaran
            $table->decimal('amount', 15, 2); // Jumlah pengeluaran
            $table->timestamps(); // Waktu pembuatan dan update
        });
    }

    public function down()
    {
        Schema::dropIfExists('expenses');
    }
};
