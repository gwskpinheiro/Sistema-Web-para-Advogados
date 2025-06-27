<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->dateTime('data_hora');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('caso_id')->nullable()->constrained('casos')->onDelete('cascade');
            $table->foreignId('processo_id')->nullable()->constrained('processos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atividades');
    }
};
