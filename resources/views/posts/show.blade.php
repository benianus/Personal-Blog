<x-app-layout>
    <div class="py-12 max-w-3xl m-auto">
        <a href="/" class="hover:underline text-blue-500">Back To Posts</a>
        <div class="mt-8 m-auto">
            <div
                class="flex flex-col items-center m-auto my-5 bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-full hover:bg-gray-100 dark:border-gray-200 dark:bg-white-800 dark:hover:bg-gray-200 transition-all duration-300 ">
                <div class="flex flex-col justify-between p-4 leading-normal w-full">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black cursor-pointer">
                        {{$post->title}}
                    </h5>
                    <img class="object-cover w-full rounded-t-lg md:h-auto md:w-full md:rounded-lg cursor-pointer my-6"
                        src="{{ $post->image == " 0" ? "https://flowbite.com/docs/images/blog/image-1.jpg" :
    asset("storage/" . $post->image) }}" alt="">
                    <p class="mb-3 font-normal text-gray-700 dark:text-black">{{ $post->body }}</p>
                    <div class="flex items-center text-gray-500">
                        <p class="mx-2">by
                            <a href=""
                                class="text-gray-500 hover:underline transition-all duration-300">{{ $post->user->name }}</a>
                            at {{ $post->published_at }}
                        </p>
                        <a href="">
                            <span class="material-symbols-outlined">
                                thumb_up
                            </span>
                        </a>
                        <p class="mx-2">0</p>

                    </div>
                    <div class="flex flex-row flex-wrap">
                        @foreach ($post->tags as $tag)
                            <button class="border rounded-md bg-gray-300 mx-2 my-2 p-2">{{ $tag->name }}</button>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
        <a href="/" class="hover:underline text-blue-300">Back To Posts</a>
    </div>

</x-app-layout>