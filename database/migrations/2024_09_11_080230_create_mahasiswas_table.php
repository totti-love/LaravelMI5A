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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('npm', 10);
            $table->string('nama', 30);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('email');
            $table->string('hp', 12);
            $table->string('alamat');
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodis');
            $table->timestamps();
        });
    }

   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
