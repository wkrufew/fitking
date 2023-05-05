<div>
    <section class="bg-black">
        <div class=" py-24 bg-cover bg-black mt-0"
            style="background-color: black;  background-image: url({{ asset('img/home/sports.jpg') }})">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="w-full md:w-3/4 lg:w-1/2 ">
                    <h1 class="text-white font-bolt text-5xl mb-2">Planes FitKing</h1>
                    <p class="text-white font-bolt   text-3xl mb-4">Has tomado una buena desición al adquirir este
                        grandioso plan
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="bg-white shadow-lg py-2 px-4 rounded-lg mb-6">
                <h1 class="text-gray-800 text-lg text-center font-bold">Paso Final de Compra</h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 md:gap-x-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-gray-800 text-lg text-center font-bold">Detalles de la compra</h1>
                        <hr class="my-2">
                        <figure>
                            <img class="shadow-lg rounded-lg w-full h-auto object-cover"
                                src="{{ Storage::url($plan->image->url) }}" alt="">
                        </figure>
                        <div class="py-6 space-y-3">
                            <h1 class="text-gray-800 font-bold text-lg uppercase">{{ $plan->title }}</h1>
                            <p class="font-bold text-xl text-green-600">$ {{ $plan->price->value }}</p>
                            <hr class="my-4">
                            <p style="font-size: 70%" class=" text-gray-500 text-justify"><b>Nota:&nbsp;</b>
                                Al comprar el plan no se aceptarán devoluciones, debido a que la información del plan ya
                                estaría expuesta, la información
                                impartida dentro del sistema no se pueden divulgar por los términos y condiciones de
                                FitKing.<br>
                                Si compras con paypal estarás automáticamente matriculado en el plan y podrás iniciar tu
                                entrenamiento personalizado<br>
                                Si compras con mediante transferencia bancaria deberás registrarte y realizar el
                                depósito bancario y enviar el comprobante
                                a los correos oficiales y esperar 24 horas para hacer efectiva la matricula.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-gray-800 text-lg text-center font-bold">Metodos de Pago</h1>
                        <hr class="my-2">
                        <div class="py-2">
                            <a href="{{ route('payment.cash', $plan) }}"
                                class=" flex justify-center transition w-full text-center py-2.5 bg-blue-500 text-white rounded-sm shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                <span>
                                    <i class="fa-solid fa-money-check-dollar h-6 w-auto pr-1"></i>
                                </span> <span>Transferencia bancaria</span>
                            </a>
                        </div>
                        <div class="py-2 z-40">
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('js')
            <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>
            <script
                src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD&locale=es_EC">
            </script>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            application_context: {
                                shipping_preference: "NO_SHIPPING"
                            },
                            payer: {
                                email_address: '{{ auth()->user()->email }}',
                                name: {
                                    given_name: '{{ auth()->user()->name }}'
                                },
                                address: {
                                    country_code: "EC"
                                }
                            },
                            purchase_units: [{
                                amount: {
                                    value: '{{ $plan->price->value }}'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
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
                            Livewire.emit('payPlan')
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
                }).render('#paypal-button-container');
            </script>
        @endpush
    </section>
</div>
