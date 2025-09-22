<div class="mx-auto flex justify-center bg-red">
    <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg flex justify-center">
        <div class="p-3 text-gray-900">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li class="me-2">
                    <x-categories-nav-link href="/" :active="request()->is('/')">
                        All
                    </x-categories-nav-link>
                </li>
                {{-- active "inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" --}}
                {{-- inactive "inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100
                dark:hover:bg-gray-800 dark:hover:text-white"> --}}
                @forelse ($categories as $category)
                    <li class="me-2">
                        <x-categories-nav-link href="/category?q={{ strtolower($category->name) }}"
                            :active="request()->query('q') === strtolower($category->name)">
                            {{ $category->name }}
                        </x-categories-nav-link>
                    </li>
                @empty
                    <p class="text-gray-500 flex justify-center items-center">Not Found!</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>