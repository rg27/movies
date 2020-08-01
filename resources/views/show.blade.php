@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="parasite" class="w-64 md:w-96" style="width:24rem">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm ">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                        <path d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z"></path>
                    </svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 .'%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                            {{ $genre['name'] }}  @if(!$loop->last), @endif
                        @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="div mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 2)
                                <div class="mr-8">
                                    <div >{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
                @if (count($movie['videos']['results'])>0)
                    <div class="mt-12">
                        <a href="https://youtube.com/watch?v={{ $movie['videos']['results']['0']['key'] }}"
                            class=" flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600
                            transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- End Movie Info --}}

    <div class=" movie-cast border-b border-gray-800">
        <div class=" container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="popular-movies">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">

                        @foreach ($movie['credits']['cast'] as $cast)
                            @if($loop->index < 5)
                                <div class="mt-8">
                                    <a href="#">
                                        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] }}" alt="profile" class="hover:opacity-75 transition ease-in-out duration-150">
                                    </a>
                                    <div class="mt-2">
                                        <a href="#" class="text-lg mt-1 hover:text-gray:300 text-sm">{{ $cast['name'] }}</a>
                                        <div class="flex items-center text-gray-400 mt-0">
                                            <span>{{ $cast['character'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>

        {{-- End of casts --}}
        <div class=" movie-cast border-b border-gray-800">
            <div class=" container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="popular-movies">
                    {{-- <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2> --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-5 gap-8">
                        @foreach ($movie['images']['backdrops'] as $image)
                            @if($loop->index < 9)
                            <div class="mt-8">
                                <a href="#">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="file_path" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                            @endif
                        @endforeach

                </div>
            </div>
        </div>



@endsection
