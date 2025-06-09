<!-- partials/sidebar.blade.php -->
<aside class="w-64 bg-white border-r hidden md:block">
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-blue-600">Dashboard</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600">Sound Effects</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600">Kategori</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600">Pengguna</a>
            <a href="#" class="block text-gray-700 hover:text-blue-600">Pengaturan</a>
        </nav>
    </div>
</aside>
