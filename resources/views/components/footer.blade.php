<footer class="relative bg-black pt-10 pb-1 border-t-2 border-yellow-500 rounded-t-md">

    <div class="container justify-center">
        <div class="flex flex-wrap justify-between">
            <div class="w-full lg:w-3/12 px-6 text-center">
                <div
                    class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                    <i class="fas fa-at text-xl"></i>
                </div>
                <h5 class="text-xs mt-2 font-semibold text-white select-none">
                    Correo Electronico
                </h5>
                <p class="mt-2 mb-4 text-xs text-white hover:text-yellow-500 cursor-pointer">
                   {{ $settings['email'] }}

                </p>
            </div>
            <div class="w-full lg:w-3/12 px-4 text-center">
                <div
                    class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                    <i class="fas fa-phone text-xl"></i>
                </div>
                <h5 class="text-xs mt-2 font-semibold text-white select-none">
                    Teléfono
                </h5>
                <p class="mt-2 text-xs mb-4 text-white hover:text-yellow-500 cursor-pointer">
                    {{ $settings['phone'] }}
                </p>
            </div>
            <div class="w-full lg:w-3/12 px-4 text-center">
                <div
                    class="text-gray-900 p-3 w-8 h-8 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                    <i class="fas fa-route text-xl"></i>
                </div>
                <h5 class="text-xs mt-2 font-semibold text-white select-none">Dirección domiciliaria</h5>
                <p class="mt-2 text-xs mb-4 text-white hover:text-yellow-500 cursor-pointer">
                    {{ $settings['adderss'] }}
                </p>
            </div>
        </div>
        <div class="flex justify-center items-center text-center mt-2">
            <div class="w-full lg:w-6/12 px-4 ">
                <h4 class="text-xs md:text-sm font-semibold text-white">Sigueme en mis redes sociales!</h4>
                <div class="mt-3 justify-between items-center text-center">
                    <a href="https://www.facebook.com/kingstalin23"
                        class="text-gray-900 mr-2 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                        <i class="fab fa-facebook text-lg text-white hover:text-yellow-500"></i>
                    </a>
                    <a href="https://www.instagram.com/stalinphilco/"
                        class="text-gray-900 mr-2 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                        <i class="fab fa-instagram text-lg text-white hover:text-yellow-500"></i>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone={{ $settings['phone'] }}&text=Hola%20Kings%20.."
                        class="text-gray-900 w-10 h-10 shadow-lg m-auto rounded-full inline-flex items-center justify-center">
                        <i class="fab fa-whatsapp text-lg text-white hover:text-yellow-500"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr class="border-yellow-500 mb-2 mt-4" />
        <div class="flex items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 lg:w-auto mx-auto text-center">
                <div class="text-xs text-white font-semibold py-1">
                    Copyright © {{ date('Y') }} FitKing - Todos los derechos reservados
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center md:justify-between justify-center mt-2">
            <div class="w-full md:w-4/12  mx-auto text-center">
                <div class="text-xs text-white font-semibold py-1">
                    Desarrollado por:
                    <a href="https://www.facebook.com/smith.aviles3" class="text-white hover:text-yellow-500">Ing.
                        Smith Aviles</a>
                    <a href="https://www.facebook.com/smith.aviles3"
                        class="text-white hover:text-yellow-500 p-3 w-1 h-1 overflow-hidden  shadow-lg  rounded-full inline-flex items-center justify-center">
                        <i class="fab fa-facebook text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

</footer>