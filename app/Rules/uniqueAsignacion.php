<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Asignacion;

class uniqueAsignacion implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $mes;

    public function __construct($param)
    {
        $this->mes = $param;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $asignacion = Asignacion::where('anio', $value)->where('mes', $this->mes)->get();

        return $asignacion->toArray()===[];
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El periodo ya ha sido registrado';
    }
}
