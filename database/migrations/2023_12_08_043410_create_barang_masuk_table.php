<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangmasuk', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->date('tgl_masuk');
            $table->unsignedInteger('qty_masuk');
            $table->unsignedTinyInteger('barang_id');
            $table->timestamps();
            $table->foreign('barang_id')
                ->references('id')
                ->on('barang')
                ->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangmasuk');
    }
};