<x-guest-layout>
    <form method="POST" action="{{ route('artist.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Artist Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" class="mt-1"/>
            <x-text-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')"
                autofocus autocomplete="bio" />
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <!-- Country -->
        <div>
            <x-input-label for="country" :value="__('Country from')" class="mt-1"/>
            <select name="country_id" id="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                <option value="">Select a Country</option>
                @foreach ($countries as $country)
                <option value="{{ $country->id }}" id="">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Register') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
