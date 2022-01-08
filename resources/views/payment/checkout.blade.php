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
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <h1 class="text-gray-600 text-2xl font-bold mb-2">Detalles de la compra</h1>  
            
                <div class="card">
                    <div class="card-body">
                        <div class=" object-center justify-items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-x-1 gap-y-6 ">
                            <div class="col-1">
                                <img class="shadow-lg rounded-lg w-full h-24 object-cover" src="{{Storage::url($plan->image->url)}}" alt="">
                            </div>
                            <div class="col-1">
                                <h1 class="text-gray-600 text-lg ml-4">{{$plan->title}}</h1>
                            </div>
                            <div class="col-1">
                                <p class="text-gray-500 font-bold ml-auto">$  {{$plan->price->value}}</p>
                            </div>
                            
                        </div>
                       
                        <hr class="my-4">
                        <div class="object-center justify-items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-x-1 gap-y-6 ">
                            <div class="">
                                <a href="{{route('payment.pay', $plan)}}">
                                    <img width="20%" class="object-cover w-36"  src="{{asset('img/home/paypal.png')}}">
                                </a>
                            </div>
                            <div class="my-auto rounded-full">
                                <a href="{{route('payment.cash', $plan)}}" class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110 center py-2 px-5 bg-blue-500 text-white font-semibold rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                    Transferencia bancaria
                                </a>
                            </div>
                        </div>
                        
                        <hr class="my-2 mt-2">
                        <h1 style="font-size: 50%" class=" text-gray-500"><b>Nota:&nbsp;</b>Al aceptar comprar el plan no se receptaran devoluciones, 
                            la informacion impartida dentro del sistema no se puden dibulgar por los terminos y condiciones de FitKing.<br>
                            Si compras con paypal estaras automaticamente matriculado en el plan y podras iniciar tu plan de entrenamiento personalizado<br>
                            Si compras con cash deberas registrarte y realizar un deposito bancario enviar comprobante y esperar 24 horas para hacer efectiva la matricula 
                        </h1>

                    </div>
                </div> 
              
        </div>
    </section>
    
</x-app-layout>