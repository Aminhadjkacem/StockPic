<x-app-layout>
    <x-slot name="header">
        <!-- Display 'Edit' for existing posts and 'Create' for new posts -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($post) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Start the form for creating or editing a post -->
                    <form method="post" 
                          action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" 
                          class="mt-6 space-y-6" 
                          enctype="multipart/form-data">
                        <!-- CSRF token for security -->
                        @csrf

                        <!-- Check if this is an edit, then use 'put' method -->
                        @isset($post)
                            @method('put')
                        @endisset
                
                        <!-- Title Input -->
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" 
                                          :value="$post->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Content Input -->
                        <div>
                            <x-input-label for="content" value="Content" />
                            <x-textarea-input id="content" name="content" class="mt-1 block w-full" required autofocus>
                                {{ $post->content ?? old('content') }}
                            </x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <!-- Featured Image Upload -->
                        <div>
                            <x-input-label for="featured_image" value="Featured Image" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="featured_image" name="featured_image" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>

                            <!-- Preview the uploaded image -->
                            <div class="shrink-0 my-2">
                                <img id="featured_image_preview" class="h-64 w-128 object-cover rounded-md" 
                                     src="{{ isset($post) && $post->featured_image ? Storage::url($post->featured_image) : '' }}" 
                                     alt="Featured image preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                        </div>
                
                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for image preview -->
    <script>
        // When the featured image input changes (i.e., when a file is selected)
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // If a file is selected, show a preview of the image
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
