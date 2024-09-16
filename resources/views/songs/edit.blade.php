<x-guest-layout>
    <form method="POST" action="{{ route('song.update', $songs->id) }}">
        @csrf
        @method('PATCH')

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Song Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$songs->title" required
                autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Genre -->
        <div>
            <x-input-label for="genre" :value="__('Song Genre')" class="mt-1" />
            <select name="genre_id" id="genre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                <option value="">Select a genre</option>
                @foreach ($genres as $genre)
                <option
                value="{{ $genre->id }}"
                id=""
                @if ($genre->id === $songs->genre_id)
                selected
                @endif
                >{{ $genre->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('genre_id')" class="mt-2" />
        </div>

        <!-- Artist -->
        <div>
            <x-input-label for="artist_id" :value="__('Artist')" class="mt-1" />
            <select name="artist_id" id="artist_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                <option value="" selected>Select an artist</option>
                @foreach ($artists as $artist)
                <option
                value="{{ $artist->id }}"
                id=""
                @if ($artist->id === $songs->artist_id)
                selected
                @endif
                >{{ $artist->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('artist_id')" class="mt-2" />
        </div>

        <!-- Album -->
        <div>
            <x-input-label for="album_id" :value="__('Song Album')" class="mt-1" />
            <select name="album_id" id="album_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-2 ">
                <option value="" selected>select an artist first</option>
            </select>
            <x-input-error :messages="$errors->get('album_id')" class="mt-2" />
        </div>

        <div>
            <x-primary-button class="mt-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#artist_id').on('change', function () {
                var id = $(this).val();
                console.log('selected artist id: '+id);
                if (id) {
                    $.ajax({
                        type: "GET",
                        url: "/getAlbum/" + id,
                        data: {},
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                console.log(data);
                                $('#album_id').empty();
                                $('#album_id').append('<option hidden>Choose Album</option>');
                                $.each(data, function (index, album) {
                                    $('#album_id').append('<option value="'+ album.id +'">'+ album.title +'</option>');
                                });
                            } else {
                                $('#album_id').empty();
                                $('#album_id').append('<option value="">select an artist first</option>');
                            }
                        },
                        error: function(xhr, status, error, data) {
                            console.error(`Status: ${status}`);
                            console.error(`Error: ${error}`);
                            console.error(`Response: ${xhr}`);
                            alert('error');
                        }
                    });
                } else {
                    $('#album_id').empty();
                    $('#album_id').append('<option value="">select an artist first</option>');
                }
            });
            });
    </script>
</x-guest-layout>
