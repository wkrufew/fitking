<!DOCTYPE html>
<html lang="es">

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
    <h1 class="titulopro">Saludos {{ $shipping->ship_name }}</h1>
     <p>
        Enhorabuena tu orden fue aprobada y receptado el pago en breve se procedera a despachar su pedido, gracias por preferirnos.
    </p>
    
        <div class="barra">
            <hr>
            <b>DATOS DE LA ORDEN</b>
            <hr>
        </div>
       
    </p>
    <p>
        |&nbsp; &nbsp; <b># Orden: </b>{{ formatOrderNumber($shipping->order_id)}}<br>
        |&nbsp; &nbsp; <b>Comprador: </b>{{ $shipping->ship_name }}<br>
        |&nbsp; &nbsp; <b>Teléfono: </b>{{ $shipping->ship_phone }}<br>
        |&nbsp; &nbsp; <b>Correo: </b>{{ $shipping->ship_email }}<br>
        |&nbsp; &nbsp; <b>Tipo de pago: </b>{{ $data->payment_id }}<br>
        |&nbsp; &nbsp; <b>Ciudad: </b>{{ $shipping->ship_city }}<br>
        |&nbsp; &nbsp; <b>Dirección de envío: </b>{{ $shipping->ship_address }}<br>
        |&nbsp; &nbsp; <b>Fecha compra: </b>{{ $data->created_at }}<br>
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
            @foreach ($product as $item)
                <div>
                    @if ($loop->first)
                    
                    @else
                        <hr>
                    @endif

                    |&nbsp; &nbsp; <b># {{ $contador = $contador + 1 }}</b> <br>
                    |&nbsp; &nbsp; <b>Producto:</b> {{ $item->product_name }} <br>
                    |&nbsp; &nbsp; <b>Cantidad:</b> {{ $item->quantity }} <br>
                    |&nbsp; &nbsp; <b>Precio unidad:</b> ${{ number_format($item->singleprice, 2) }} <br>
                    |&nbsp; &nbsp; <b>Total:</b> ${{ number_format(($item->quantity * $item->singleprice), 2) }} <br>

                </div>
            @endforeach
                
                <div class="barra">
                    <hr>
                       <b>Sub total: </b> $ {{ $data->subtotal }}<br>
                       
                       @if ($data->shipping == 0)
                            <b>Sin Costo de envio debe recoger sus productos en la tienda </b> <br>
                       @else
                            <b>Costo de envío: </b> ${{ number_format($data->shipping, 2) }}<br>
                       @endif
                       <b>Total de compra: </b> $ {{ number_format($data->total, 2) }}<br> 
                    <hr>
                </div>
                <p><b>Nota: </b>Su compra esta siendo procesada los estados de la orden estan indicados en su perfil de tienda cuando el productos este 
                    en proceso de entrega le sera notificado mediante correo electronico official de la tienda. 
                    
                </p>
            <p>

        </div>
    </div>
    
    <br>
    <div class="espacio">
        <h2 class="titulo9"><strong>FitKig</strong></h2>
        <p>Los mejores planes y productos para tu físico ideal</p>
        <p>
            <b>Teléfono:</b> <a class="titulo1" href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a><br>
            <b>E-mail:</b> <a class="titulo1" href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a><br>
            <b>Web:</b> <a class="titulo1" href="https://{{$_SERVER [ 'HTTP_HOST' ];}}" target="_blank"
                rel="noopener noreferrer"></a>{{$_SERVER [ 'HTTP_HOST' ];}}
        </p>
    </div>
</body>

</html>
