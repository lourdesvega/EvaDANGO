<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $usuario = User::find(auth()->user()->id);
        return view('perfil.perfil', compact('usuario'));
    }

    public function editName(Request $request)
    {
        $request->validate([
            'nombre' => ['required'],
            'apellidos' => ['required'],
        ]);

        $usuario = User::find(auth()->user()->id);
        $usuario->name =  $request->get('nombre');
        $usuario->apellidos =  $request->get('apellidos');
        $usuario->save();
    
    }

    public function editPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $usuario = User::find(auth()->user()->id);
        $usuario->password =  Hash::make($request->get('password'));
        $usuario->save();
    }
}
