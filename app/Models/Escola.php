<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    protected $table = 'schools';
    protected $primaryKey = 'codigo_inep';
    protected $appends = ['has_bonus', 'is_area_abrangencia', 'is_ensino_medio'];
    public $incrementing = false;
    protected $keyType = 'string';

    private $bonus;
    private $abrangencia;
    private $ensino_medio;

    public function getHasBonusAttribute()
    {
        return $this->hasBonus();
    }

    public function getIsAreaAbrangenciaAttribute()
    {
        return $this->isAbrangencia();
    }

    public function getIsEnsinoMedioAttribute()
    {
        return $this->isEnsinoMedio();
    }

    public function hasBonus() : bool {
        if ($this->bonus === null) {
            $this->bonus = $this->isAbrangencia() && $this->isEnsinoMedio();
        }

        return $this->bonus;
    }

    public function isAbrangencia() : bool {
        if ($this->abrangencia === null) {
            $this->abrangencia = Municipio::query()
                ->where('nome', 'like', '%' . $this->municipio . '%')
                ->exists();
        }

        return $this->abrangencia;
    }

    public function isEnsinoMedio() : bool {
        if ($this->ensino_medio === null) {
            $this->ensino_medio = str_contains($this->etapas_modalidade_ensino_oferecidas, 'Ensino Médio');
        }

        return $this->ensino_medio;
    }
}
