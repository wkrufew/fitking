<div class="container py-24">

    <x-table-responsive>
        <div class="py-4 px-6 flex">
            <input wire:keydown="limpiar_page" wire:model="search" type="search" class="form-input flex-1 shadow-lg  rounded-md" placeholder="Escriba el nombre de un plan...">
            <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Nuevo Plan</a>
        </div>
        @if(session('notificacion'))   
        <div x-data="{ open: true }" >
            <div x-show="open" class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Ok!</strong>
                <span class="block sm:inline">{{session('notificacion')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>
        </div>
        @endif
        @if ($courses->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Matriculados
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Calificacion
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                    </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($courses as $course)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                        @isset($course->image)
                        <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                        @else 
                        <img id="picture" class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                        @endisset
                        </div>
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$course->title}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{$course->category->name}}
                        </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                    <div class="text-sm text-gray-500">Personas con el plan</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 flex items-center">
                        {{$course->rating}}
                        <ul class="flex text-sm ml-2">
                            <li class="mr-1">
                                <i class="fa fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-300"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fa fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-300"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fa fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-300"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fa fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-300"></i>
                            </li>
                            <li class="mr-1">
                                <i class="fa fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-300"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="text-sm text-gray-500">Valoraciones del plan</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @switch($course->status)
                        @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white">
                            Borrador
                            </span>
                            @break
                        @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-600 text-white">
                            Revision
                            </span>
                            @break
                        @case(3)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                            Publicado
                            </span>
                            @break
                        @default
                            
                    @endswitch
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                </td>
              </tr>
              @endforeach
  
              <!-- More items... -->
            </tbody>
          </table>
          <div class="px-6 py-4">
                {{$courses->links()}}
          </div>
        @else
        <div class="px-6 py-4">
            No se encuentran registros con ese nombre
        </div>
          
        @endif
    </x-table-responsive>

</div>