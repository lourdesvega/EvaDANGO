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
        $usuarios = User::where('nivel', 2)->get();
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

        ]);

        $usuario = new User([
            'name' => $request->get('nombre'),
            'apellidos' => $request->get('apellidos'),
            'email' => $request->get('correo'),
            'password' => Hash::make($request->get('password'))
        ]);

        $usuario->save();
        (new DepositoController)->editDeposito($request->get('deposito'), $usuario);


        Alert::success('Encargado', 'Se ha creado correctamente el encargado');

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
        ]);

        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('nombre');
        $usuario->apellidos = $request->get('apellidos');
        $usuario->email = $request->get('correo');
        $usuario->activo = $request->get('activo');

        $usuario->save();

        (new DepositoController)->editDeposito($request->get('deposito'), $usuario);

        Alert::success('Encargado', 'Se ha modificado correctamente el encargado');
        return redirect()->route('adm.usuarios.listar');
    }


    public function destroy($id)
    {

        User::find($id)->delete();
        Alert::success('Encargado', 'Se ha eliminado correctamente el encargado');
        return redirect()->route('adm.usuarios.listar');
    }
}
