<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atividade_id')->constrained('atividades')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('mensagem');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
