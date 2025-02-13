<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->string('codigo_inep')->primary();
            $table->string('restricao_atendimento')->nullable();
            $table->string('escola');
            $table->string('uf', 2);
            $table->string('municipio');
            $table->string('localizacao');
            $table->string('localidade_diferenciada')->nullable();
            $table->string('categoria_administrativa');
            $table->string('endereco');
            $table->string('telefone')->nullable();
            $table->string('dependencia_administrativa');
            $table->string('categoria_escola_privada')->nullable();
            $table->boolean('conveniada_poder_publico')->default(false);
            $table->boolean('regulamentacao_conselho_educacao')->default(false);
            $table->string('porte_escola');
            $table->text('etapas_modalidade_ensino_oferecidas');
            $table->text('outras_ofertas_educacionais')->nullable();
        
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
