<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Új fajta létrehozása</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->has('breed_name'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-5 rounded relative"
                            role="alert">
                            <strong class="font-bold">Hiba! </strong>
                            <span class="block sm:inline">{{ $errors->first('breed_name') }}</span>
                        </div>
                    @endif

                    <form action="/animals/breeds" method="post">
                        @csrf

                        <div class="flex items-center gap-x-4">
                            <label for="breed_name">Fajta megnevezése: </label>
                            <input type="text" name="breed_name"
                                class="w-1/3 px-4 py-2 border border-gray-300 outline-none focus:border-gray-400" />
                        </div>

                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-5 rounded"
                            type="submit">Létrehozás</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
