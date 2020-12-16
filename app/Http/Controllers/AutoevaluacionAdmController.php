<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoevaluacion;
use App\Asignacion;
use App\Message;
use App\User;
use App\Notifications\Notificar;
use App\Notifications\Devolver;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;



class AutoevaluacionAdmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adm');
    }

    public function index($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        return view('adm.autoevaluaciones.listar', compact('asignacion'));
    }

    public function show($id)
    {
        $autoevaluacion = Autoevaluacion::findOrFail($id);
        return view('adm.autoevaluaciones.ver', compact('autoevaluacion'));
    }

    public function updateEstatus($id, $estatus)
    {

        $asignacion = Asignacion::find($id);
        $asignacion->estatus = $estatus;
        $asignacion->save();
    }

    public function notificar(Request $request)
    {
        //0 notificar 2 devolver
        $user = User::where('email', $request->destino)->first();
        $autoevaluacion = Autoevaluacion::find($request->id);


        if ($request->val == 0) {
            Notification::send($user, new Notificar($request->msj));
        } else if ($request->val == 2) {
            Notification::send($user, new Devolver($request->msj));
            $autoevaluacion->estatus = 2;
            $asignacion = $autoevaluacion->asignacion;
            $asignacion->completado = $asignacion->completado - 1;
            $asignacion->estatus = 0;
            $autoevaluacion->save();
            $asignacion->save();
        }
    }


    public function cancelar(Request $request)
    {
        $autoevaluacion = Autoevaluacion::find($request->id);
        $autoevaluacion->estatus = 1;
        $asignacion = $autoevaluacion->asignacion;
        $asignacion->completado = $asignacion->completado + 1;
        if ($asignacion->total == $asignacion->completado) {
            $asignacion->estatus = 1;
        }
        $autoevaluacion->save();
        $asignacion->save();
    }

    public function destroy($id){
        $autoevaluacion=Autoevaluacion::find($id);
        //
        
        $asignacion = $autoevaluacion->asignacion;
        if($autoevaluacion->estatus==1){
            $asignacion->completado = $asignacion->completado - 1;
        }
        $asignacion->total = $asignacion->total-1;

        if ($asignacion->total == $asignacion->completado) {
            $asignacion->estatus = 1;
        }
        $asignacion->save();


        Autoevaluacion::find($id)->delete();

        Alert::success('Autoevaluación', 'Se ha eliminado correctamente la autoevaluación');
        return redirect()->route('adm.autoevaluaciones.listar', $autoevaluacion->asignacion->id);


    }

    public function mensaje()
    {
        // dd('kjdfj');
        //  $request->destino->notify(new Mensajes($request->msj));

        // send notification using the "Notification" facade
        $user = User::find(2);
        return (new Devolver("Faltan evidencias, favor de subirlas"))->toMail($user);

        //Notification::send($user, new Notificar("holi"));
        //return compact('destino', 'msj');

    }
}
