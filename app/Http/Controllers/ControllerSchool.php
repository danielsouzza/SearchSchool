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
        $schools = collect();

        if ($searchSchool || $searchMunicipio) {
            $schools = Escola::query()
                ->when($searchSchool, function ($query, $searchSchool) {
                    $query->where('escola', 'like', '%' . $searchSchool . '%');
                })
                ->when($searchMunicipio, function ($query, $searchMunicipio) {
                    $query->where('municipio', 'like', '%' . $searchMunicipio . '%');
                })
                ->orderBy('escola')
                ->paginate(15);
        }

        return view('dashboard',compact('schools'));
    }
}
