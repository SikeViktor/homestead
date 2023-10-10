<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fajták</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-right px-6 pt-6">
                    <a href="/animals/breeds/create">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-5 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                        <meta http-equiv="refresh" content="3;url=/animals/breeds">
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Fajta</th>
                                    <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($breeds as $breed)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th class="px-6 py-4">{{ $breed->id }}</th>
                                        <td class="px-6 py-4">{{ $breed->breed_name }}</td>

                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end">
                                            <a href="/animals/breeds/{{ $breed->id }}">
                                                <button type="button"
                                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </a>
                                            <a href="/animals/breeds/{{ $breed->id }}/edit">
                                                <button
                                                    type="button"class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                                    <i class="fa-solid fa-pen-clip"></i>
                                                </button>
                                            </a>

                                            <form action="/animals/breeds/{{ $breed->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
