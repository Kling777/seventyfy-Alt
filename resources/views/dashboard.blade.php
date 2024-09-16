<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">Music Database</h1>
        <h2 class="text-xl mt-2">Available Tables</h2>
    </div>

    <div class="flex flex-wrap justify-center space-x-4">
        <!-- Box for Songs -->
        <a href="{{ route('song.index') }}"
            class="block p-6 bg-blue-500 text-white rounded-lg shadow-lg hover:bg-blue-600 transition duration-200">
            <h3 class="text-xl font-semibold">Songs</h3>
        </a>

        <!-- Box for Genres -->
        <a href="{{ route('genre.index') }}"
            class="block p-6 bg-green-500 text-white rounded-lg shadow-lg hover:bg-green-600 transition duration-200">
            <h3 class="text-xl font-semibold">Genres</h3>
        </a>

        <!-- Box for Artists -->
        <a href="{{ route('artist.index') }}"
            class="block p-6 bg-red-500 text-white rounded-lg shadow-lg hover:bg-red-600 transition duration-200">
            <h3 class="text-xl font-semibold">Artists</h3>
        </a>

        <!-- Box for Albums -->
        <a href="{{ route('album.index') }}"
            class="block p-6 bg-purple-500 text-white rounded-lg shadow-lg hover:bg-purple-600 transition duration-200">
            <h3 class="text-xl font-semibold">Albums</h3>
        </a>

        <!-- Box for Countries -->
        <a href="{{ route('country.index') }}"
            class="block p-6 bg-yellow-500 text-white rounded-lg shadow-lg hover:bg-yellow-600 transition duration-200">
            <h3 class="text-xl font-semibold">Countries</h3>
        </a>
    </div>
</x-app-layout>
