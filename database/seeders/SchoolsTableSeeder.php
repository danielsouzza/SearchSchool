<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws Exception
     */
    public function run()
    {
        $filePath = storage_path('app/public/Análise - Tabela da lista das escolas.csv');

        if (!file_exists($filePath)) {
            throw new Exception("Arquivo CSV não encontrado: " . $filePath);
        }

        $handle = fopen($filePath, 'r');
        $header = fgetcsv($handle, 1000, ",");

        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            $data = array_combine($header, $row);

            DB::table('schools')->insert([
                'codigo_inep' => $row[2],
                'restricao_atendimento' => $row[0] ?? null,
                'escola' => $row[1],
                'uf' => $row[3],
                'municipio' => $row[4],
                'localizacao' => $row[5],
                'localidade_diferenciada' => $row[6] ?? null,
                'categoria_administrativa' => $row[7],
                'endereco' => $row[8],
                'telefone' => $row[9] ?? null,
                'dependencia_administrativa' => $row[10],
                'categoria_escola_privada' => $row[11] ?? null,
                'conveniada_poder_publico' => isset($row[12]) && strtolower($row[12]) == 'sim',
                'regulamentacao_conselho_educacao' => isset($row[13]) && strtolower($row[13]) == 'sim',
                'porte_escola' => $row[14],
                'etapas_modalidade_ensino_oferecidas' => $row[15],
                'outras_ofertas_educacionais' => $row[16] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        fclose($handle);
    }
}
