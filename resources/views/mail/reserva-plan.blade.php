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
    <h1 class="titulopro">Bienvenido a FitKing, {{ Auth::user()->name }}.</h1>
    <p>
        Enhorabuena por reservar el plan, {{ $plan->title }} en cuanto realices la transferencia bancaria a los datos a 
        continuación y envies el comprobante de la transacción o deposito al correo o whatsapp se realizará tu asignación al Plan elegido.
    </p>

    <p>
        <b>Nombre del beneficiario: </b>Stalin Pilco <br>
        <b>Banco: </b>PICHINCHA<br>
        <b># Cuenta: </b>00000000000000 <br>
        <b>Tipo de cuenta: </b>Ahorros <br>
        <b>Cédula: </b>060000000000 <br>
        <b>Correo: </b>stalin@hotmail.com<br>
        <b>Whatsapp: </b>099999999999<br> 
    </p>
    <p>
        <b>Nota: </b> Si el deposito o transferencia no se realiza dentro de las 72 horas de creada la reserva se elimnara su reserva. 
    </p>
    <p>
        Gracias por preferirnos y dejar en nuestras manos el poder llevarte al siguiente nivel y ser parte del Team King.
    </p>
    <div>
        <p>
        <h1 class="titulo">Datos del plan</h1>
        <b>Plan:</b> {{ $plan->title }}
        <br>
        <b>Descripcion:</b> {{ $plan->description }}
        <br>
        <b>Precio:</b> ${{ $plan->price->value }}
        <br>
        <b>Instructor:</b> {{ $plan->teacher->name }}
        <br>
        </p>
    </div>
    <br>
    <div class="espacio">
        <h2 class="titulo9"><strong>FitKig</strong></h2>
        <p>Los mejores planes y productos para tu fisico ideal</p>
        <p>
            <b>Telefono:</b> <a class="titulo1" href="tel:+ 1 (203) 948-4970">+ 593 983935029</a><br>
            <b>E-mail:</b> <a class="titulo1" href="mailto:admin@dr-pools.com">fitking@gmail.com</a><br>
            <b>Web:</b> <a class="titulo1" href="http://www.dr-pools.com" target="_blank"
                rel="noopener noreferrer"></a>www.fitking.com
        </p>

    </div>

</body>

</html>
