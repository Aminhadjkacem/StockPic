<x-app-layout>
    <!-- Header Section: Title of the page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Show' }} <!-- Displaying the title of the page -->
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Main container -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Card layout to display the post details -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Displaying the title -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Title' }} <!-- Label for title -->
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $post->title }} <!-- Displaying the title from the post object -->
                        </p>
                    </div>

                    <!-- Displaying the content -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Content' }} <!-- Label for content -->
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $post->content }} <!-- Displaying the content from the post object -->
                        </p>
                    </div>

                    <!-- Displaying the featured image -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Featured Image' }} <!-- Label for featured image -->
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" 
                                 src="{{ Storage::url($post->featured_image) }}" 
                                 alt="{{ $post->title }}" /> <!-- Displaying the image -->
                        </p>
                    </div>

                    <!-- Displaying the creation date -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Created At' }} <!-- Label for created date -->
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $post->created_at }} <!-- Displaying creation date -->
                        </p>
                    </div>

                    <!-- Displaying the last updated date -->
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ 'Updated At' }} <!-- Label for updated date -->
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $post->updated_at }} <!-- Displaying last updated date -->
                        </p>
                    </div>

                    <!-- Button to go back to the list of posts -->
                    <a href="{{ route('posts.index') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-md">
                       BACK <!-- Go back to the posts list -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
