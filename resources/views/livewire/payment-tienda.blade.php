<div>

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

    <div style="margin-top: -50px" class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Productos del carrito</div>
                        <div class="cart_items">
                            <ul class="cart_list">

                                @forelse ($cart as $c)
                                    <div class="card mb-3 " style="max-width: 100%;">

                                        <div class="row no-gutters">
                                            <div class="col-4 col-sm-4 col-lg-2 text-center my-auto">
                                                <img style="width: 100px;" class="card-img"
                                                    src="{{ Storage::url($c->options->image) }}" alt="">
                                            </div>
                                            <div class="col-8 col-sm-8 col-lg-10">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $c->name }}</h5>
                                                    <div class="row">
                                                        <div class="col-12 col-lg-3 borde mt-2 ">
                                                            <p class="card-text"><b>Color:</b>&nbsp;
                                                                @if ($c->options->color == null)
                                                                @else
                                                                    {{ $c->options->color }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                            <p class="card-text"><b>Talla:</b>&nbsp;
                                                                @if ($c->options->size == null)
                                                                @else
                                                                    {{ $c->options->size }}
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2 ">
                                                            <p class="card-text"><b>Catidad:</b>{{ $c->qty }}</p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                            <p class="card-text">
                                                                <b>Precio:</b>&nbsp;${{ $c->price }}
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-lg-3 borde mt-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style=" color: white; width: 90px;"
                                                class="col-12 col-sm-8 col-lg-12 text-center">
                                                <div style="background: black; color: white; width: 40%; margin: auto;">
                                                    <b>Total:</b>&nbsp;$ {{ $c->price * $c->qty }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="cart_item_title">Al momento no tienes articulos agregados dirigete a la
                                        tienda para adquirir uno
                                    </div>
                                @endforelse
                            </ul>
                        </div>
                        <hr>
                        {{-- check para envio o recoger en la tienda --}}

                        <ul class="list-group col-lg-8" style="float: right;">
                            {{-- <li class="list-group-item">
                                <div class="btn-group btn-group-toggle d-flex justify-content-sm-center"
                                    data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="tipo" wire:click="$set('tipo', 'envio')">
                                        Envio
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="tipo" wire:click="$set('tipo', 'recoger')">
                                        Recoger en Tienda
                                    </label>
                                </div>
                            </li> --}}

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <label class="active">
                                            <b>Cargo de Envio</b>
                                        </label>
                                        <input type="radio" name="tipo" wire:click="$set('tipos', 'envio')"
                                            checked>
                                    </div>
                                    <div>
                                        <label class="pl-2">
                                            <b>Recoger en Tienda</b>
                                        </label>
                                        <input type="radio" name="tipo" wire:click="$set('tipos', 'recoger')">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item"><b>Costo de envio: <span style="float: right;">$
                                        {{ $envio }}
                                    </span></b></B>
                            </li>
                            <li class="list-group-item"><b>IVA: <span style="float: right;">Incluye IVA
                                </b></span>
                            </li>
                            <li class="list-group-item"><b>SubTotal: <span
                                        style="float: right;">${{ Cart::Subtotal() }}
                                </b></span>
                            </li>
                            {{-- <li class="list-group-item">Total : <span style="float: right;">${{ Cart::Subtotal() + $charge }} </span> </li> --}}
                            <li class="list-group-item"><b>Total a pagar:
                                    <span style="float: right;">${{ Cart::Subtotal() + $this->envio }}
                                </b></span>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- Seccion de ingreso de datos personales y direcciones --}}
                <div class="col-lg-4 ml-2"
                    style="border: 1px solid grey; padding: 20px; border-radius: 25px; color:black">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Datos de Envío</div>
                        <form wire:submit.prevent="payTienda" class="formulario" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label>Nombres completos</label>
                                <input type="text" id="name" class="form-control"
                                    placeholder="Ingresar nombres completos " autocomplete="off" required
                                    wire:model="name">
                                @error('name')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Teléfono / Celular</label>
                                <input type="number" id="phone" class="form-control"
                                    placeholder="Ingrese su telefono o celular" autocomplete="off" required
                                    wire:model="phone">
                                @error('phone')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" id="email" class="form-control"
                                    placeholder="Ingrese su correo electronico " autocomplete="off" required
                                    wire:model="email">
                                @error('email')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ciudad</label>
                                <input type="text" id="ciudad" class="form-control"
                                    placeholder="Ingrese el nombre de su ciudad" autocomplete="off" required
                                    wire:model.lazy="ciudad">
                                @error('ciudad')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dirección de entrega</label>
                                <input type="text" id="direction" class="form-control"
                                    placeholder="Ingrese su dirección domiciliaria" autocomplete="off" required
                                    wire:model.lazy="direction">
                                @error('direction')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <h6 class=" text-center py-2">Seleccione Método de Pago </h6>
                            <div wire:ignore>
                                <button id="pagadores" class="btn btn-sm btn-success btn-block mb-2 mt-1">
                                    Clic aquí para ver botones de pago
                                </button>
                                <div style="display: none" id="contenedor-botones">
                                    <label>
                                        <input type="radio" id="pago" name="payment-option" value="paypal">
                                        Paypal/Tarjeta de Debito/Crédito
                                        <div id="paypal-marks-container"></div>
                                    </label>
                                    <br>
                                    <label>
                                        <input type="radio" id="pago" name="payment-option"
                                            value="transferencia">
                                        Transferencia Bancaria
                                    </label>
                                    <div id="paypal-buttons-container"></div>
                                    <div id="alternate-button-container">
                                        <button wire:loading.remove type="submit" class="btn btn-primary btn-lg btn-block mb-1 mt-2">
                                            Transferencia Bancaria
                                        </button>
                                        <div wire:loading class="btn btn-secondary btn-lg btn-block mb-1 mt-2">
                                            Procesando la compra...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                        </form>
                        <p style="font-size: 10px; margin-top: 15px">
                            <b>Nota: </b> Las compras que esten dentro de la ciudad el envio sera gratuito los de fuera
                            de la ciudad tendran sobrecargo de envio
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
        <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD&locale=es_EC&components=buttons,marks"></script>
        <script>
            window.addEventListener('mensajetransferencia', event => {
                let timerInterval
                Swal.fire({
                    title: event.detail.title,
                    /* html: 'I will close in <b></b> milliseconds.', */
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            })
            document.body.querySelector('#contenedor-botones').style.display = 'none';
            document.body.querySelector('#paypal-buttons-container').style.display = 'none';

            const boton = document.getElementById("pagadores");
            const contenido = document.querySelector('#contenedor-botones');
            boton.addEventListener("click", function() {
                name = document.getElementById("name").value;
                phone = document.getElementById("phone").value;
                email = document.getElementById("email").value;
                ciudad = document.getElementById("ciudad").value;
                direction = document.getElementById("direction").value;

                if (name != "" && phone != "" && email != "" && ciudad != "" && direction != "") {
                    if (contenido.style.display === "none") {
                        contenido.style.display = 'block';
                        boton.innerHTML = "Clic aquí para ocultar botones de pago";
                    } else {
                        contenido.style.display = 'none';
                        boton.innerHTML = "Clic aquí para ver botones de pago";
                    }
                } else {
                    /* alert('Por favor llenar todos los campos del formulario de envio'); */
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'warning',
                        title: 'Se deben llenar todos los campos para continuar'
                    })
                }
            });

            paypal.Marks().render('#paypal-marks-container');
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        application_context: {
                            shipping_preference: "NO_SHIPPING"
                        },
                        payer: {
                            email_address: '{{ $email }}',
                            name: {
                                given_name: '{{ $name }}'
                            },
                            address: {
                                country_code: "EC"
                            }
                        },
                        purchase_units: [{
                            amount: {
                                value: '{{ Cart::Subtotal() + $this->envio }}'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        console.log(details);
                        /* const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: 'Su pago fue realizado con exito espere a ser redirigido'
                            }) */
                        let timerInterval
                        Swal.fire({
                            title: 'Su pago fue realizado con exito espere a ser redirigido en un momento ...',
                            /* html: 'I will close in <b></b> milliseconds.', */
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                        Livewire.emit('payTienda')
                    });
                },
                onCancel: function(data) {
                    /* alert('Canceló el pago la orden no fue procesada.'); */
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'warning',
                        title: 'Canceló el pago la orden no fue procesada'
                    })
                },
                onError: (err) => {
                    /* console.error('ESTE ES UN ERROR', err); */
                    /* alert('Ocurrió un problema vuelve a intentarlo mas tarde.'); */
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Ocurrió un problema vuelve a intentarlo mas tarde'
                    })
                }
            }).render('#paypal-buttons-container');

            // carga los botones del radio buttons
            document.querySelectorAll('input[name=payment-option]')
                .forEach(function(el) {
                    el.addEventListener('change', function(event) {
                        // cuando seleccione el boton de paypal
                        if (event.target.value === 'paypal') {
                            @this.set('tipopago', event.target.value);
                            document.body.querySelector('#alternate-button-container').style.display = 'none';
                            document.body.querySelector('#paypal-buttons-container').style.display = 'block';
                        }
                        // cuando seleccione el boton de transferencia
                        if (event.target.value === 'transferencia') {
                            @this.set('tipopago', event.target.value);
                            document.body.querySelector('#alternate-button-container').style.display = 'block';
                            document.body.querySelector('#paypal-buttons-container').style.display = 'none';
                        }
                    });
                });
            // oculta el boton de transferencia
            document.body.querySelector('#alternate-button-container').style.display = 'none';
        </script>
    @endpush
</div>
