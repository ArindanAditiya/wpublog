  <x-layout :title="$title">
      <div id="auth-modal"
          class="fixed inset-0 bg-black/60 backdrop-blur-sm z-60 hidden flex items-center justify-center fade-in">
          <div class="relative bg-white w-full max-w-md mx-4 rounded-xl shadow-2xl overflow-hidden">
              <button id="close-auth" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 z-10">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                      </path>
                  </svg>
              </button>
          </div>
      </div>
      </div>

      <!-- hero section -->
      <section id="hero-slider"
          class="w-full h-screen flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar">

          <!-- Slide 1 -->
          <div class="min-w-full h-full relative bg-cover bg-center bg-no-repeat flex items-center justify-center snap-center shrink-0"
              style="background-image: url('{{ asset('img/hero-1.png') }}')">

              <div class="absolute inset-0 bg-black/60"></div>

              <div
                  class="container relative mx-auto max-w-7xl h-full flex flex-col justify-center text-white z-10 px-6 sm:px-8 md:px-12 lg:px-16">
                  <div class="text-center md:text-left max-w-xs sm:max-w-sm md:max-w-4xl mx-auto md:mx-0">
                      <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 leading-tight">
                          Mengumpulkan Jejak Intelektual Hadratussyaikh
                      </h1>
                      <p class="text-xs sm:text-sm md:text-lg lg:text-xl mb-6 sm:mb-8 text-gray-200">
                          Sebuah ikhtiar untuk merekam dan menghidupkan kembali warisan pemikiran KH. M.
                          Hasyim Asy'ari. Kami hadir untuk mendokumentasikan sanad keilmuan beliau.
                      </p>
                      <a href="#explore"
                          class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-8 rounded-full text-sm sm:text-base md:text-lg lg:text-xl transition shadow-lg hover:shadow-indigo-500/50 whitespace-nowrap">
                          Jelajahi Sekarang
                      </a>
                  </div>
              </div>
          </div>

          <!-- Slide 2 -->
          <div class="min-w-full h-full relative bg-cover bg-center bg-no-repeat flex items-center justify-center snap-center shrink-0"
              style="background-image: url('{{ asset('img/hero-1.png') }}')">

              <div class="absolute inset-0 bg-black/60"></div>

              <div
                  class="container relative mx-auto max-w-7xl h-full flex flex-col justify-center text-white z-10 px-6 sm:px-8 md:px-12 lg:px-16">
                  <div class="text-center md:text-left max-w-xs sm:max-w-sm md:max-w-4xl mx-auto md:mx-0">
                      <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 leading-tight">
                          Menyelami Samudra Kitab & Pemikiran
                      </h1>
                      <p class="text-xs sm:text-sm md:text-lg lg:text-xl mb-6 sm:mb-8 text-gray-200">
                          Mengkaji ulang mahakarya Hadratussyaikh dalam berbagai disiplin ilmu. Dari adab
                          penuntut ilmu hingga fikih pergerakan sebagai panduan otentik.
                      </p>
                      <a href="#explore"
                          class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-8 rounded-full text-sm sm:text-base md:text-lg lg:text-xl transition shadow-lg hover:shadow-indigo-500/50 whitespace-nowrap">
                          Selengkapnya
                      </a>
                  </div>
              </div>
          </div>

          <!-- Slide 3 -->
          <div class="min-w-full h-full relative bg-cover bg-center bg-no-repeat flex items-center justify-center snap-center shrink-0"
              style="background-image: url('{{ asset('img/hero-1.png') }}')">

              <div class="absolute inset-0 bg-black/60"></div>

              <div
                  class="container relative mx-auto max-w-7xl h-full flex flex-col justify-center text-white z-10 px-6 sm:px-8 md:px-12 lg:px-16">
                  <div class="text-center md:text-left max-w-xs sm:max-w-sm md:max-w-4xl mx-auto md:mx-0">
                      <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 leading-tight">
                          Menyambung Sanad, Merawat Peradaban
                      </h1>
                      <p class="text-xs sm:text-sm md:text-lg lg:text-xl mb-6 sm:mb-8 text-gray-200">
                          Menerjemahkan sandi-sandi kearifan masa lalu ke dalam konteks masa kini. Mengemas
                          nilai luhur agar tetap relevan dan menjadi solusi zaman.
                      </p>
                      <a href="#explore"
                          class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-8 rounded-full text-sm sm:text-base md:text-lg lg:text-xl transition shadow-lg hover:shadow-indigo-500/50 whitespace-nowrap">
                          Selengkapnya
                      </a>
                  </div>
              </div>
          </div>

      </section>


      <!-- Image Grid Section -->
      <section class="w-full bg-white pb-16">

          <div class="grid grid-cols-1 md:grid-cols-4 w-full">
              @foreach ($lastPosts as $post)
                  <div class="relative group h-64 md:h-80 overflow-hidden cursor-pointer">
                      <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                          alt="{{ $post->title }}"
                          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                      <div class="absolute inset-0 bg-linear-to-t from-black/90 via-black/40 to-transparent opacity-90">
                      </div>

                      <div class="absolute bottom-0 left-0 right-0 p-6 text-center">
                          <p class="text-white text-sm md:text-base font-medium tracking-wider uppercase">
                              {{ $post->title }}
                          </p>
                      </div>
                  </div>
              @endforeach
              @foreach ($popularPosts as $post)
                  <div class="relative group h-64 md:h-80 overflow-hidden cursor-pointer">
                      <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-thumbnail.jpg') }}"
                          alt="{{ $post->title }}"
                          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                      <div class="absolute inset-0 bg-linear-to-t from-black/90 via-black/40 to-transparent opacity-90">
                      </div>

                      <div class="absolute bottom-0 left-0 right-0 p-6 text-center">
                          <p class="text-white text-sm md:text-base font-medium tracking-wider uppercase">
                              {{ $post->title }}
                          </p>
                      </div>
                  </div>
              @endforeach

          </div>

          <div class="container mx-auto px-6 md:px-12 mt-12 text-center max-w-5xl">

              <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-6">
                  Turast Pesantren Tebuireng | Digital Collections
              </h2>

              <p class="text-gray-600 leading-relaxed mb-6 text-sm md:text-base">
                  Selamat datang di Digital Collections. Situs ini menyediakan akses ke koleksi digital dan koleksi
                  hasil
                  digitalisasi milik Pesantren Tebuireng. Untuk mengakses panduan koleksi arsip dan koleksi yang
                  disimpan
                  di perpustakaan kami, silakan kunjungi situs berikut: <a href="#"
                      class="text-indigo-600 hover:underline">Leiden University Libraries Collection Guides</a>.
              </p>

              <p class="text-gray-500 italic text-sm md:text-base leading-relaxed">
                  Digital Collections terus diperbarui dengan konten dan fitur baru. Harap dicatat bahwa materi yang
                  masih
                  memiliki hak cipta mungkin memiliki pembatasan akses.
              </p>

          </div>

      </section>

      <!-- Koleksi -->
      <section class="w-full">

          <div class="w-full bg-[#95a58f] py-4 shadow-sm">
              <h2 class="text-center text-white text-xl md:text-2xl font-bold tracking-widest uppercase">
                  Koleksi
              </h2>
          </div>

          <div class="container mx-auto px-4 md:px-12 py-10">
              <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">

                  <a href="naskah_non_akses.html" class="relative group cursor-pointer block">
                      <div class="aspect-3/4 overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                          <img src="https://placehold.co/300x400/eee/999?text=Cover+Kitab" alt="Tahqiq Santri"
                              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                      </div>
                      <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 shadow-sm">
                          <span class="text-xs md:text-sm font-bold text-black uppercase tracking-wide">Tahqiq
                              Santri</span>
                      </div>
                  </a>

                  <a href="link2.html" class="relative group cursor-pointer block">
                      <div class="aspect-3/4 overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                          <img src="https://placehold.co/300x400/eee/999?text=Cover+Kitab" alt="Naskah Cetakan"
                              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                      </div>
                      <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 shadow-sm">
                          <span class="text-xs md:text-sm font-bold text-black uppercase tracking-wide">Naskah
                              Cetakan</span>
                      </div>
                  </a>

                  <a href="link3.html" class="relative group cursor-pointer block">
                      <div class="aspect-3/4 overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                          <img src="https://placehold.co/300x400/eee/999?text=Cover+Kitab" alt="Manuskrip"
                              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                      </div>
                      <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 shadow-sm">
                          <span class="text-xs md:text-sm font-bold text-black uppercase tracking-wide">Manuskrip</span>
                      </div>
                  </a>

                  <a href="link4.html" class="relative group cursor-pointer block">
                      <div class="aspect-3/4 overflow-hidden bg-gray-100 shadow-sm border border-gray-200">
                          <img src="https://placehold.co/300x400/eee/999?text=Cover+Kitab" alt="Kitab"
                              class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                      </div>
                      <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 shadow-sm">
                          <span class="text-xs md:text-sm font-bold text-black uppercase tracking-wide">Kitab</span>
                      </div>
                  </a>

                  <!-- lanjutkan sesuai elemen yang Anda miliki dengan mengganti href="linkN.html" -->
              </div>
          </div>

          <div class="w-full bg-[#f8f9f5] py-10 border-t border-gray-200">
              <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-center gap-4 md:gap-8">

                  <h3 class="text-lg md:text-xl font-bold text-black">
                      Punya Naskah?
                  </h3>

                  <a href="#"
                      class="bg-[#95a58f] hover:bg-[#7f8f79] text-white font-medium py-2 px-6 rounded-full transition shadow-md">
                      Daftarkan di Sini
                  </a>

                  <a href="#"
                      class="text-black font-semibold border-b-2 border-black pb-0.5 hover:text-gray-600 hover:border-gray-600 transition">
                      Syarat dan Ketentuan
                  </a>

              </div>
          </div>

      </section>


      <!-- Peta sebaran -->
      <section class="w-full bg-white py-8">

          <div class="container mx-auto px-4 md:px-12">

              <div class="relative w-full h-75 md:h-112.5 rounded-xl overflow-hidden shadow-lg">

                  <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1977.3488133600688!2d112.23566003880752!3d-7.607845839501379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786a7603f1d77b%3A0x71029570607e579e!2sPondok%20Pesantren%20Tebuireng%20Jombang!5e0!3m2!1sen!2sid!4v1765961272123!5m2!1sen!2sid"
                      width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                      class="w-full h-full object-cover filter grayscale-20 contrast-[1.1]">
                  </iframe>

                  <div
                      class="absolute top-4 left-4 md:top-8 md:left-8 bg-white/80 backdrop-blur-md border border-white/50 px-4 py-2 md:px-6 md:py-3 rounded-lg shadow-sm">
                      <h2 class="text-gray-900 font-bold text-lg md:text-2xl leading-tight">
                          Sebaran Naskah <br> Tebuireng
                      </h2>
                  </div>

              </div>
          </div>

          <div class="w-full bg-[#f9faf6] py-8 md:py-12 mt-12 border-t border-gray-200">
              <div class="container mx-auto px-4 md:px-12">
                  <div
                      class="grid grid-cols-2 md:flex md:flex-row items-center justify-center gap-8 md:gap-16 opacity-90">

                      <div class="flex justify-center">
                          <img src="{{ asset('img/logo-tebuirenrg 1.png') }}" alt="Logo"
                              class="h-12 md:h-20 w-auto object-contain hover:scale-110 transition-transform">
                      </div>
                      <div class="flex justify-center">
                          <img src="{{ asset('img/fixlogo-03 1.png') }}" alt="Logo"
                              class="h-12 md:h-20 w-auto object-contain hover:scale-110 transition-transform">
                      </div>
                      <div class="flex justify-center">
                          <img src="{{ asset('img/Logo Mahad Aly 1697 x 1772 1.png') }}" alt="Logo"
                              class="h-10 md:h-16 w-auto object-contain hover:scale-110 transition-transform">
                      </div>
                      <div class="flex justify-center">
                          <img src="{{ asset('img/Pustaka 1.png') }}" alt="Logo"
                              class="h-10 md:h-16 w-auto object-contain hover:scale-110 transition-transform">
                      </div>

                  </div>
              </div>
          </div>

      </section>
  </x-layout>
