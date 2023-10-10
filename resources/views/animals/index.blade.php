<x-app-layout>    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Állatok</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <div
                            class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                            @foreach ($animals as $animal)
                                <a href="/animals/{{ $animal->id }}" class="group">
                                    <div
                                        class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                        <img src="{{ $animal->image_url }}" class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    </div>
                                    <h3 class="mt-4 text-lg font-medium text-gray-700">{{ $animal->name }}</h3>
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $animal->birth_of_year }}</p>
                                </a>                                
                            @endforeach
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
