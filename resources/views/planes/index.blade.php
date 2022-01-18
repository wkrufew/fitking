<x-app-layout>
    <section class="relative" style="box-shadow: 0 0 8px 6px black inset; background-image: url({{asset('img/home/sports.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bolt text-5xl mb-2">Planes FitKing</h1>
                <p class="text-white font-bolt   text-3xl mb-4">Los mejores cursos sobre como moldear tu cuerpo al maximo </p>
                <!--Aqui va el buscador-->
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('plan-index') 
</x-app-layout>