@extends('layouts.tabla')

@section('ttitle', 'Autoevaluación Julio de 2020')

@section('buttons')
<br>
<div class=" row justify-content-md-center">
    <label class="col-3 col-form-label">Región</label>
    <div class="col-sm-2">
        <select name="mes" class="form-control">
            <option value="">Región I</option>
            <option value="">Región II</option>
            <option value="">Región III</option>
            <option value="">Región IV</option>
            <option value="">Región V</option>
            <option value="">Región VI</option>
        </select>
    </div>

    <label class="col-3 col-form-label">Depósito</label>
    <div class="col-sm-3">
        <select name="mes" class="form-control">
            <option value="">Tijuana</option>
            <option value="">Hermosillo 1</option>
            <option value="">Hermosillo 2</option>
            <option value="">Culiacán</option>
            <option value="">Obregón</option>
            <option value="">Mexicali</option>
        </select>
    </div>
</div>
@endsection

@section('thead')
<th>Control</th>
<th>Descripción</th>
<th>Evaluación</th>
<th>Compromiso</th>
<th>Responsable</th>
@endsection

@section('tfoot')
<th>Control</th>
<th>Descripción</th>
<th>Evaluación</th>
<th>Compromiso</th>
<th>Responsable</th>
@endsection

@section('tbody')
<tr>
    <td>FIN_22</td>
    <td>EXISTENCIA Y VALUACION DE ACTIVOS FIJOS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>FIN_24</td>
    <td>EXISTENCIA Y VALUACION DE ACTIVOS FIJOS</td>
    <td>Riesgo Bajo con Observacion</td>
    <td>Sigue en revisión por parte del área de vehículos la baja de unidades que ya no se
        encuentran en el sitio desde finanzas central</td>
    <td>Luis Gallegos</td>
</tr>
<tr>
    <td>FIN_52</td>
    <td>2 - Manage Sourcing</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>FIN_64</td>
    <td>6. PROTECCIÓN DE EFECTIVO Y PAGOS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>HR_11</td>
    <td>3. GESTIÓN DE CRÉDITO & RECOLECCIÓN DE EFECTIVO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>HR_21</td>
    <td>3. GESTIÓN DE CRÉDITO & RECOLECCIÓN DE EFECTIVO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>HR_23</td>
    <td>4. ORDEN DE COMPRA Y RECEPCIÓN DE MERCANCIAS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>HR_41</td>
    <td>1. CONTRATACIÓN</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>HR_51</td>
    <td>2. NÓMINAS Y COMPENSACIONES & BENEFICIOS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>OPE_11</td>
    <td>2. NÓMINAS Y COMPENSACIONES & BENEFICIOS</td>
    <td>Riesgo Bajo con Observacion</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>OPE_12</td>
    <td>4. SALIDA DE EMPLEADOS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>OPE_13</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Alto</td>
    <td>Prohibir la venta empleado a personal no autorizado perteneciente a Danone, ya se revisó con
        DHL y no se tendrán mas ventas para ellos.</td>
    <td>José Angel Torres</td>
</tr>
<tr>
    <td>OPE_14</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>OPE_22</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>OPE_31</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>SAL_22</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>SAL_23</td>
    <td>2. PRODUCTOS Y PÉRDIDAS DE MATERIAL</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>SAL_42</td>
    <td>2 - Manage Sourcing</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>SOU_41</td>
    <td>4. ORDEN DE COMPRA Y RECEPCIÓN DE MERCANCIAS</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>
<tr>
    <td>SOU_44</td>
    <td>1. ADMINISTRACIÓN DEL INVENTARIO</td>
    <td>Riesgo Bajo</td>
    <td>Mantener</td>
    <td>0</td>
</tr>

@endsection

