<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ceros($movimiento->numero) }}</title>
    <style >
        td p{
            margin: 0;
        }
        .badge{
            background-color: rgb(42, 92, 152);
            color: #fff;
            display: inline-block;
            padding-left: 8px;
            padding-right: 8px;
            text-align: center;
            border-radius: 7px;
        }
        h3{
            padding: 0px;
            margin: 0px;
        }
        .separador{
            background-color: rgb(68, 119, 164);
            color: #fff;
            border: 2px solid rgb(4, 33, 74);
        }
        .contenido{
            border: 2px solid rgb(4, 33, 74);
        }
        h2{
            text-align: center;
            margin: 0;
            text-transform: uppercase;
        }
        p{
            font-size: 13px;
        }
    </style>
</head>
<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 50% ; border: 3px solid black" >
                <table>
                    <tr>
                        <td style="width: 80%">
                            <h2 >{{ $movimiento->tmovimiento->nombre }}</h2>
                        </td>
                        <td>
                            <p>
                                <b>Fecha: </b>{{ date('d-m-Y',strtotime($movimiento->fecha)) }}
                            </p>
                            <p>
                                <b>Hora: </b>{{ date('h:i:s A',strtotime($movimiento->hora)) }}
                            </p>
                            <p>
                                <b>Número: </b>{{ ceros($movimiento->numero) }}
                            </p> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>1. Datos del Solicitante</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%" >
                                <tr>
                                    <td style="width: 30%"><b>Apellidos,</b> Nombres</td>
                                    <td style="border: 1px solid black"><b>{{ $movimiento->cliente->apellido }},</b> {{ $movimiento->cliente->nombre }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>DNI</b></td>
                                    <td style="border: 1px solid black"><b>{{ $movimiento->cliente->dniRuc }}</b></td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>2. Datos del Almacenero</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 30%"><b>Nombres</b></td>
                                    <td style="border: 1px solid black">{{ $movimiento->user->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Correo</b></td>
                                    <td style="border: 1px solid black">{{ $movimiento->user->email }}</td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>3. Lista de Items</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%">
                                <thead>
                                    <tr style="text-align: left">
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimiento->detalles as $detalle)
                                        @if($detalle->item->item_id == null)                                    
                                        <tr @if (count($detalle->item->hijos) != 0) class="bg-info" @endif>
                                            <td>{{ $detalle->item->codigo }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>{{ $detalle->item->titem->nombre }} - {{ $detalle->item->marca->nombre }} - {{ $detalle->item->descripcion }} <span class="badge">{{ count($detalle->item->hijos) }} items</span></td>
                                        </tr>
                                        @if (count($detalle->item->hijos) != 0)
                                                <tr>
                                                    <td></td>
                                                    <td colspan="4">
                                                        <ul style="margin: 0px">
                                                            @foreach ($detalle->item->hijos as $hijo)
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                                                            {{ $hijo->codigo }} - {{ $detalle->cantidad }} - {{ $hijo->descripcion }}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                </tr>
                                        @endif
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>4. Firmas</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%; margin-top: 50px">
                                <tr style="text-align: center">
                                    <td style="width: 50%"><b>_____________</b></td>
                                    <td style="width: 50%"><b>_____________</b></td>
                                </tr>
                                <tr style="text-align: center">
                                    <td style="width: 50%"><b>Solicitante</b></td>
                                    <td style="width: 50%"><b>Almacenero</b></td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                </table>
            </td>
            <td style="width: 50% ; border: 3px solid black" >
                <table>
                    <tr>
                        <td style="width: 80%">
                            <h2 >{{ $movimiento->tmovimiento->nombre }}</h2>
                        </td>
                        <td>
                            <p>
                                <b>Fecha: </b>{{ date('d-m-Y',strtotime($movimiento->fecha)) }}
                            </p>
                            <p>
                                <b>Hora: </b>{{ date('h:i:s A',strtotime($movimiento->hora)) }}
                            </p>
                            <p>
                                <b>Número: </b>{{ ceros($movimiento->numero) }}
                            </p> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>1. Datos del Solicitante</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%" >
                                <tr>
                                    <td style="width: 30%"><b>Apellidos,</b> Nombres</td>
                                    <td style="border: 1px solid black"><b>{{ $movimiento->cliente->apellido }},</b> {{ $movimiento->cliente->nombre }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>DNI</b></td>
                                    <td style="border: 1px solid black"><b>{{ $movimiento->cliente->dniRuc }}</b></td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>2. Datos del Almacenero</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 30%"><b>Nombres</b></td>
                                    <td style="border: 1px solid black">{{ $movimiento->user->name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 30%"><b>Correo</b></td>
                                    <td style="border: 1px solid black">{{ $movimiento->user->email }}</td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>3. Lista de Items</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%">
                                <thead>
                                    <tr style="text-align: left">
                                        <th>Codigo</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimiento->detalles as $detalle)
                                    @if($detalle->item->item_id == null) 
                                        <tr @if (count($detalle->item->hijos) != 0) class="bg-info" @endif>
                                            <td>{{ $detalle->item->codigo }}</td>
                                            <td>{{ $detalle->cantidad }}</td>
                                            <td>{{ $detalle->item->titem->nombre }} - {{ $detalle->item->marca->nombre }} - {{ $detalle->item->descripcion }} <span class="badge">{{ count($detalle->item->hijos) }} items</span></td>
                                        </tr>
                                        @if (count($detalle->item->hijos) != 0)
                                            <tr>
                                                <td></td>
                                                <td colspan="4">
                                                    <ul style="margin: 0px">
                                                        @foreach ($detalle->item->hijos as $hijo)
                                                            <li class="list-group-item">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        {{ $hijo->codigo }} - {{ $detalle->cantidad }} - {{ $hijo->descripcion }}
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="2" class="separador"><h3>4. Firmas</h3></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="contenido">
                            <table style="width: 100%; margin-top: 50px">
                                <tr style="text-align: center">
                                    <td style="width: 50%"><b>_____________</b></td>
                                    <td style="width: 50%"><b>_____________</b></td>
                                </tr>
                                <tr style="text-align: center">
                                    <td style="width: 50%"><b>Solicitante</b></td>
                                    <td style="width: 50%"><b>Almacenero</b></td>
                                </tr>
                            </table>
                        </td> 
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>