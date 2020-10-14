<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Deposito;
use App\User;
use App\Zona;

class DepositoController extends Controller
{
    public function __construct()
    {
        $this->middleware('adm');
    }

    public function index()
    {
        $depositos = Deposito::all();
        return view('adm.depositos.listar', compact('depositos'));
    }


    public function create()
    {
        $usuarios = User::where('activo', 1)->where('nivel', 1)->get();
        $zonas = Zona::all();
        return view('adm.depositos.crear', compact('usuarios', 'zonas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'zona_id' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        $deposito = new Deposito([
            'nombre' => $request->get('nombre'),
            'zona_id' => $request->get('zona_id'),
            'estado' => $request->get('estado'),
            'municipio' => $request->get('municipio'),
        ]);

        $deposito->save();

        if ($request->get('user_id') != '') {
            (new DepositoController)->editDeposito($deposito->id, User::find($request->get('user_id')));
        }

        Alert::success('Depósito', 'Se ha creado correctamente el depósito');

        return redirect()->route('adm.depositos.listar');
    }


    public function edit($id)
    {
        $deposito = Deposito::findOrFail($id);
        $usuarios = User::where('activo', 1)->where('nivel', 1)->get();
        $zonas = Zona::all();
        return view('adm.depositos.editar', compact('usuarios', 'deposito', 'zonas'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'zona_id' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
            'activo' => 'required',
        ]);

        $deposito = Deposito::findOrFail($id);

        $deposito->nombre = $request->get('nombre');
        $deposito->zona_id = $request->get('zona_id');
        $deposito->estado = $request->get('estado');
        $deposito->municipio = $request->get('municipio');
        $deposito->activo = $request->get('activo');


        if ($request->get('user_id') != null) {
            (new DepositoController)->editDeposito($deposito->id, User::find($request->get('user_id')));
        } else {
            $deposito->user_id = null;
        }

        $deposito->save();


        Alert::success('Depósito', 'Se ha modificado correctamente el depósito');
        return redirect()->route('adm.depositos.listar');
    }


    public function destroy($id)
    {

        Deposito::findOrFail($id)->delete();
        Alert::success('Depósito', 'Se ha eliminado correctamente el depósito');
        return redirect()->route('adm.depositos.listar');
    }



    public function editDeposito($depot, $usuario)
    {
        //Quitar usuario 
        $deposito = $usuario->deposito;
        if ($deposito != null) {
            $deposito->user_id = null;
            $deposito->save();
        }
        $deposito = Deposito::find($depot);

        if ($deposito != null) {
            $deposito->user_id = $usuario->id;
            $deposito->save();
        }
    }
}
