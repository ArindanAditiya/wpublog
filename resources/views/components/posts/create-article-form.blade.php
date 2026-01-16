@once
    @push('css')
        {{-- FILEPOND --}}
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    @endpush
    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script>
            // FILEPOND
            FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginFileValidateType,
                FilePondPluginFileValidateSize,
                FilePondPluginImageTransform,
                FilePondPluginImageResize
            );

            FilePond.create(document.querySelector('#thumbnail'), {
                acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
                maxFileSize: '20MB',
                imageResizeTargetHeight: 600,
                imageResizeMode: 'contain',
                server: {
                    url: '/uploadthumbnail',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });


            // QUILL EDITOR
            const quill = new Quill("#editor-container", {
                theme: "snow",
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, 3, 4, 5, 6, false]
                        }],
                        ["bold", "italic", "underline", "strike"],
                        [{
                            list: "ordered"
                        }, {
                            list: "bullet"
                        }],
                        [{
                            indent: "-1"
                        }, {
                            indent: "+1"
                        }],
                        [{
                            align: []
                        }],
                        ["link", "blockquote", "code-block"],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        ["clean"],
                    ],
                },
                placeholder: "Tulis konten artikel Anda di sini..."

            });

            quill.root.innerHTML = `{!! old('body') ?? '' !!}`;

            // Update hidden input saat konten berubah
            quill.on("text-change", function() {
                document.getElementById("konten-artikel").value =
                    quill.root.innerHTML;
            });

            document.getElementById('form-artikel').addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('body').value = quill.root.innerHTML;
                this.submit();
            });
        </script>
    @endpush
@endonce

<x-app-layout>
    <section class="content-section fade-in">
        <!-- Form Tambah Artikel -->
        <form method="post" action="/dashboard/menejemen-artikel/create" enctype="multipart/form-data" id="form-artikel"
            class="mb-8 bg-white p-6 rounded-xl border border-emerald-100 shadow-sm">
            @csrf
            <h4 class="font-bold text-slate-700 mb-4">Buat Artikel Baru</h4>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <input required name="title" value="{{ old('title') }}" type="text"
                        placeholder="Judul Artikel"
                        class="@error('title') border-red-500 bg-red-50 @enderror w-full border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none "
                        id="judul-artikel" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Gambar Cover -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-slate-700">
                        Cover Artikel
                    </label>
                    <input name="thumbnail" type="file" id="thumbnail">

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="quill-container">
                    <label class="block text-sm font-medium text-slate-700 mb-2">
                        Konten Artikel
                    </label>
                    <div id="editor-container" style="height: 500px"
                        class="border rounded-lg @error('body') border-red-500 @enderror"></div>
                    <input type="hidden" id="body" name="body" />
                    @error('body')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <select name="category_id"
                            class="@error('category_id') border-red-500 bg-red-50 @enderror w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none "
                            id="kategori-artikel">
                            <option value="">Pilih Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <select name="status"
                            class="@error('status') border-red-500 bg-red-50 @enderror w-full border-slate-200 border rounded-lg p-3 focus:ring-2 focus:ring-emerald-500 outline-none "
                            id="status-artikel">
                            <option value="" @selected(old('status') == '')>Pilih Status</option>
                            <option value="draft" @selected(old('status') == 'draf')>Draft</option>
                            <option value="published" @selected(old('status') == 'published')>Published</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="/dashboard/menejemen-artikel" onclick="toggleFormArtikel()"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-emerald-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-emerald-700 transition">
                        Simpan Artikel
                    </button>
                </div>
            </div>
        </form>
    </section>
</x-app-layout>
