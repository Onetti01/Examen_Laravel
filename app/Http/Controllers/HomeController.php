<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return redirect(route("principal"));
    }

    public function closeSesion()
    {
        Auth::logout();
        return redirect(route("principal"));
    }

    public function mostrarNativos($idioma_aprender)
    {
        $usuarios=User::where('idioma_nativo',$idioma_aprender )->get();
        return view('buscarAyuda',compact('usuarios'));
    }
    public function ayudar($idioma_nativo)
    {
        $usuarios=User::where('idioma_aprender',$idioma_nativo)->get();
        return view('ayudar',compact('usuarios'));
    }

    public function darseBaja($email)
    {
        User::where('emailAux',$email)->delete();
        return redirect(route("principal"));
    }

}