<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            // Foreign key ke tabel users (user yang melakukan pemesanan)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Foreign key ke tabel produk
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade'); // Asumsi tabel produk sudah ada
            
            $table->integer('jumlah');
            $table->decimal('total_harga', 12, 2);
            $table->text('alamat_pengiriman');
            $table->enum('status', ['Pending', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'])->default('Pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};