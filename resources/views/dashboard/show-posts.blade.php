<x-app-layout>
    <div class="py-12 max-w-7xl m-auto">
        <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg flex flex-col justify-start">
            <div class="bg-gray-100 border">
                <h1 class="p-6 ">Posts</h1>
            </div>
            <div class="mt-6 mb-6 border-b">
                <table class="w-full p-6">
                    <thead class=" text-left border-b">
                        <tr>
                            <th class="px-6 py-2">Title</th>
                            <th class="px-6 py-2">User</th>
                            <th class="px-6 py-2">Category</th>
                            <th class="px-6 py-2">Tags</th>
                            <th class="px-6 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-6 py-2">{{ $post->title }}</td>
                                <td class="px-6 py-2">{{ $post->user->name }}</td>
                                <td class="px-6 py-2">Tech</td>
                                <td class="px-6 py-2">Laravel</td>
                                <td class="px-6 py-2 flex space-x-3">
                                    <a href="/posts/{{ $post->id }}/edit"
                                        class="text-gray-900 bg-white border focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-blue-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Edit</a>
                                    <form action="/posts/{{ $post->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-900 bg-white border focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-red-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-300">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="py-12 max-w-7xl m-auto">
                                <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg flex justify-start">
                                    <h1 class="p-6">Not Posts Founded !!</h1>
                                </div>
                            </div>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="pb-6 px-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>