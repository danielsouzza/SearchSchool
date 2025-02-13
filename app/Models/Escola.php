<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    use HasFactory;

    protected $table = 'schools';

    protected $primaryKey = 'codigo_inep';

    public $incrementing = false;

    protected $keyType = 'string';

}
