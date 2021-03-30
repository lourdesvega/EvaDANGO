<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Deposito;
use App\Autoevaluacion;
use App\Notifications\NAutoevaluacion;
use Illuminate\Support\Facades\Notification;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $mensaje;
    protected $id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje, $id)
    {
        $this->mensaje = $mensaje;
        $this->id = $id;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // $usuarios = User::find(2);
        $asignacion = $this->id;
        $usuarios = User::whereIn('id', function ($query) use ($asignacion) {
            $query->select('user_id')
                ->from(with(new Deposito)->getTable())
                ->whereIn('id', function ($query) use ($asignacion) {
                    $query->select('deposito_id')
                        ->from(with(new Autoevaluacion)->getTable())
                        ->where('asignacion_id', $asignacion);
                });
        })->get();



        Notification::send($usuarios, new NAutoevaluacion($this->mensaje));
    }
}
