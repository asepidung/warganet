<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('sideincomes', function (Blueprint $table) {
        $table->id();
        $table->date('date'); // Menyimpan tanggal pemasukan
        $table->decimal('amount', 15, 2); // Menyimpan jumlah pemasukan
        $table->text('description')->nullable(); // Menyimpan keterangan pemasukan
        $table->timestamps(); // Menyimpan created_at dan updated_at
    });
}


    public function down()
    {
        Schema::dropIfExists('sideincomes');
    }
};
