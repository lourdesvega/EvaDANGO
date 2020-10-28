@extends('layouts.tabla')

@section('ttitle', 'Evaluación DANgo 2020')

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
<th>Macroproceso</th>
<th>Área</th>
<th>Descripción</th>
<th>Código</th>
<th>Descripción</th>
<th>Enero</th>
<th>Febrero</th>
<th>Marzo</th>
<th>Abril</th>
<th>Mayo</th>
<th>Junio</th>
<th>Julio</th>
@endsection

@section('tfoot')
<th>Macroproceso</th>
<th>Área</th>
<th>Descripción</th>
<th>Código</th>
<th>Descripción</th>
<th>Enero</th>
<th>Febrero</th>
<th>Marzo</th>
<th>Abril</th>
<th>Mayo</th>
<th>Junio</th>
<th>Julio</th>
@endsection

@section('tbody')
<tr>
    <td>
        2 - Manage Sourcing
    </td>


    <td>
        Finanzas
    </td>


    <td>
        Alta y Selección de Proveedores
    </td>


    <td>
        FIN_22
    </td>


    <td>
        2. EXISTENCIA Y VALUACION DE ACTIVOS FIJOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>

        2 - Manage Sourcing
        </th>


    <td>
        Finanzas
    </td>


    <td>
        Matriz de autorizaciones y Cumplimiento de ODC
        </th>


    <td>
        FIN_24
    </td>


    <td>
        5. VERDAD Y EQUIDAD DE P&L
    </td>


    <td>
        Riesgo Bajo con Observacion
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        2 - Manage Sourcing
    </td>


    <td>
        Finanzas
    </td>


    <td>
        Flujo de ODC
    </td>


    <td>
        FIN_52
    </td>


    <td>
        6. PROTECCIÓN DE EFECTIVO Y PAGOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Control de Recepcion de Embarques (Stock)
    </td>


    <td>
        FIN_64
    </td>


    <td>
        1. CONTRATACIÓN
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Control de PPED´s
    </td>


    <td>
        HR_11
    </td>


    <td>
        2. NÓMINAS Y COMPENSACIONES & BENEFICIOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Control de Inventarios en Consignacion
    </td>


    <td>
        HR_21
    </td>


    <td>
        2. NÓMINAS Y COMPENSACIONES & BENEFICIOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Inventario Ciclico y Anual
    </td>


    <td>
        HR_23
    </td>


    <td>
        4. SALIDA DE EMPLEADOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Reglas de Seguridad de Sitio
    </td>


    <td>
        HR_41
    </td>


    <td>
        4. SALIDA DE EMPLEADOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Politica de Devolución
    </td>


    <td>
        HR_51
    </td>


    <td>
        1. ADMINISTRACIÓN DEL INVENTARIO
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Contrato y KPI´S Proveedor Logistico
    </td>


    <td>
        OPE_11
    </td>


    <td>
        1. ADMINISTRACIÓN DEL INVENTARIO
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Seguimiento Fill Rate
    </td>


    <td>
        OPE_12
    </td>


    <td>
        2. PRODUCTOS Y PÉRDIDAS DE MATERIAL
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Transitos Pendientes y Seguimiento a
        Diferencias
        </th>


    <td>
        OPE_13
    </td>


    <td>
        2. PRODUCTOS Y PÉRDIDAS DE MATERIAL
    </td>


    <td>
        Riesgo Bajo con Observacion
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Monitoreo de Movimientos Sensibles
    </td>


    <td>
        OPE_14
    </td>


    <td>
        2. CONDICIONES DE PRECIO, FACTURACIÓN & NOTAS DE
        CRÉDITO
        </th>


    <td>
        Riesgo Bajo con Observacion
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Conciliacion de Carga VS HH
    </td>


    <td>
        OPE_22
    </td>


    <td>
        2. CONDICIONES DE PRECIO, FACTURACIÓN & NOTAS DE
        CRÉDITO
        </th>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Control de Inventarios Proveedor Logistico
    </td>


    <td>
        OPE_31
    </td>


    <td>
        4. GESTIÓN DE ACUERDOS COMERCIALES FUERA DE FACTURA
        & NEGOCIACIONES
        </th>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        3 - Forecast to Stock
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Control de Inventarios de Refacciones (Llantas y
        Rines)
        </th>


    <td>
        SAL_22
    </td>


    <td>
        4. ORDEN DE COMPRA Y RECEPCIÓN DE MERCANCIAS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        4 - Manage Sales
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Facturacion (Delivery)
    </td>


    <td>
        SAL_23
    </td>


    <td>
        4. ORDEN DE COMPRA Y RECEPCIÓN DE MERCANCIAS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        4 - Manage Sales
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Salidas de Inventario Vs Liquidacion
    </td>


    <td>
        SAL_42
    </td>


    <td>
        2. EXISTENCIA Y VALUACION DE ACTIVOS FIJOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        4 - Manage Sales
    </td>


    <td>
        Supply Chain
    </td>


    <td>
        Liquidaciones de Ruta (Saldos ASS y Proxy)
    </td>


    <td>
        SOU_41
    </td>


    <td>
        5. VERDAD Y EQUIDAD DE P&L
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
<tr>
    <td>
        4 - Manage Sales
    </td>


    <td>
        Finanzas
    </td>


    <td>
        Limites de Credito Clientes
    </td>


    <td>
        SOU_44
    </td>


    <td>
        6. PROTECCIÓN DE EFECTIVO Y PAGOS
    </td>


    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
    <td>
        Riesgo Bajo
    </td>
</tr>
@endsection