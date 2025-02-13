<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    public function run()
    {
        $municipios = [
            'Santarém', 'Alenquer', 'Itaituba', 'Juruti', 'Monte Alegre', 'Oriximiná', 'Óbidos', 'Almeirim', 'Aveiro',
            'Belterra', 'Curuá', 'Faro', 'Jacareacanga', 'Novo Progresso', 'Mojuí dos Campos', 'Placas', 'Prainha',
            'Rurópolis', 'Terra Santa', 'Trairão', 'Uruará'
        ];

        foreach ($municipios as $municipio) {
            DB::table('municipios')->insert(['nome' => $municipio]);
        }
    }
}
