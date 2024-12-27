<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Application</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom dotted background pattern */
        body {
            background-color: #f7f7f7; /* Light background color */
            background-image: radial-gradient(circle, rgba(0,0,0,0.1) 1px, transparent 1px);
            background-size: 20px 20px; /* Adjust the size of the dots */
            font-family: 'Arial', sans-serif; /* Optional: sets the font family for the entire page */
        }

        /* Fade-in animation for page load */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 1.5s ease-out;
        }

        /* Button hover effects */
        .btn-hover {
            transition: all 0.3s ease; /* Smooth transition for all properties */
        }

        .btn-hover:hover {
            transform: scale(1.05);
            background-color: #3b82f6;
        }
    </style>
</head>
<body class="antialiased">

    <!-- Background with subtle dotted pattern -->
    <div class="min-h-screen bg-pattern flex justify-center items-center">
        
        <!-- Content wrapper with white background and smooth shadows -->
        <div class="max-w-lg w-full p-8 bg-white dark:bg-gray-100 rounded-xl shadow-xl space-y-8 fade-in">
            
            <!-- Header with clean welcome message and logo -->
            <div class="text-center">
                    <a href="#">
                        <x-application-logo class="mx-auto mb-4 h-12 w-aut" />
                    </a>
                    <h1 class="text-4xl font-semibold text-gray-800 dark:text-gray-900">Welcome to Our <span style="color: #007bff;">Blog</span> Application</h1>
                    <br><hr>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-700">Please log in or register to continue.</p>
            </div>

            <!-- Login/Register section inside the container with an image -->
            <div class="text-center space-x-6 mt-6">
                @if (Route::has('login'))
                    <div class="flex justify-center space-x-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-medium text-gray-800 hover:text-blue-500 dark:text-gray-900 dark:hover:text-blue-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="border border-yellow-500 text-yellow-500 px-4 py-2 rounded-md hover:bg-yellow-500 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-105">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="border border-blue-500 text-blue-500 px-4 py-2 rounded-md hover:bg-blue-500 hover:text-white transition-all duration-300 ease-in-out transform hover:scale-105">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <!-- Image section below the login/register buttons -->
            <div class="text-center mt-6">
                <p>coded by <a href="https://www.facebook.com/MVDY.YTB/" class="text-blue-500 hover:underline">Amino</a></p>
            </div>

        </div>
    </div>

</body>
</html>
