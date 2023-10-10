<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$breeds->breed_name}} fajta szerkesztése</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <form action="/animals/breeds/{{$breeds->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex items-center gap-x-4">
                      <label for="breed_name">Fajta megnevezése: </label>
                      <input type="text" name="breed_name" class="w-1/3 px-4 py-2 border border-gray-300 outline-none focus:border-gray-400"
                      value={{old('breed_name', $breeds->breed_name)}}>
                    </div>
                    
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 my-5 rounded" type="submit">Frissít</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
