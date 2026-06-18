<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Karakorum Crown Expeditions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-emerald-50 to-teal-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 p-8 text-center">
                <div class="mb-4">
                    <i class="fas fa-user-shield text-6xl text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-white">Admin Panel</h1>
                <p class="text-emerald-100 mt-2">Karakorum Crown Expeditions Management</p>
            </div>

            <!-- Login Form -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p class="text-red-700 text-sm">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-envelope text-emerald-600 mr-2"></i>Email Address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required 
                            autofocus
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                            placeholder="admin@discoverghanche.com"
                        >
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-lock text-emerald-600 mr-2"></i>Password
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition"
                            placeholder="Enter your password"
                        >
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="remember" 
                            name="remember"
                            class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500"
                        >
                        <label for="remember" class="ml-2 text-gray-700 text-sm">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 text-white py-3 rounded-lg font-semibold hover:from-emerald-700 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:scale-105"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>Login to Dashboard
                    </button>
                </form>

                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="/" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Website
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-6 text-gray-600 text-sm">
            © 2024 Karakorum Crown Expeditions. All Rights Reserved
        </div>
    </div>
</body>
</html>
