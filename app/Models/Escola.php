<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $table = 'schools';
    protected $primaryKey = 'codigo_inep';
    protected $appends = ['municipio_proximo'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function getMunicipioProximoAttribute()
    {
        $municipio_proximo = Municipio::query()
            ->where('nome', 'like', '%' . $this->municipio . '%')
            ->exists();

        $is_medium = str_contains($this->etapas_modalidade_ensino_oferecidas, 'Ensino Médio');

        return $municipio_proximo && $is_medium;
    }

}
