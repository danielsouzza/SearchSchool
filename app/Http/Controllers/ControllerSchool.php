<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ControllerSchool extends Controller
{
    function index(Request $req)
    {
        $schools = Escola::query()->where(function ($query) {
            if(request('search-school')){
                $query->where('escola', 'like', '%' . request('search') . '%');
            }
            if(request('search-municipio')){
                $query->where('municipio', 'like', '%' . request('search') . '%');
            }

        })->orderBy('escola')->paginate(15)->through(function ($escola) {
            $municipio_proximo = Municipio::query()->where('nome','like','%'. $escola->municipio.'%')->first();
            $escola->setAttribute('municipio_proximo',!!$municipio_proximo);
            return $escola;
        });

        return view('dashboard',compact('schools'));
    }
}
