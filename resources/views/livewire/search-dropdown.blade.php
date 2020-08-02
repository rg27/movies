<div class="relative mt-3 md:mt-0" x-data = {isOpen:true} @click.away="isOpen = false">
    <input
    wire:model.debounce.500ms="search"
    type="text"
    class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
    placeholder="Search (Press '/' to focus)"
    x-ref="search"
    @keydown.window="
        if (event.keyCode === 191) {
            event.preventDefault();
            $refs.search.focus();
        }
    "
    @focus="isOpen = true"
    @keydown="isOpen = true"
    @keydown.escape.window="isOpen = false"
    @keydown.shift.tab="isOpen = false"
>
    <div class="absolute top-0">
        <svg class="fill-current text-gray-500 w-4 mt-2 ml-2" viewBox="0 0 24 24">
            <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>
    @if(strlen($search) > 2)
        <div class="z-50 absolute bg-gray-800 rounded w-64 mt-4"
            x-show.transition.opacity="isOpen"
            >
            @if($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                        <a
                            href="{{ route('movies.show',$result['id']) }}"
                            class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out
                            duration-150"
                            @if($loop->last)
                                @keydown.tab="isOpen=false"
                            @endif

                        >
                            @if($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif
                            <span ml-4>{{ $result['title'] }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No Results for {{ $search }}</div>
            @endif
        </div>
    @endif

</div>
