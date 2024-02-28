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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('no_pembelian', 15)->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('tipe_bayar')->nullable();
            $table->decimal('diskon', 8 ,2)->default(0);
            $table->decimal('pajak', 8 ,2)->default(0);
            $table->decimal('total', 8 ,2)->default(0);
            $table->decimal('bayar', 8 ,2)->default(0);
            $table->decimal('sisa', 8 ,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
