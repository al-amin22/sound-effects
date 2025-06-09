@extends('admin.layouts.app') {{-- atau sesuaikan dengan layout milikmu --}}

@section('title', 'Dashboard')

@section('content')
<div class="py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-white rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $data['total_users'] }}</p>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700">Total Sound Effects</h2>
            <p class="text-3xl font-bold text-green-600">{{ $data['total_sounds'] }}</p>
        </div>

        <div class="p-6 bg-white rounded-xl shadow">
            <h2 class="text-lg font-semibold text-gray-700">Total Categories</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $data['total_categories'] }}</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Sound Uploads</h2>

        @if($data['recent_sounds']->count())
        <ul class="divide-y divide-gray-200">
            @foreach ($data['recent_sounds'] as $sound)
            <li class="py-3 flex justify-between items-center">
                <div>
                    <p class="text-gray-800 font-medium">{{ $sound->title }}</p>
                    <p class="text-sm text-gray-500">Uploaded at {{ $sound->created_at->format('d M Y H:i') }}</p>
                </div>
                <a href="{{ route('sound.show', $sound->slug) }}" target="_blank" class="text-blue-600 hover:underline text-sm">
                    View
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <p class="text-gray-500">No recent sounds found.</p>
        @endif
    </div>
</div>
@endsection
