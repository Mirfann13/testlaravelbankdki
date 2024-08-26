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
        Schema::create('pembukaan_rekenings', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('pekerjaan_id')->constrained();
            $table->foreignId('provinsi_id')->constrained();
            $table->foreignId('kabupaten_id')->constrained();
            $table->foreignId('kecamatan_id')->constrained();
            $table->foreignId('kelurahan_id')->constrained();
            $table->string('nama_jalan');
            $table->string('rt');
            $table->string('rw');
            $table->decimal('nominal_setor', 15, 2);
            $table->enum('status', ['Menunggu Approval', 'Disetujui'])->default('Menunggu Approval');
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembukaan_rekenings');
    }
};
