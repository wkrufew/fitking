<x-app-layout>
    <section class="bg-black ">
        <div class=" py-24 bg-cover bg-black mt-0" style=" background-color: black; box-shadow: 0 0 8px 6px black inset; background-image: url({{asset('img/home/sports.jpg')}})">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <div class="w-full md:w-3/4 lg:w-1/2 ">
                    <h1  class="text-white font-bolt text-5xl mb-2">Planes FitKing</h1>
                    <p  class="text-white font-bolt   text-3xl mb-4">Has tomado una buena desicion al desear comprar este plan</p>
    
                </div>
            </div>
        </div>
        
    </section>

    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6  py-6 ">
            
                {{-- <div class="card">
                    <div class="card-body">
                        <article class="flex items-center justify-items-center">
                            <img class="shadow-lg rounded-lg w-40 h-24 object-cover" src="{{Storage::url($plan->image->url)}}" alt="">
                            
                            <h1 class="text-gray-600 text-lg ml-4">{{$plan->title}}</h1>
                            <p class="text-gray-500 font-bold ml-auto">$  {{$plan->price->value}}</p>
                        </article>
                        <hr class="my-4">
                        <h1 class="text-gray-600 text-center text-lg ml-4"> <strong>Estas a un clic de reservar tu plan {{ Auth::user()->name }}</strong></h1>
                        <hr class="my-4">
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Nombre del beneficiario:</strong> Stalin Pilco</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Banco:</strong> PICHINCHA</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Numero de cuenta:</strong> 00000000000000</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Tipo de cuenta:</strong> Ahorro</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Cedula:</strong> 06000000000</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Correo:</strong> stalin@hotmail.com</h1>
                        <h1 class="text-gray-600  ml-4 text-center"><strong>Whatsapp:</strong> 09999999999</h1>
                        <hr class="my-4">
                            
                            <h1 class="text-gray-600  ml-4 text-center"><strong>Observacion:</strong> Realiza la captura de los datos de arriba incluido el precio 
                                para el deposito correspondiente y enviar la foto del comprobante al whatsapp especificado para finalizar la compra</h1>
                            
                            <hr class="my-4">
                        
                        <div class="justify-items-center">
                            <form action="{{ route('payment.pago', $plan) }}" method="POST">
                                @csrf 
                                <button type="submit" class="text-center transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 btn btn-primary btn-block mt-4">Reservar Plan</button>
                            </form>
                        </div>
                        <hr class="my-2 mt-2">
                        <h1 style="font-size: 60%" class=" text-gray-500"><b>Nota:&nbsp;</b><br>
                            Si compras con paypal estaras automaticamente matriculado en el plan y podras iniciar tu plan de entrenamiento personalizado<br>
                            Si compras con cash deberas registrarte y realizar un deposito bancario enviar comprobante y esperar 24 horas para hacer efectiva la matricula 
                        </h1>

                    </div>
                </div>  --}}
                <div class="container px-4 md:px-0 max-w-6xl mx-auto -mt-24">

                    <div class="mx-0 sm:mx-6">

                        <div class="bg-gray-200 w-full text-xl md:text-2xl text-gray-800 leading-normal rounded-t">
            
                            <!--Lead Card-->
                            <div class="flex  bg-white rounded overflow-hidden shadow-lg">
                                <div class="flex flex-wrap">
                                    <div class="w-full md:w-2/3 rounded-t">
                                        <img class="w-full shadow object-cover" src="{{Storage::url($plan->image->url)}}" alt="">
                                    </div>
            
                                    <div class="w-full md:w-1/3 flex flex-col flex-grow flex-shrink ">
                                        <div class="flex-1 w-full rounded-t rounded-b-none overflow-hidden shadow-lg">
                                            <p class="w-full text-gray-600 text-xs md:text-sm pt-4 px-6"></p>
                                            <div class="w-full font-bold text-xl text-gray-900 px-6">{{$plan->title}}</div>
                                            <hr class="my-2">
                                            <p class="text-gray-700 text-sm px-6 mb-1  "><strong>Nombre del beneficiario:</strong> Stalin King sPilco Cacuango</p>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Banco:</strong> PICHINCHA</h1>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Numero de cuenta:</strong> 00000000000000</h1>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Tipo de cuenta:</strong> Ahorro</h1>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Cedula:</strong> 06000000000</h1>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Correo:</strong> stalin@hotmail.com</h1>
                                            <h1 class="text-gray-700 text-sm px-6 mb-1 "><strong>Whatsapp:</strong> 09999999999</h1>
                                            <hr class="my-1">
                                            
                                            
                                        </div>
                                        
                                        <div class=" bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-2 pb-6 ">
                                            <p class="w-full text-justify text-gray-600 text-xs md:text-sm  px-6 py-2"><Strong>Nota:</Strong>  
                                               Realiza el deposito bancario con los datos de arriba, el valor del plan y envia el comprobante por whatsapp para matricularte.
                                            </p>
                                            <div class="flex items-center justify-between mx-4">
                                               
                                                <h1 class="font-bold">${{$plan->price->value}}</h1>
                                                <div class="text-gray-600 text-xs md:text-sm rounded-full">
                                                    
                                                    <form action="{{ route('payment.pago', $plan) }}" method="POST">
                                                        @csrf 
                                                        <button type="submit" class="text-center text-white shadow-lg transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 rounded-full bg-blue-600 h-10 w-28 ">Reservar Plan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                            <!--/Lead Card-->
            
                        </div>
            
                    </div>
            
                </div>
        </div>
    </section>
    
</x-app-layout>