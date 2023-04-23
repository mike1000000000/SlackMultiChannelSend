<div class="">
    @foreach($menuItems as $menuItem)
        <div class="pb-3 w-full flex justify-end">
            <button class="w-full  bg-green-400 hover:bg-green-600
            text-gray-800 hover:text-white font-bold rounded shadow-md hover:shadow-green-500/50  ">
                <a href="{{ url( $menuItem->url) }}" class="h-10 w-full inline-flex items-center justify-center">
                    {{ $menuItem->title }}
                </a>
            </button>
        </div>
    @endforeach
</div>
