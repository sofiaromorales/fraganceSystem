@extends('master')

@section('title','Fragance System')
@section('pageTitle', 'Compras')

@section('content')

    <div class='PedidoDetail row  mt-5'>
        <div class='col-12'>
            <h3>
                Pedido
            </h3>
            <h5>
                Productor: {{$productor->nombre}}
                <br/>
                Proveedor: {{$proveedor->nombre}}
            </h5>
            <p>
                Fecha emisión: {{$pedido->fecha_creacion}}
                <br/>
                Fecha aprobada: {{$pedido->fecha_recibido}}
            </p>
        </div>
        <div class ='col-12 mt-5'>
            <h5>
                Ingredientes pedidos
            </h5>
        </div>
            @foreach ($ingredientes as $producto)
            @if(count($producto) != 0)

            <div class='col-4 p-4'>
                <div class='card bg-white p-0'>
                    <div class='productCard card-img-top'>
                    </div>
                    <div class='card-body'>
                        <div class='text-secondary'>
                            <p class='font-weight-bold'>
                                {{$producto[0]->nombre}}
                                <br/>
                                {{$producto[0]->volml}} ml - $ {{$producto[0]->precio}}
                                <br/>
                                {{$producto[0]->otro}}
                                <br/>
                                Cantidad: {{$producto[0]->cantidad}}
                            </p>
                            <div class='row '>
                                <div class='col'>
                                    Nombre alternativo
                                </div>
                                <div class='col'>
                                    {{$producto[0]->nombre_alternativo}}
                                </div>
                                <div class='col-12'>
                                    <hr/>
                                </div>
                            </div>
                            <div class='row'>
                            <div class='col'>
                                    Numero IPC
                                </div>
                                <div class='col'>
                                    {{$producto[0]->num_ipc}}
                                </div>
                                <div class='col-12'>
                                    <hr/>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    Numero TSCA_CAS
                                </div>
                                <div class='col'>
                                    {{$producto[0]->num_tsca_cas}}
                                </div>
                                <div class='col-12'>
                                <hr/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
        <div class ='col-12 mt-5'>
            <h5>
                Ingredientes otros
            </h5>
        </div>
        @foreach ($ingredientes_otros as $producto)
            @if(count($producto) != 0)

                <div class='col-4 p-4'>
                    <div class='card bg-white p-0'>
                        <div class='productCard card-img-top'>
                        </div>
                        <div class='card-body'>
                            <div class='text-secondary'>
                                <p class='font-weight-bold'>
                                    {{$producto[0]->nombre}}
                                    <br/>
                                    {{$producto[0]->volml}} ml - $ {{$producto[0]->precio}}
                                    <br/>
                                    {{$producto[0]->otro}}
                                    <br/>
                                    Cantidad: {{$producto[0]->cantidad}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        <div class ='col-12 mt-5'>
            <h5 class='mb-5'>
                Método de pago
            </h5>
            <div class='row text-secondary mb-5 font-weight-bold'>
                <div class='col'>
                    Tipo
                </div>
                <div class='col'>
                    Número de cuotas
                </div>
                <div class='col'>
                    Porcentajes
                </div>
            </div>
            @for($i=0; $i < count($metodos_pago); $i++)
                    <div class='row text-secondary'>
                        <div class='tipoPago col'>
                            @if ($metodos_pago[$i]->cantidad_cuotas != null)
                                @if ($i == 0)
                                    {{$metodos_pago[$i]->tipo}}
                                @else
                                    @if ($metodos_pago[$i]->cod_cond_pago != $metodos_pago[$i - 1]->cod_cond_pago)
                                        {{$metodos_pago[$i]->tipo}}
                                    @endif
                                @endif
                            @else
                                {{$metodos_pago[$i]->tipo}}
                            @endif
                        </div>
                        <div class='cantCuotas col'>
                            @if ($metodos_pago[$i]->cantidad_cuotas != null)
                                @if ($i == 0)
                                    {{$metodos_pago[$i]->cantidad_cuotas}}
                                @else
                                    @if ($metodos_pago[$i]->cod_cond_pago != $metodos_pago[$i - 1]->cod_cond_pago)
                                        {{$metodos_pago[$i]->cantidad_cuotas}}
                                    @endif
                                @endif
                            @else
                                1
                            @endif
                        </div>
                        <div class='porcentajeCuotas col'>
                            @if ($metodos_pago[$i]->cantidad_cuotas != null)

                                    <p class='font-weight-bold mb-0'>
                                        Pago {{$i + 1}}:
                                    </p>
                                        {{$metodos_pago[$i]->porcentaje_pago}} %  ‣ $ {{$pedido->total * ($metodos_pago[$i]->porcentaje_pago / 100)}}
                                    <p class='font-weight-bold mb-0'>
                                        Recargo:
                                    </p>
                                    {{$metodos_pago[$i]->porcentaje_recargo}} %  + $ {{$pedido->total * ($metodos_pago[$i]->porcentaje_recargo / 100)}}
                                    <p class='font-weight-bold mb-0'>
                                        Descuento:
                                    </p>
                                    {{$metodos_pago[$i]->porcentaje_descuento}} %  - $ {{$pedido->total * ($metodos_pago[$i]->porcentaje_descuento / 100)}}
                            @else
                            <p class='font-weight-bold mb-0'>
                                Pago:
                            </p>
                                100 %
                            @endif
                        </div>
                        <div class='col-12'>
                            <hr/>
                        </div>
                    </div>
            @endfor

        </div>
        <div class='col-12 mt-5'>
            <h5>
            Envio
            </h5>
            <div class='row text-secondary font-weight-bold mt-3'>
                <div class='col'>
                    País
                </div>
                <div class='col'>
                    Tipo de envío
                </div>
                <div class='col'>
                    Precio
                </div>
                <div class='col'>
                </div>
            </div>
            <div class='row text-secondary mt-3 mb-5'>
                <div class='col'>
                    {{$envio[0]->nombre}}
                </div>
                <div class='col'>
                    {{$envio[0]->tipo_transporte}}
                </div>
                <div class='col'>
                    $ {{$envio[0]->costo}}
                </div>
                <div class='col'>
                </div>
            </div>
        </div>
        <div class='col-12 my-5'>
            <h5>
                Monto total
            </h5>
            <p class='font-weight-bold'>
            $ {{$pedido->total}}
            </p>
        </div>
        <div class='col-12 mb-5'>
            @if ($pedido->fecha_recibido == null && $pedido->estado == 1)
            <a href='/Compras/pedido/detalle/recibido/{{$productor->id}}/{{$proveedor->id}}/{{$pedido->codigo}}'>
                <button type='submit' class="btn btn-info">
                    Recibido
                </button>
            </a>
            @endif
        </div>
    </div>

@endsection
