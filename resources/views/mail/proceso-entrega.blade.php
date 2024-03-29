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
    <h1 class="titulopro">Saludos {{$orden->name}}</h1>
    <p>
        Enhorabuena tu orden esta en proceso de entrega, en el lapso de 24 a 48 horas, tu orden estara en tus manos,
        gracias por preferirnos.
    </p>
    <p>
        <b>Numero de orden: </b>{{ formatOrderNumber($orden->id) }} <br>
        <b>Tipo de pago: </b>{{$orden->payment_id}}<br>
        <b>Costo de envio: </b> ${{number_format($orden->shipping, 2)}} <br>
        <b>Total de la orden: </b> ${{number_format($orden->total, 2)}} <br>
        <b>Fecha de compra: </b>{{$orden->created_at}} <br>
        <b>Estado de la orden: </b>
        @if ($orden->status = 2)
            <span style="color: green">Proceso de entrega</span>
        @endif
        <br>
    </p>
    <div>
        <div>
            <p><b>Nota: </b>En caso de que su orden no le haya llego dentro del lapso de tiempo establecido, por favor ponerse en contacto con nosotros a nuestro numero celular o correo
                electronico especificado en la parte inferior de este correo. 
            </p>
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
