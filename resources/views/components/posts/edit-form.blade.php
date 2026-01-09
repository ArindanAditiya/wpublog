@push('css')
{{-- FILEPOND --}}
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />

{{-- QUILL --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush

<section class="bg-white dark:bg-gray-900">
  <div class="max-w-3xl px-4 py-8 mx-auto lg:py-14">

    {{-- HEADER --}}
    <div class="mb-8">
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Edit Post
      </h2>
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
        Perbarui konten artikel yang sudah dibuat
      </p>
    </div>

    <form id="post-form" action="/dashboard/{{ $post->slug }}/edit" method="post" enctype="multipart/form-data" class="space-y-10">
      @csrf
      @method('patch')

      {{-- ================= THUMBNAIL ================= --}}
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Thumbnail
        </h3>

        <input name="thumbnail" type="file" id="thumbnail">

        <p class="text-sm text-gray-500 dark:text-gray-400">
          PNG / JPG — disarankan rasio 16:9
        </p>

        @error('thumbnail')
          <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror

        <div class="relative overflow-hidden rounded-xl border shadow-sm">
          <div class="aspect-video bg-gray-100 dark:bg-gray-800">
            <img
              id="thumbnail-preview"
              src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
              alt="{{ $post->title }}"
              class="w-full h-full object-cover"
            >
          </div>
          <div class="absolute inset-0 bg-linear-to-t from-black/40 via-black/10 to-transparent"></div>
        </div>
      </div>

      {{-- ================= META ================= --}}
      <div class="space-y-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Informasi Post
        </h3>

        {{-- TITLE --}}
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Post Title
          </label>
          <input
            name="title"
            type="text"
            value="{{ old('title') ?? $post->title }}"
            placeholder="Masukkan judul artikel"
            class="w-full rounded-lg border p-2.5 text-sm
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white
                   @error('title') border-red-600 bg-red-50 @enderror"
                   

            required
          >
          @error('title')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
          @enderror
        </div>

        {{-- CATEGORY --}}
        <div>
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Category
          </label>
          <select
            name="category_id"
            class="w-full rounded-lg border p-2.5 text-sm
                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white
                   @error('category_id') border-red-600 bg-red-50 @enderror"
          >
            <option value="">Pilih Category</option>
            @foreach ($allCategory as $categories)
              <option value="{{ $categories->id }}"
                @selected((old('category_id') ?? $post->category->id) == $categories->id)
              >
                {{ $categories->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
          @enderror
        </div>
      </div>

      {{-- ================= CONTENT ================= --}}
      <div class="space-y-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Konten
        </h3>

        <textarea name="body" id="body" class="hidden">
          {{ old('body') ?? $post->body }}
        </textarea>

        <div id="editor" class="bg-white dark:bg-gray-700">
          {!! old('body') ?? $post->body !!}
        </div>

        @error('body')
          <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
      </div>

      {{-- ================= ACTION BAR ================= --}}
      <div class="sticky bottom-0 bg-white dark:bg-gray-900 border-t pt-4">
        <div class="flex justify-end gap-3">
          <a href="/dashboard"
            class="px-5 py-2.5 rounded-lg border border-red-600 text-red-600
                   hover:bg-red-600 hover:text-white transition text-sm font-medium">
            Cancel
          </a>

          <button type="submit"
            class="px-6 py-2.5 rounded-lg bg-blue-600 text-white
                   hover:bg-blue-700 transition text-sm font-medium">
            Update Post
          </button>
        </div>
      </div>

    </form>
  </div>
</section>

@push('js')
{{-- FILEPOND --}}
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
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
    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
  }
});
</script>

{{-- QUILL --}}
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
const quill = new Quill('#editor', {
  theme: 'snow',
  placeholder: 'Masukkan isi konten'
});

document.getElementById('post-form').addEventListener('submit', function (e) {
  e.preventDefault();
  document.getElementById('body').value = quill.root.innerHTML;
  this.submit();
});
</script>
@endpush
