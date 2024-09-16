<x-guest-layout>
    <form method="POST" action="{{ route('genre.update',$genres->id) }}">
        @csrf
        @method('PATCH')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Update Genre Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$genres->name" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <x-primary-button class="mt-4">
            {{ __('Register') }}
        </x-primary-button>
        </div>
    </form>
</x-guest-layout>
