<x-app-layout>
    <div class="py-12 max-w-4xl m-auto">
        <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg flex justify-start p-6 border">
            <form class="w-full" action="/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-12 ">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base/7 font-semibold  text-gray-900">Edit Post</h2>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-full">
                                <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                                <div class="mt-2">
                                    <input id="title" type="text" name="title" autocomplete="title"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        value="{{ $post->title ?? old() }}" />
                                    @error('title')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-full">
                                <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
                                <div class="mt-2">
                                    <textarea id="body" type="text" name="body" autocomplete="body"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ $post->body ?? old() }}</textarea>
                                    @error('body')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
{{-- 
                            <div class="sm:col-span-full">
                                <label for="category" class="block text-sm/6 font-medium text-gray-900">Category</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="category" name="category" autocomplete="category-name"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        @foreach ($categories as $category)
                                            <option>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                    @error('category')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-full">
                                <label for="category" class="block text-sm/6 font-medium text-gray-900">Tag</label>
                                <div class="mt-2 grid grid-cols-1">
                                    <select id="tag" name="tag" autocomplete="tag-name"
                                        class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        @foreach ($tags as $tag)
                                            <option>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                                        class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4">
                                        <path
                                            d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" fill-rule="evenodd" />
                                    </svg>
                                    @error('tag')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="sm:col-span-full">
                                <label for="image" class="block text-sm/6 font-medium text-gray-900">Image</label>
                                <div class="mt-2">
                                    <input id="image" type="file" name="image"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                                    @error('image')
                                        <div class="text-sm text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('dashboard-posts') }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>