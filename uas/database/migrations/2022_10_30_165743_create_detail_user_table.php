<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function (Blueprint $penduduks) {
            $penduduks->id();
            $penduduks->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $penduduks->string('alamat')->nullable();
            $penduduks->string('tempat_lahir')->nullable();
            $penduduks->date('tanggal_lahir')->nullable();
            $penduduks->foreignId('agama_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $penduduks->string('foto_ktp')->nullable();
            $penduduks->integer('umur')->nullable();
            $penduduks->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_users');
    }
};
