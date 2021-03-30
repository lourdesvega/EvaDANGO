<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Deposito;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\DepositoController;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adm');
    }


    public function index()
    {
        $usuarios = User::all();
        return view('adm.usuarios.listar', compact('usuarios'));
    }


    public function create()
    {
        $depositos = Deposito::where('activo', 1)->get();
        return view('adm.usuarios.crear', compact('depositos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required', 'unique:users',
            'password' => 'required', 'min:8',
            'nivel' => 'required',

        ]);

        $usuario = new User([
            'name' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'email' => $request->get('correo'),
            'nivel' => $request->get('nivel'),
            'password' => Hash::make($request->get('password'))
        ]);

        $usuario->save();
        (new DepositoController)->editDeposito($request->get('deposito'), $usuario);


        Alert::success('Usuario', 'Se ha creado correctamente el usuario');

        return redirect()->route('adm.usuarios.listar');
    }


    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $depositos = Deposito::where('activo', 1)->get();
        return view('adm.usuarios.editar', compact('usuario', 'depositos'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required', 'unique:users',
            'activo' => 'required',
            'nivel' => 'required',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('nombre');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('correo');
        $usuario->activo = $request->get('activo');
        $usuario->nivel = $request->get('nivel');

        $usuario->save();

        (new DepositoController)->editDeposito($request->get('deposito'), $usuario);

        Alert::success('Usuario', 'Se ha modificado correctamente el usuario');
        return redirect()->route('adm.usuarios.listar');
    }


    public function destroy($id)
    {

        User::find($id)->delete();
        Alert::success('Usuario', 'Se ha eliminado correctamente el usuario');
        return redirect()->route('adm.usuarios.listar');
    }
}
