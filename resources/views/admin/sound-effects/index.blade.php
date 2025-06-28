<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Effects - Admin</title>
    <meta name="description" content="Manajemen data sound effects untuk soundeffectsfree.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Daftar Sound Effects</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Sound</button>
        </div>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>Catrgory</th>
                    <th>Audio</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($soundEffects as $index => $sound)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sound->title }}</td>

                    <td class="px-4 py-2">
                        <audio controls class="w-full max-w-xs">
                            <source src="{{ asset($sound->file_path) }}" type="audio/mpeg">
                            Your browser does not support the audio tag.
                        </audio>
                    </td>

                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $sound->id }}">
                            Edit
                        </button>
                        <form method="POST" action="{{ route('admin.soundeffects.destroy', $sound->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin.soundeffects.store') }}" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Sound Effect</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File Suara (.mp3, .wav)</label>
                        <input type="file" name="file" class="form-control" accept="audio/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach($soundEffects as $sound)
    <div class="modal fade" id="editModal{{ $sound->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $sound->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.soundeffects.update', $sound->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $sound->id }}">Edit Sound Effect</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="title{{ $sound->id }}" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title{{ $sound->id }}" name="title" value="{{ $sound->title }}" required>
                        </div>

                        <!-- Keywords -->
                        <div class="mb-3">
                            <label for="keywords{{ $sound->id }}" class="form-label">Kata Kunci</label>
                            <input type="text" class="form-control" id="keywords{{ $sound->id }}" name="keywords" value="{{ $sound->keywords }}">
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description{{ $sound->id }}" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description{{ $sound->id }}" name="description" rows="3">{{ $sound->description }}</textarea>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label for="category_id{{ $sound->id }}" class="form-label">Kategori</label>
                            <select class="form-select" name="category_id" id="category_id{{ $sound->id }}" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $sound->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- File Baru (Opsional) -->
                        <div class="mb-3">
                            <label for="file_path{{ $sound->id }}" class="form-label">Upload Ulang File (MP3/WAV/OGG)</label>
                            <input type="file" class="form-control" name="file_path" id="file_path{{ $sound->id }}">
                            @if($sound->file_path)
                            <small class="text-muted">File saat ini: <a href="{{ asset($sound->file_path) }}" target="_blank">Lihat / Putar</a></small>
                            @endif
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endforeach


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
        });
    </script>
</body>

</html>