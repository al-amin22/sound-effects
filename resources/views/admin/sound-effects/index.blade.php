@extends('admin.layouts.app')
@section('title', 'Sound Effects Management')
@section('page_title', 'Sound Effects Management')

@section('content')
<div x-data="soundEffectModal()" class="space-y-6">

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</div>
    @endif

    <!-- Add Button -->
    <div class="flex justify-end">
        <button @click="openCreate()" class="bg-blue-600 text-white px-4 py-2 rounded shadow">
            + Add Sound Effect
        </button>
    </div>

    <!-- Sound Effects Table -->
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-4 py-3">Title</th>
                    <th class="text-left px-4 py-3">Category</th>
                    <th class="text-left px-4 py-3">Description</th>
                    <th class="text-left px-4 py-3">Audio File</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($soundEffects as $se)
                <tr>
                    <td class="px-4 py-2">{{ $se->title }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ $se->category->name ?? '-' }}</td>
                    <td class="px-4 py-2 text-gray-500">{{ Str::limit($se->description, 50) }}</td>
                    <td class="px-4 py-2">
                        <audio controls class="w-full max-w-xs">
                            <source src="{{ asset('storage/' . $se->file_path) }}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                    </td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <button @click="openEdit({{ $se->id }}, '{{ $se->title }}', '{{ $se->description }}', '{{ $se->category_id }}')" class="text-blue-600 hover:underline">Edit</button>
                        <form action="{{ route('admin.soundeffects.destroy', $se) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this sound effect?')">
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
        {{ $soundEffects->links() }}
    </div>

    <!-- Modal -->
    <div x-show="showModal" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6" @click.away="close()">
            <h2 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit Sound Effect' : 'Add Sound Effect'"></h2>

            <form :action="formAction" method="POST" enctype="multipart/form-data">
                @csrf
                <template x-if="isEdit">
                    <input type="hidden" name="_method" value="PUT">
                </template>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Title</label>
                    <input type="text" name="title" x-model="formData.title" required class="w-full border-gray-300 rounded px-3 py-2" />
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Description</label>
                    <textarea name="description" x-model="formData.description" rows="2" class="w-full border-gray-300 rounded px-3 py-2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Category</label>
                    <select name="category_id" x-model="formData.category_id" required class="w-full border-gray-300 rounded px-3 py-2">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Audio File (mp3/wav/ogg)</label>
                    <input type="file" name="file_path" class="w-full border-gray-300 rounded px-3 py-2" :required="!isEdit" />
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="close()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" x-text="isEdit ? 'Update' : 'Save'"></button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- AlpineJS Script -->
<script>
    function soundEffectModal() {
        return {
            showModal: false,
            isEdit: false,
            formAction: '{{ route("admin.soundeffects.store") }}',
            formData: {
                title: '',
                description: '',
                category_id: '',
            },
            openCreate() {
                this.isEdit = false;
                this.formAction = '{{ route("admin.soundeffects.store") }}';
                this.formData = {
                    title: '',
                    description: '',
                    category_id: ''
                };
                this.showModal = true;
            },
            openEdit(id, title, description, category_id) {
                this.isEdit = true;
                this.formAction = '{{ route("admin.soundeffects.update", ":id") }}'.replace(':id', id);
                this.formData = {
                    title: title,
                    description: description,
                    category_id: category_id
                };
                this.showModal = true;
            },
            close() {
                this.showModal = false;
            }
        }
    }
</script>
@endsection