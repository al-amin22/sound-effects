@extends('layouts.app')
@section('title', 'Manage Categories')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <button onclick="openModal('createCategoryModal')" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">
        + Add Category
    </button>

    <div class="bg-white shadow overflow-x-auto rounded">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 text-left">
                <tr>
                    <th class="p-3 font-medium">Name</th>
                    <th class="p-3 font-medium">Slug</th>
                    <th class="p-3 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($categories as $category)
                <tr>
                    <td class="p-3">{{ $category->name }}</td>
                    <td class="p-3 text-gray-500">{{ $category->slug }}</td>
                    <td class="p-3 space-x-2">
                        <button onclick="openEditModal('{{ $category->id }}', '{{ $category->name }}')" class="text-blue-600">Edit</button>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>

<!-- Create Modal -->
<div id="createCategoryModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-md p-6">
        <h2 class="text-lg font-semibold mb-4">Add New Category</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name" required class="mt-1 w-full border-gray-300 rounded" />
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('createCategoryModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editCategoryModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg w-full max-w-md p-6">
        <h2 class="text-lg font-semibold mb-4">Edit Category</h2>
        <form id="editCategoryForm" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="edit_name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="edit_name" required class="mt-1 w-full border-gray-300 rounded" />
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal('editCategoryModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function openEditModal(id, name) {
        document.getElementById('edit_name').value = name;
        document.getElementById('editCategoryForm').action = `/admin/categories/${id}`;
        openModal('editCategoryModal');
    }
</script>
@endsection
