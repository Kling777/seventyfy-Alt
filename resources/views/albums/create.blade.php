<x-guest-layout>
    <form method="POST" action="{{ route('album.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Album Title')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Artist -->
        <div>
            <x-input-label for="artist" :value="__('Artist')" class="mt-1" />
            <select name="artist_id" id="artist"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                <option value="">Select Artist</option>
                @foreach ($artists as $artist)
                <option value="{{ $artist->id }}" id="">{{ $artist->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('artist_id')" class="mt-2" />
        </div>

        <!-- Country -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <x-text-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')"
                autofocus autocomplete="bio" />
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Register') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
