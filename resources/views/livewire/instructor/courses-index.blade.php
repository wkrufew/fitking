<div>
    <div class="py-7 md:py-1 bg-black"></div>
<svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
            <g class="wave" fill="#000000">
                <path
                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                </path>
            </g>
            <g transform="translate(1.000000, 15.000000)" fill="#220FDC">
                <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                    <path
                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                        opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"></path>
                    <path
                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                        opacity="0.200000003"></path>
                </g>
            </g>
        </g>
    </g>
</svg>
<div class="container">
    <x-table-responsive>
        <div class="py-4 px-6 flex">
            <input wire:model="search" type="search"
                class="form-input flex-1 shadow-lg  rounded-md" placeholder="Escriba el nombre de un plan...">
            <a class="btn btn-danger ml-2" href="{{ route('instructor.courses.create') }}">Nuevo Plan</a>
        </div>
        @if (session('notificacion'))
            <div x-data="{ open: true }">
                <div x-show="open" class="bg-blue-500 border border-blue-600 text-blue-100 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Ok!</strong>
                    <span class="block sm:inline">{{ session('notificacion') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg x-on:click="open = false" class="fill-current h-6 w-6 text-white" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                        </svg>
                    </span>
                </div>
            </div>
        @endif
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificacion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                            <img class="h-10 w-10 rounded-full object-cover object-center"
                                                src="{{ Storage::url($course->image->url) }}" alt="">
                                        @else
                                            <img id="picture" class="h-10 w-10 rounded-full object-cover object-center"
                                                src="https://images.pexels.com/photos/4325451/pexels-photo-4325451.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $course->title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $course->category->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $course->students->count() }}</div>
                                <div class="text-sm text-gray-500">Personas con el plan</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{ $course->rating }}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i
                                                class="fa fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fa fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fa fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fa fa-star text-{{ $course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                        <li class="mr-1">
                                            <i
                                                class="fa fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-300"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoraciones del plan</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-700 text-white">
                                            Borrador
                                        </span>
                                    @break
                                    @case(2)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-600 text-white">
                                            Revision
                                        </span>
                                    @break
                                    @case(3)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-600 text-white">
                                            Publicado
                                        </span>
                                    @break
                                    @default

                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('instructor.courses.edit', $course) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More items... -->
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $courses->links() }}
            </div>
        @else
            <div class="px-6 py-4">
                No se encuentran registros con ese nombre
            </div>

        @endif
    </x-table-responsive>

</div>

</div>