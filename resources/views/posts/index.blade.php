<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
            <a href="{{ route('posts.create') }}" 
               class="bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                ADD
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Bar -->
            <div class="mb-6 flex justify-between items-center">
                <form method="GET" action="{{ route('posts.index') }}" class="w-full sm:w-1/3">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ old('search', $search) }}" 
                               class="form-control" placeholder="Search posts..." 
                               aria-label="Search posts" aria-describedby="search-button">
                        <button class="btn btn-primary" type="submit" id="search-button">
                            <i class="bi bi-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Posts Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse ($posts as $post)
                    <div class="bg-white shadow-lg rounded-lg p-6 transition-all duration-300 ease-in-out hover:shadow-xl">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2">Created At: {{ $post->created_at }}</p>
                        <p class="text-sm text-gray-500">Updated At: {{ $post->updated_at }}</p>
                        <div class="mt-4 flex space-x-8">
                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="border border-blue-500 text-blue-500 px-4 py-2 rounded-md hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-105">
                               SHOW
                            </a>

                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="border border-yellow-500 text-yellow-500 px-4 py-2 rounded-md hover:bg-yellow-500 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-105">
                               EDIT
                            </a>

                            <form method="post" action="{{ route('posts.destroy', $post->id) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" 
                                        class="border border-red-500 text-red-500 px-4 py-2 rounded-md hover:bg-red-500 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-105">
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 text-center p-4 text-gray-500">
                        No posts available.
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
