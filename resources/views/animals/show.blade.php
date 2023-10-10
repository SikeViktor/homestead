<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $animal->name }} adatai</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto my-5 p-5">
                        <div class="md:flex no-wrap md:-mx-2 ">
                            <!-- Left Side -->
                            <div class="w-full md:w-3/12 md:mx-2">
                                <!-- Profile Card -->
                                <div class="bg-white p-3 border-t-4 border-green-400">
                                    <div class="image overflow-hidden">
                                        <img class="h-auto w-full mx-auto" src={{ $animal->image_url }}>
                                    </div>
                                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $animal->name }}</h1>
                                    @if ($animal->owner_id == auth()->user()->id)
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">
                                                <a href="/animals/{{ $animal->id }}/edit">
                                                    <button
                                                        type="button"class="focus:outline-none text-white w-full bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                                        <i class="fa-solid fa-pen-clip"></i>
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="px-4 py-2">
                                                <form action="/animals/{{ $animal->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="focus:outline-none w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- End of profile card -->
                                <div class="my-4"></div>
                                <!-- Friends card -->
                                <div class="bg-white p-3 hover:shadow">
                                    <div
                                        class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                        <span class="text-green-500">
                                            <i class="fa-solid fa-dog"></i>
                                        </span>
                                        <span>Tulajdonos állatai</span>
                                    </div>
                                    <div class="grid grid-cols-3">
                                        @foreach ($animals as $nextAnimal)
                                            <div class="text-center my-2">
                                                <img class="h-16 w-16 rounded-full mx-auto"
                                                    src="{{ $nextAnimal->image_url }}">
                                                <a href="/animals/{{ $nextAnimal->id }}"
                                                    class="text-main-color">{{ $nextAnimal->name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End of friends card -->
                            </div>
                            <!-- Right Side -->
                            <div class="w-full md:w-9/12 mx-2 h-64">
                                <!-- Profile tab -->
                                <!-- About Section -->
                                <div class="bg-white p-3 shadow-sm rounded-sm">
                                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Adatok</span>
                                    </div>
                                    <div class="text-gray-700">
                                        <div class="grid md:grid-cols-2 text-sm">
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Név</div>
                                                <div class="px-4 py-2">{{ $animal->name }}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Születési év</div>
                                                <div class="px-4 py-2">{{ $animal->birth_of_year }}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Nem</div>
                                                <div class="px-4 py-2">{!! $animal->gender === 'male' ? '<i class="fa-solid fa-mars"></i>' : '<i class="fa-solid fa-venus"></i>' !!}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Szín</div>
                                                <div class="px-4 py-2">{{ $animal->color }}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Élő</div>
                                                <div class="px-4 py-2">{!! $animal->alive == 1 ? '<i class="fa-solid fa-heart"></i>' : '<i class="fa-solid fa-skull"></i>' !!}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold"></div>
                                                <div class="px-4 py-2"></div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Fajta</div>
                                                <div class="px-4 py-2">{{ $animal->breed->breed_name }}</div>
                                            </div>
                                            <div class="grid grid-cols-2">
                                                <div class="px-4 py-2 font-semibold">Tulajdonos</div>
                                                <div class="px-4 py-2">{{ $animal->owner->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="my-4"></div>

                                <div class="bg-white p-3 shadow-sm rounded-sm">
                                    <div class="px-4 py-2 font-semibold">Leírás</div>
                                    <div class="px-4 py-2">{{ $animal->description }}</div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
