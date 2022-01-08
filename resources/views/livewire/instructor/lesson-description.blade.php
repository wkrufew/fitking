<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="flex items-center cursor-pointer font-bold">Descripción de la Dieta</h1>
            </header>
            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full rounded-lg"></textarea>
                        
                        @error('description.name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                        @enderror

                        <div class="flex justify-center my-2">
                            <button class="btn btn-danger text-sm" wire:click="destroy">Eliminar</button>
                            <button class="btn btn-primary text-sm ml-4" type="submit">Actualizar</button>
                        </div>
                    </form>
                @else
              
                   {{--  <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --}}
                    <div>
                        
                        {{-- <div>
                            <div id="editor"  class="form-input w-full rounded-lg" placeholder="Agrege una descripcion a la leccion...">
                                {!! $name !!}
                            </div>
                        </div>
                       
                        <textarea id="name"  cols="30" rows="10" class="hidden">
                            {!! $name !!}
                        </textarea> --}}
                        <div>
                            
                            <textarea 
                                
                                wire:model="name" 
                                class="form-input w-full rounded-lg" cols="30" rows="3">
                            </textarea>
                       
                        </div>
                        
                                  
                        @error('name')   
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">Ups!</strong>
                            <span class="block sm:inline">{{ $message }}</span>
                        </div>
                        @enderror

                        <div class="flex justify-center my-2 ">
                            <a wire:click="store" class="mt-4 py-1 px-2 rounded-md flex bg-blue-500 text-white items-center cursor-pointer font-bold transition duration-500 ease-in-out transform hover:-translate-y-0 hover:scale-x-95">
                                
                                Agregar Dieta
                            </a>
                        </div>

                    </div>
                    
                @endif
                
            </div>
        </div>
        
    </article>
      
</div>
