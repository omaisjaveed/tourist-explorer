@extends('layouts.admin')

@section('title', 'Blog Management')

@section('content')
<div class="bg-white rounded-[50px] p-12 shadow-2xl">
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-black text-gray-900 tracking-tighter uppercase">Blog <span class="text-blue-600">Management</span></h2>
        <button onclick="openBlogModal()" class="bg-gray-900 text-white px-8 py-3 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 transition shadow-xl hover:shadow-blue-200">
            + New Post
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl mb-6 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[40px] shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-gray-500">Post Details</th>
                    <th class="px-8 py-6 text-xs font-black uppercase tracking-widest text-gray-500 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($blogs as $blog)
                <tr class="hover:bg-gray-50/50 transition">
                    <td class="px-8 py-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl mr-4 overflow-hidden flex items-center justify-center">
                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<i class=\'fas fa-image text-gray-300\'></i>'">
                                @else
                                    <i class="fas fa-image text-gray-300"></i>
                                @endif
                            </div>
                            <div>
                                <p class="font-black text-gray-900 tracking-tight">{{ $blog->title }}</p>
                                <p class="text-xs font-bold text-gray-400">{{ $blog->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-8 py-6 text-center">
                        <button onclick="editBlog({{ json_encode($blog) }})" class="w-10 h-10 bg-blue-50 text-blue-600 rounded-xl hover:bg-blue-600 hover:text-white transition">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="w-10 h-10 bg-red-50 text-red-600 rounded-xl hover:bg-red-600 hover:text-white transition ml-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="2" class="px-8 py-20 text-center text-gray-400 font-bold uppercase tracking-widest">No posts found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="blogModal" class="fixed z-[100] inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" onclick="closeBlogModal()">
            <div class="absolute inset-0 bg-gray-900 opacity-75 backdrop-blur-sm"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:min-h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-[50px] text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="blog_id" id="blog_id">
                <input type="hidden" name="existing_image" id="existing_image">
                <input type="hidden" name="gallery_image" id="gallery_image">

                <div class="bg-white p-12">
                    <h3 id="modalTitle" class="text-3xl font-black text-gray-900 mb-8 tracking-tighter uppercase">New <span class="text-blue-600">Post</span></h3>
                    
                    <div class="space-y-8">
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Title</label>
                            <input type="text" name="title" id="title" class="w-full bg-gray-50 border-none rounded-2xl p-4 font-bold text-gray-800 focus:ring-4 focus:ring-blue-100 transition" required>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Featured Image</label>
                            <div class="flex gap-4 mb-4">
                                <button type="button" onclick="document.getElementById('fileInput').click()" class="bg-gray-100 text-gray-800 px-6 py-3 rounded-2xl font-bold text-sm hover:bg-gray-200 transition">
                                    <i class="fas fa-upload mr-2"></i> Upload New
                                </button>
                                <button type="button" onclick="openGallery()" class="bg-blue-50 text-blue-600 px-6 py-3 rounded-2xl font-bold text-sm hover:bg-blue-600 hover:text-white transition">
                                    <i class="fas fa-images mr-2"></i> From Gallery
                                </button>
                            </div>
                            <input type="file" id="fileInput" name="new_image" class="hidden" onchange="previewFile(this)">
                            <div id="imagePreviewContainer" class="mt-4 p-4 bg-gray-50 rounded-3xl border border-gray-100 hidden">
                                <p class="text-[10px] font-black uppercase text-gray-400 mb-3">Image Preview:</p>
                                <img id="imagePreview" src="" class="w-full h-48 object-cover rounded-2xl shadow-lg">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-black uppercase tracking-widest text-gray-500 mb-3">Content</label>
                            <textarea name="content" id="content" rows="6" class="w-full bg-gray-50 border-none rounded-2xl p-4 font-bold text-gray-800 focus:ring-4 focus:ring-blue-100 transition" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-12 flex justify-end space-x-4">
                    <button type="button" onclick="closeBlogModal()" class="px-8 py-4 rounded-2xl font-black uppercase tracking-widest text-gray-500">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-10 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-700 shadow-xl">Save Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Gallery Modal -->
<div id="galleryModal" class="fixed z-[110] inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="fixed inset-0 bg-gray-900 opacity-90 backdrop-blur-md" onclick="closeGallery()"></div>
        <div class="relative bg-white rounded-[50px] p-12 max-w-4xl w-full shadow-2xl">
            <h3 class="text-2xl font-black mb-8 uppercase tracking-tighter">Select from <span class="text-blue-600">Gallery</span></h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 max-h-[60vh] overflow-y-auto pr-4 custom-scrollbar">
                @foreach($gallery as $item)
                    <div onclick="selectFromGallery('{{ $item->file_path }}')" class="aspect-square rounded-2xl overflow-hidden cursor-pointer border-4 border-transparent hover:border-blue-600 transition">
                        <img src="{{ asset('storage/' . $item->file_path) }}" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
            <button onclick="closeGallery()" class="mt-8 w-full bg-gray-100 py-4 rounded-2xl font-bold uppercase tracking-widest">Close</button>
        </div>
    </div>
</div>

<script>
    function openBlogModal() {
        document.getElementById('blogModal').classList.remove('hidden');
        document.getElementById('modalTitle').innerHTML = 'New <span class="text-blue-600">Post</span>';
        document.getElementById('blog_id').value = '';
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';
        document.getElementById('imagePreviewContainer').classList.add('hidden');
    }

    function closeBlogModal() {
        document.getElementById('blogModal').classList.add('hidden');
    }

    function editBlog(blog) {
        openBlogModal();
        document.getElementById('modalTitle').innerHTML = 'Edit <span class="text-blue-600">Post</span>';
        document.getElementById('blog_id').value = blog.id;
        document.getElementById('title').value = blog.title;
        document.getElementById('content').value = blog.content;
        document.getElementById('existing_image').value = blog.image;
        if(blog.image) {
            document.getElementById('imagePreview').src = '/storage/' + blog.image;
            document.getElementById('imagePreviewContainer').classList.remove('hidden');
        }
    }

    function openGallery() { document.getElementById('galleryModal').classList.remove('hidden'); }
    function closeGallery() { document.getElementById('galleryModal').classList.add('hidden'); }

    function selectFromGallery(path) {
        document.getElementById('gallery_image').value = path;
        document.getElementById('existing_image').value = '';
        document.getElementById('imagePreview').src = '/storage/' + path;
        document.getElementById('imagePreviewContainer').classList.remove('hidden');
        closeGallery();
    }

    function previewFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').classList.remove('hidden');
                document.getElementById('gallery_image').value = '';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
