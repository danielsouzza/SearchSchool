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
                        ->exists();
                    $is_medium = str_contains($escola->etapas_modalidade_ensino_oferecidas, 'Ensino Médio');
                    $escola->setAttribute('municipio_proximo',( $municipio_proximo && $is_medium));
                    return $escola;
                });
        } else {
            $schools = collect();
        }


        return view('dashboard',compact('schools'));
    }
}
