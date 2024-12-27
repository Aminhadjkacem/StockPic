<x-app-layout>
<x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <a href="{{ route('posts.create') }}" 
               class="bg-blue-500 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-600 transition-all duration-300 ease-in-out transform hover:scale-105">
                New Post !
            </a>
        </div>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Main Dashboard Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Dashboard Cards -->
            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-500 ease-in-out">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Welcome Back!</h3>
                <p class="text-gray-600">You're logged in, ready to manage your content. Explore and take action!</p>
                <div class="mt-4">
                    <a href="{{ route('posts.index') }}" 
                       class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 hover:scale-110 transform transition-all duration-300 ease-in-out">
                        View Posts
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-500 ease-in-out">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Recent Activity</h3>
                <p class="text-gray-600">Stay updated with your recent activities and updates on your posts.</p>
                <div class="mt-4">
                    <a href="#" 
                       class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 hover:scale-110 transform transition-all duration-300 ease-in-out">
                        View Activity
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 hover:shadow-2xl transform hover:scale-105 transition-all duration-500 ease-in-out">
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Settings</h3>
                <p class="text-gray-600">Manage your account settings and preferences.</p>
                <div class="mt-4">
                    <a href="#" 
                       class="bg-gray-600 text-white px-5 py-2 rounded-md hover:bg-gray-700 hover:scale-110 transform transition-all duration-300 ease-in-out">
                        Go to Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
