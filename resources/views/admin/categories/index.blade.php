@extends('admin.layouts.app')
@section('title', 'Manajemen category')
@section('page_title', 'Manajemen category')

@section('content')
<div x-data="categoryModal()" class="space-y-6">

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</div>
    @endif

    <!-- Tombol Tambah -->
    <div class="flex justify-end">
        <button @click="openCreate()" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
            + add category
        </button>
    </div>

    <!-- Tabel Kategori -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-4 py-3">Category</th>
                    <th class="text-left px-4 py-3">Description</th>
                    <th class="text-left px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($categories as $category)
                <tr>
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">{{ $category->description }}</td>
                    <td class="px-4 py-2 text-gray-500">{{ $category->slug }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <button
                            @click="openEdit({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ addslashes($category->description) }}')"
                            class="text-blue-600 hover:underline">
                            Edit
                        </button>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $categories->links() }}
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="close()">
            <h2 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit Category' : 'Add Category'"></h2>

            <form :action="formAction" method="POST">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="mb-4">
                    <label class="block text-sm mb-1" for="name">Category Name</label>
                    <input type="text" name="name" id="name" x-model="formData.name" required class="w-full border-gray-300 rounded px-3 py-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1" for="description">Description</label>
                    <textarea name="description" id="description" x-model="formData.description" rows="4" class="w-full border-gray-300 rounded px-3 py-2"></textarea>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="close()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" x-text="isEdit ? 'Update' : 'Save'"></button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Script Alpine Modal -->
<script>
    function categoryModal() {
        return {
            showModal: false,
            isEdit: false,
            formAction: '{{ route("admin.categories.store") }}',
            formData: {
                name: '',
                description: ''
            },
            openCreate() {
                this.isEdit = false;
                this.formAction = '{{ route("admin.categories.store") }}';
                this.formData.name = '';
                this.formData.description = '';
                this.showModal = true;
            },
            openEdit(id, name, description) {
                this.isEdit = true;
                this.formAction = '{{ route("admin.categories.update", ":id") }}'.replace(':id', id);
                this.formData.name = name;
                this.formData.description = description;
                this.showModal = true;
            },
            close() {
                this.showModal = false;
            }
        }
    }
</script>

@endsection
