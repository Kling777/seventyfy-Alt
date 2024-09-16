<x-guest-layout>
    <form method="POST" action="{{ route('album.update',$album->id) }}">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Update Album Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="title" :value="$album->title" required
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Bio-->
        <div>
            <x-input-label for="artist" :value="__('Update Album Artist')" />
            <select name="artist_id" id="artist"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                @foreach ($artists as $artist)
                <option @if ($artist->id === $album->artist_id)
                    selected
                    @endif value="{{ $artist->id }}" id="">{{ $artist->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('artist_id')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="bio" :value="__('Update Album Descriptions')" />
            <x-text-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="$album->bio"
                autofocus autocomplete="bio" />
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Register') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
