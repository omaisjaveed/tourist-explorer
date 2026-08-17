@extends('layouts.admin')

@section('title', 'Media Gallery')

@section('content')
<div class="bg-white rounded-[50px] p-12 shadow-2xl">
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-black text-gray-900 tracking-tighter uppercase">Media <span class="text-blue-600">Gallery</span></h2>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl mb-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
        <!-- Upload Section -->
        <div class="md:col-span-1">
            <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="bg-gray-50 p-8 rounded-[40px] border-2 border-dashed border-gray-200 text-center group hover:border-blue-400 transition">
                    <label class="cursor-pointer block">
                        <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 group-hover:scale-110 transition">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <p class="text-xs font-black uppercase tracking-widest text-gray-500 mb-2">Select Images</p>
                        <input type="file" name="photos[]" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*">
                    </label>
                    
                    <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-4 rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-700 shadow-xl shadow-blue-100 transition group">
                        Upload Now <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Gallery Section -->
        <div class="md:col-span-3">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($gallery as $item)
                    <div class="relative aspect-square rounded-3xl overflow-hidden cursor-pointer group border-4 border-transparent hover:border-blue-600 transition shadow-sm hover:shadow-xl bg-gray-100">
                        <img src="{{ asset('storage/' . $item->file_path) }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gray-900/60 opacity-0 group-hover:opacity-100 transition flex flex-col items-center justify-center space-y-2 p-4">
                            <p class="text-white text-[10px] font-bold truncate w-full text-center">{{ $item->file_name }}</p>
                            <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded-xl hover:bg-red-600 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-gray-50 rounded-[40px]">
                        <i class="fas fa-images text-5xl text-gray-200 mb-4"></i>
                        <p class="text-gray-400 font-bold text-sm uppercase tracking-widest">Gallery is empty</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
