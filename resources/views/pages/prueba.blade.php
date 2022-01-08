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
            background-image: url("https://images.pexels.com/photos/669577/pexels-photo-669577.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"); /* fallback */
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
    </style>
</head>
<body>
    <h1 class="titulopro">Bienvenido {{ Auth::user()->name }}</h1>
    <p>
        Enhorabuena comprastes los siguientes articulos.
    </p>
    <p>
        <b>DATOS DEL COMPRADOR</b>
    </p>
    <p>
       {{--  @foreach ($shipping as $item)
        {{$item}}
            
        @endforeach --}}
        <b>Nombre: </b>{{$data['payment_id']}}<br>
      {{--   {{json_decode($comprador->ship_name)}} --}}
       {{--  <b>Teléfono: </b>{{$shipping->ship_phone}}<br>
        <b>Correo: </b>{{$shipping->ship_email}}<br>
        <b>Dirección de envío: </b>{{$shipping->ship_address}}<br>
        <b>Ciudad: </b>{{$shipping->ship_city}}<br> --}}
    </p>
    <p>
        <b>DATOS DE LA ORDEN</b>
    </p>
    <p>
       {{--  <b># Orden: </b>{{$shipping->order_id}}<br> --}}
        {{-- <b>Tipo de pago: </b>{{$orden->payment_id}}<br> --}}
      {{--   <b>Sub total: </b>{{$data->paying_amount}}<br>
        <b>Costo de envío: </b>{{$data->shipping}}<br>
        <b>Total de compra: </b>{{$data->total}}<br> --}}
    </p>
    <div>
        <p>
            <h1 class="titulo">Productos</h1>
          {{--   @foreach ($content as $item)
                <b>{{ $item->product_name }} </b> {{ $item->quantity }} <b>{{ $item->totalprice }}</b><br>
            @endforeach --}}
        </p>
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
