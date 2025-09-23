<div class="mt-8 m-auto">
    @forelse ($posts as $post)
        <div
            class="flex flex-col items-center m-auto my-5 bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-full hover:bg-gray-100 dark:border-gray-200 dark:bg-white-800 dark:hover:bg-gray-200 transition-all duration-300 ">
            <div class="flex flex-col justify-between p-4 leading-normal w-full">
                <a href="/posts/{{ $post->id }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black cursor-pointer">
                        {{$post->title}}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::words($post->body, 20) }}</p>
                <div class="flex items-center">
                    <p class="mx-2">by {{ $post->user->name }} at {{ $post->published_at }}</p>
                    <a href="">
                        <span class="material-symbols-outlined">
                            thumb_up
                        </span>
                    </a>
                    <p class="mx-2">0</p>
                </div>
            </div>
            <a href="/posts/{{ $post->id }}">
                <img class="object-cover w-full  rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-r-lg cursor-pointer"
                    src="{{ $post->image == "0" ? "https://flowbite.com/docs/images/blog/image-1.jpg" : asset("storage/" . $post->image) }}"
                    alt="">
            </a>
        </div>
    @empty
        <h2 class="text-gray-500 flex justify-center items-center">No Post Founded!</h2>
    @endforelse
</div>