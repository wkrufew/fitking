<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitKing</title>

    <style>
        h1 {
            color: rgb(0, 0, 0);
            padding: 0px;
            margin: 0px;
        }

        strong {
            color: white;
        }

        a {
            color: white;
        }

        .espacio {
            color: white;
            background-image: url("https://images.pexels.com/photos/669577/pexels-photo-669577.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            /* fallback */
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            width: 100%;
            height: auto;
            padding: 15px;
        }

        .titulo {
            text: rgb(0, 0, 0);
            size: 1.2rem;
            margin-bottom: 3px;
            text-decoration: underline;
        }

        .titulopro {
            text: rgb(0, 0, 0);
            size: 1.4rem;
        }

        .titulo1 {
            text: white;
            size: 1.8rem;
        }

        .titulo9 {
            text: white;
            size: 2.2rem;
        }
        .barra{
            background-color: black;
            color: white;
           
            width: 100%;
            max-width: 100%;
            text-align: center
            
        }

    </style>
</head>

<body>
    <h1 class="titulopro">Saludos {{ Auth::user()->name }}</h1>
    <p>
        Enhorabuena tus productos adquiridos estan en un estado de espera hasta efectuar la transferencia o deposito 
        y envies el comprobante al correo o whatsapp que se detallan acontinuacion.
    </p>
    <p>
        <b>Nombre del beneficiario: </b>Stalin Pilco <br>
        <b>Banco: </b>PICHINCHA<br>
        <b># Cuenta: </b>00000000000000 <br>
        <b>Tipo de cuenta: </b>Ahorros <br>
        <b>Cédula: </b>060000000000 <br>
        <b>Correo:</b>stalin@hotmail.com <br>
        <b>Whatsapp:</b>09999999999
    </p>
    
        <div class="barra">
            <hr>
            <b>DATOS DE LA ORDEN</b>
            <hr>
        </div>
       
    </p>
    <p>
        |&nbsp; &nbsp; <b># Orden: </b>{{ formatOrderNumber($shipping['order_id']) }}<br>
        |&nbsp; &nbsp; <b>Comprador: </b>{{ $shipping['ship_name'] }}<br>
        |&nbsp; &nbsp; <b>Teléfono: </b>{{ $shipping['ship_phone'] }}<br>
        |&nbsp; &nbsp; <b>Correo: </b>{{ $shipping['ship_email'] }}<br>
        |&nbsp; &nbsp; <b>Tipo de pago: </b>{{ $data['payment_id'] }}<br>
        |&nbsp; &nbsp; <b>Ciudad: </b>{{ $shipping['ship_city'] }}<br>
        |&nbsp; &nbsp; <b>Dirección de envío: </b>{{ $shipping['ship_address'] }}<br>
        |&nbsp; &nbsp; <b>Fecha compra: </b>{{ $data['created_at'] }}<br>
    </p>
    <div>
        <div>
           
            <p>
                <div class="barra">
                    <hr>
                    <b>DATOS DE LOS PRODUCTOS</b>
                    <hr>
                </div>
            </p>
            @php
                $contador = 0;
            @endphp
            @foreach ($content as $item)
                <div>
                    @if ($loop->first)
                    
                    @else
                        <hr>
                    @endif

                    |&nbsp; &nbsp; <b># {{ $contador = $contador + 1 }}</b> <br>
                    |&nbsp; &nbsp; <b>Producto:</b> {{ $item->name }} <br>
                    |&nbsp; &nbsp; <b>Cantidad:</b> {{ $item->qty }} <br>
                    |&nbsp; &nbsp; <b>Precio unidad:</b> ${{ number_format($item->price, 2) }} <br>
                    |&nbsp; &nbsp; <b>Total:</b> ${{ number_format(($item->qty * $item->price), 2) }} <br>

                    {{-- @if ($loop->last)
                    @else
                    <hr>
                    @endif --}}
                </div>
            @endforeach

                <div class="barra">
                    <hr>
                       <b>Sub total: </b> ${{ $data['paying_amount'] }}<br>
                       <b>Costo de envío: </b> ${{ number_format($data['shipping'], 2) }}<br>
                       <b>Total de compra: </b> $ {{ number_format($data['total'], 2) }}<br> 
                    <hr>
                </div>
                <p><b>Nota: </b> Su orden estara vigente 72 horas apartir de la reserva luego de eso su orden sera cancelada, 
                    en caso de duda por favor comunicarse a nuestro teléfono o correo electrónico especificado en la parte final de este correo.
                </p>
            <p>

        </div>
    </div>
    <br>
    <div class="espacio">
        <h2 class="titulo9"><strong>FitKig</strong></h2>
        <p>Los mejores planes y productos para tu físico ideal</p>
        <p>
            <b>Teléfono:</b> <a class="titulo1" href="tel:+ 1 (203) 948-4970">+ 593 983935029</a><br>
            <b>E-mail:</b> <a class="titulo1" href="mailto:admin@dr-pools.com">fitking@gmail.com</a><br>
            <b>Web:</b> <a class="titulo1" href="http://www.dr-pools.com" target="_blank"
                rel="noopener noreferrer"></a>www.fitking.com
        </p>
    </div>
</body>

</html>
