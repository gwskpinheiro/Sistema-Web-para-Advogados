<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('atividades', function (Blueprint $table) {
            $table->enum('tipo', ['tarefa', 'evento'])->default('tarefa')->after('processo_id');
            $table->enum('status', ['pendente', 'concluida'])->default('pendente')->after('tipo');
            $table->foreignId('autor_id')->nullable()->constrained('users')->onDelete('set null')->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('atividades', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->dropColumn('status');
            $table->dropForeign(['autor_id']);
            $table->dropColumn('autor_id');
        });
    }
};
