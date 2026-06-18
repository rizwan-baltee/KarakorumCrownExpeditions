<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Karakorum Crown Expeditions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', system-ui, sans-serif; }
        .sidebar-link { transition: all 0.2s ease; }
        .sidebar-section { font-size: 0.65rem; letter-spacing: 0.15em; }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white z-30 flex flex-col" id="sidebar">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 border-b border-gray-800 px-4">
            <div class="text-center">
                <h1 class="text-lg font-bold text-white">Karakorum Crown</h1>
                <p class="text-[10px] text-emerald-400 tracking-widest uppercase">Admin Panel</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto mt-4 px-3 space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-chart-line w-5 text-center mr-3"></i>
                <span>Dashboard</span>
            </a>

            <!-- Content Management -->
            <div class="sidebar-section text-gray-500 uppercase mt-6 mb-2 px-3">Content</div>

            <a href="{{ route('admin.types.index') }}" class="sidebar-link flex items-center px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.types.*') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-tags w-5 text-center mr-3"></i>
                <span>Types / Categories</span>
            </a>

            <a href="{{ route('admin.treks.index') }}" class="sidebar-link flex items-center px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.treks.*') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-hiking w-5 text-center mr-3"></i>
                <span>Treks</span>
            </a>

            <!-- Operations -->
            <div class="sidebar-section text-gray-500 uppercase mt-6 mb-2 px-3">Operations</div>

            <a href="{{ route('admin.bookings.index') }}" class="sidebar-link flex items-center px-3 py-2.5 rounded-lg text-sm {{ request()->routeIs('admin.bookings.*') ? 'bg-emerald-600 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-calendar-check w-5 text-center mr-3"></i>
                <span>Bookings</span>
            </a>
        </nav>

        <!-- Footer -->
        <div class="border-t border-gray-800 p-4">
            <a href="/" target="_blank" class="flex items-center px-3 py-2 rounded-lg text-sm text-gray-400 hover:bg-gray-800 hover:text-white transition">
                <i class="fas fa-external-link-alt w-5 text-center mr-3"></i>
                <span>View Website</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <div class="bg-white shadow-md sticky top-0 z-20">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="flex items-center gap-4">
                    <h2 class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                </div>

                <div class="flex items-center gap-4">
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center gap-3 text-gray-700 hover:text-gray-900">
                            <div class="w-9 h-9 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <span class="font-medium text-sm hidden md:block">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50" style="display: none;">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition text-sm">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        @yield('content')
    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
