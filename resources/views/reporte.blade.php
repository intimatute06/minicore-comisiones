<h1>Reporte de comisiones</h1>


<form method="GET" action="/">
    <label for="desde">Desde</label>
    <input type="date" id="desde" name="desde" value="{{ $desde }}">

    <label for="hasta">Hasta</label>
    <input type="date" id="hasta" name="hasta" value="{{ $hasta }}">

    <button type="submit">Calcular</button>
</form>


@if (count($resultados) > 0)
<h2>Comisiones del {{ $desde }} al {{ $hasta }}</h2>

<table border="1">
    <thead>
        <tr>
            <th>Vendedor</th>
            <th>Total vendido</th>
            <th>% aplicado</th>
            <th>Comisión</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($resultados as $fila)
        <tr>
            <td>{{ $fila['nombre'] }}</td>
            <td>${{ number_format($fila['total'], 2) }}</td>
            <td>{{ number_format($fila['tasa'], 0) }} %</td>
            <td>${{ number_format($fila['comision'], 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif


<h2>Reglas de comisión</h2>
<ul>
    @foreach ($reglas as $regla)
    <li>Desde ${{ number_format($regla->monto_minimo, 2) }} → {{ number_format($regla->tasa, 0) }} %</li>
    @endforeach
</ul>


<h2>Vendedores</h2>
<ul>
    @foreach ($vendedores as $vendedor)
    <li>{{ $vendedor->nombre }} - {{ $vendedor->correo }}</li>
    @endforeach
</ul>