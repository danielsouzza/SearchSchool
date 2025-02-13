<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ControllerSchool extends Controller
{
    function index(Request $req)
    {
        $searchSchool = request('search-school');
        $searchMunicipio = request('search-municipio');

        if ($searchSchool || $searchMunicipio) {
            $schools = Escola::query()
                ->when($searchSchool, function ($query, $searchSchool) {
                    $query->where('escola', 'like', '%' . $searchSchool . '%');
                })
                ->when($searchMunicipio, function ($query, $searchMunicipio) {
                    $query->where('municipio', 'like', '%' . $searchMunicipio . '%');
                })
                ->orderBy('escola')
                ->paginate(15)
                ->through(function ($escola) {
                    $municipio_proximo = Municipio::query()
                        ->where('nome', 'like', '%' . $escola->municipio . '%')
                        ->first();

                    $escola->setAttribute('municipio_proximo', !!$municipio_proximo);
                    return $escola;
                });
        } else {
            $schools = collect();
        }

        return view('dashboard',compact('schools'));
    }
}
