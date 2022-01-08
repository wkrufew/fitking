<div class="mb-4">
    {!! Form::label('title', 'Titulo del plan') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title') ? '  border-red-600' : '')]) !!}
    @error('title')   
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
        <strong class="font-bold">Ups!</strong>
        <span class="block sm:inline">{{ $message }}</span>
      </div>
	    @enderror
		
</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del plan') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly' ,'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('slug') ? '  border-red-600' : '')]) !!}
    @error('slug')   
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
        <strong class="font-bold">Ups!</strong>
        <span class="block sm:inline">{{ $message }}</span>
      </div>
@enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del plan') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('subtitle') ? '  border-red-600' : '')]) !!}
    @error('subtitle')   
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
        <strong class="font-bold">Ups!</strong>
        <span class="block sm:inline">{{ $message }}</span>
      </div>
@enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del plan') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description') ? '  border-red-600' : '')]) !!}
    @error('description')   
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
        <strong class="font-bold">Ups!</strong>
        <span class="block sm:inline">{{ $message }}</span>
      </div>
    @enderror
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('category_id') ? '  border-red-600' : ''),'placeholder'=>'Selecciona una categoria']) !!}
        @error('category_id')   
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
        <strong class="font-bold">Ups!</strong>
        <span class="block sm:inline">{{ $message }}</span>
      </div>
	    @enderror
    </div>
    

    <div>
        {!! Form::label('level_id', 'Nivel:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('level_id') ? '  border-red-600' : ''),'placeholder'=>'Selecciona un nivel']) !!}
        @error('level_id')   
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
          </div>
            @enderror
    
    </div>
    
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('price_id') ? '  border-red-600' : ''),'placeholder'=>'Selecciona un precio']) !!}
        @error('price_id')   
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
            <strong class="font-bold">Ups!</strong>
            <span class="block sm:inline">{{ $message }}</span>
          </div>
            @enderror
    </div>
    
</div>

<h1 class="text-2xl font-bold mb-2 mt-8">Portada del Plan</h1>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center rounded-lg" src="{{Storage::url($course->image->url)}}" alt="">
        @else 
            <img id="picture" class="w-full h-64 object-cover object-center rounded-lg" src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
        @endisset
    </figure>
    <div class="my-auto">
            <p class="mb-2"><b>Nota:</b> Selecciona una imagen para cambiar la portada del plan</p>
            {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? '  border-red-600' : ''), 'accept' => 'image/png, .jpeg, .jpg', 'id' => 'file']) !!}
            @error('file')   
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                    <strong class="font-bold">Ups!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                </div>
            @enderror
    </div>
</div>