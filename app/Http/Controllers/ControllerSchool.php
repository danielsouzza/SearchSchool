<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class ControllerSchool extends Controller
{
    function index(Request $req)
    {
        $schools = Escola::query()->where(function ($query) {
            if(request('search')){
                $query->where('escola', 'like', '%' . request('search') . '%');
            }
        })->paginate(15);
        return view('dashboard',compact('schools'));
    }
}
