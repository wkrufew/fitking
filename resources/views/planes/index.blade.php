<x-app-layout>
    {{-- INICIO SEO --}}
        @section('title', 'Cursos')
        @section('description', 'Listado de planes que ofrece FitKing para llavar su fisico al siguiente nivel.')
        @section('url', route('cursos.index'))
        @section('img', asset('img/home/sports.jpg'))
    {{-- FIN SEO --}}

    <section class="relative bg-cover" style="object-fit: cover; box-shadow: 0 0 8px 6px black inset; background-image: url({{asset('img/home/sports.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8 md:pt-28 md:pb-16">
            <div class="text-center">
                <h1 class="text-yellow-500 font-extrabold text-2xl md:text-4xl mb-1">FITKING PLANES</h1>
                <p class="text-white font-bolt text-base md:text-2xl mb-2">Los mejores cursos a tu disposicion</p>
                <!--Aqui va el buscador-->
                <div class="w-full md:w-1/2 px-6 mx-auto">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>
    @livewire('plan-index') 
</x-app-layout>