<x-app-layout>
    <div class="py-10"></div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-gray-600">CREAR UN NUEVO PLAN</h1>
                <hr class="mt-2 mb-4">

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
                    
                    @include('instructor.courses.partials.form')
                    
                    <div class="flex justify-center mt-6 mb-4">
                        {!! Form::submit('Crear Plan', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{-- <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    {{-- @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    @endpush --}}
</x-app-layout>
