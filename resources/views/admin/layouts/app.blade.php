<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') – SoundEffects</title>
    <meta name="description" content="@yield('description', 'Dashboard admin SoundEffects')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'SoundEffects Dashboard')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="@yield('og_type', 'website')">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('head')
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <div class="flex flex-1 min-h-screen" x-data="{ sidebarOpen: false }">

        <!-- Sidebar untuk desktop -->
        <aside class="bg-white shadow-md w-64 flex-shrink-0 hidden md:block">
            <div class="p-6 border-b">
                <h2 class="text-2xl font-bold text-blue-600">Admin Panel</h2>
            </div>
            <nav class="p-4 space-y-2 text-gray-700">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Dashboard</a>
                <a href="{{ route('admin.soundeffects.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Sound Effects</a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Kategori</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengguna</a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengaturan</a>

                <!-- Logout menggunakan form POST -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded text-red-500 hover:bg-red-100 transition">
                        Keluar
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Sidebar untuk mobile -->
        <aside x-show="sidebarOpen"
            class="fixed top-0 left-0 z-50 bg-white w-64 h-full shadow-md p-6 space-y-2 md:hidden"
            x-transition>
            <h2 class="text-xl font-bold text-blue-600 mb-4">Menu</h2>
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Dashboard</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Sound Effects</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Kategori</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengguna</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengaturan</a>

            <!-- Logout untuk mobile juga pakai form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 rounded text-red-500 hover:bg-red-100 transition">
                    Keluar
                </button>
            </form>
        </aside>


        <div x-show="sidebarOpen" @click.away="sidebarOpen = false"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"></div>

        <aside x-show="sidebarOpen"
            class="fixed top-0 left-0 z-50 bg-white w-64 h-full shadow-md p-6 space-y-2 md:hidden"
            x-transition>
            <h2 class="text-xl font-bold text-blue-600 mb-4">Menu</h2>
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Dashboard</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Sound Effects</a>
            <a href="{{ ('admin.categories.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Kategori</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengguna</a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-blue-100 hover:text-blue-600 transition">Pengaturan</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 rounded text-red-500 hover:bg-red-100 transition">
                    Keluar
                </button>
            </form>

        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col w-full min-w-0">

            <!-- Header/Navbar -->
            <header class="w-full bg-white shadow-sm px-4 md:px-6 py-4 flex items-center justify-between">

                <!-- Judul Dashboard -->
                <h1 class="flex-1 text-center md:text-left text-lg md:text-xl font-semibold text-gray-800">
                    @yield('page_title', 'Dashboard')
                </h1>

                <!-- Bagian kanan: greeting dan avatar -->
                <div class="hidden md:flex items-center gap-4">
                    <span class="text-sm text-gray-600">Hai, {{ Auth::user()->name ?? 'Admin' }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=4f46e5&color=fff"
                        alt="Avatar"
                        class="w-8 h-8 rounded-full">
                </div>

                <!-- Versi mobile: tampilkan avatar saja di kanan -->
                <div class="flex md:hidden items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}&background=4f46e5&color=fff"
                        alt="Avatar"
                        class="w-8 h-8 rounded-full">
                </div>
            </header>


            <!-- Page Content -->
            <main class="w-full flex-1 px-4 md:px-6 py-6">
                @yield('content')
            </main>

        </div>


    </div>

    <!-- Footer -->
    <footer class="bg-white border-t text-center py-4 text-sm text-gray-500">
        <div class="container mx-auto px-4">
            <p>&copy; {{ date('Y') }} <span class="font-semibold">SoundEffects</span>. Semua hak cipta dilindungi.</p>
            <div class="mt-2 space-x-4">
                <a href="#" class="hover:text-blue-600 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-blue-600 transition">Ketentuan Layanan</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
    <!-- Sebelum </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
</body>

</html>