<x-app-layout :categories="$categories">
    <div class="py-12 max-w-3xl m-auto">
        <x-categories-bar :categories="$categories" />
        <x-card :posts="$posts" />
        {{ $posts->links() }}
    </div>
</x-app-layout>