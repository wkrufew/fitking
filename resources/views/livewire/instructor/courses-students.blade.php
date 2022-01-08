<div>
    
    <h1 class="text-2xl font-bold mb-6">ESTUDIANTES DEL PLAN</h1>

    <x-table-responsive class="shadow-lg">
        <div class="py-4 px-6 bg-gray-50">
            <input wire:model="search" type="search" class="w-full form-input flex-1 shadow-lg  rounded-md" placeholder="Escriba el nombre de un estudiante...">
        </div>

        @if ($students->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                   <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nombres
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de matricula
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fin de suscripcion          
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado del plan         
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Opciones         
                    </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($students as $student)
              <tr @if(  $student->pivot->created_at->addMonth() < now()) class="bg-red-200" @else  @endif>
                <td class="px-6 py-2 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img id="picture" class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="">
                        </div>
                        <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$student->name}}
                        </div>
                        </div>
                    </div>
                </td>
                <td class="px-2 py-2 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$student->pivot->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $student->pivot->created_at->locale('es')->isoFormat('YYYY') }}</div>
                </td>
                <td class="px-2 py-2 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$student->pivot->created_at->addMonth(1)->locale('es')->isoFormat('dddd D MMMM')}} del {{ $student->pivot->created_at->locale('es')->isoFormat('YYYY') }}</div>
                </td>
                
                <td class="px-2 py-2 whitespace-nowrap">
                    @if ($student->pivot->created_at->addMonth() < now())
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white">
                        Suscripcion terminada
                    </span>
                    @else
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                        Suscripcion activa
                    </span>
                    @endif()
                    
                    
                </td>
                {{-- <td class="px-6 py-2 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$student->created_at->locale('es')->isoFormat('dddd D MMMM') }} del {{ $student->created_at->locale('es')->isoFormat('YYYY, h:mm a') }}</div>
                </td> --}}
                {{-- <td class="px-6 py-2 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$student->email}}</div>
                </td> --}}
                <td class="px-2 py-2 whitespace-nowrap text-right text-sm font-medium" >
                    <button class="btn btn-danger btn-sm" wire:click="baja({{$student->id}})" >Dar de baja</button>
                </td>
              </tr>
              @endforeach
  
              <!-- More items... -->
            </tbody>
          </table>
          <div class="px-6 py-4">
                {{$students->links()}}
          </div>
        @else
        <div class="px-6 py-4">
            No se encuentran registros con ese nombre
        </div>
          
        @endif
    </x-table-responsive>
</div>