<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Turots Digital - Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="h-screen overflow-hidden bg-slate-50 text-slate-800">

    <!-- ROOT WRAPPER -->
    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR (COMPONENT) -->
        <x-posts.dashboard-sidebar />

        <!-- MAIN AREA -->
        <div class="flex-1 flex flex-col h-screen min-w-0">

            <!-- MOBILE HEADER -->
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 md:hidden">
                <h1 class="font-bold text-emerald-900">TUROTS DIGITAL</h1>
                <button class="p-2 border rounded">
                    <i class="fas fa-bars"></i>
                </button>
            </header>

            <!-- CONTENT (SCROLL DI SINI AJA) -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8">
                <div class="max-w-7xl mx-auto">

                    <h2 class="text-2xl font-bold mb-6">
                        Dashboard Admin
                    </h2>

                    {{ $slot }}

                </div>
            </main>

        </div>
    </div>

    <!-- Delete Modal -->
    <div id="delete-modal" class="fixed inset-0 z-100 hidden items-center justify-center p-4">
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl scale-in">
            <div class="text-center">
                <div
                    class="w-20 h-20 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trash-can text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800">Hapus Data ini?</h3>
                <p class="text-slate-500 mt-2">
                    Data yang dihapus tidak dapat dikembalikan lagi. Anda yakin?
                </p>
            </div>
            <div class="flex gap-3 mt-8">
                <button onclick="closeDeleteModal()"
                    class="flex-1 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition">
                    Batal
                </button>
                <button onclick="confirmDelete()"
                    class="flex-1 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let sidebarMinimized = false;
        let deleteId = null;
        let currentSection = "dashboard";

        // Initialize dashboard as active
        // document.addEventListener("DOMContentLoaded", function() {
        //     document.querySelector(".active-nav").classList.add("bg-emerald-800");
        //     showSection("dashboard");
        // });

        // FUNGSI NAVIGASI
        // function showSection(id) {
        //     // Update active nav button
        //     document.querySelectorAll("nav button").forEach((btn) => {
        //         btn.classList.remove("bg-emerald-800");
        //     });
        //     event.target.closest("button").classList.add("bg-emerald-800");

        //     // Hide all sections
        //     document
        //         .querySelectorAll(".content-section")
        //         .forEach((s) => s.classList.add("hidden"));
        //     document.getElementById(id).classList.remove("hidden");

        //     // Update current section
        //     currentSection = id;

        //     // Update Title Header
        //     const labels = {
        //         dashboard: "Dashboard Admin",
        //         "create-akun": "Kelola Kontributor",
        //         "approve-akun": "Approval Kontributor",
        //         "upload-artikel": "Manajemen Artikel",
        //         "upload-kitab": "Pustaka Kitab",
        //     };
        //     document.getElementById("section-title").innerText = labels[id];

        //     // Close mobile menu after click
        //     if (window.innerWidth < 768) toggleMobileMenu();
        // }

        // TOGGLE SIDEBAR DESKTOP (MINIMIZE)
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const texts = document.querySelectorAll(".sidebar-text");

            if (!sidebarMinimized) {
                sidebar.classList.replace("w-64", "w-20");
                texts.forEach((t) => t.classList.add("hidden"));
                sidebarMinimized = true;
            } else {
                sidebar.classList.replace("w-20", "w-64");
                setTimeout(() => {
                    texts.forEach((t) => t.classList.remove("hidden"));
                }, 100);
                sidebarMinimized = false;
            }
        }

        // TOGGLE SIDEBAR MOBILE
        function toggleMobileMenu() {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        }

        // TOGGLE FORM ARTIKEL
        function toggleFormArtikel() {
            const form = document.getElementById("form-artikel");
            form.classList.toggle("hidden");
        }

        // TOGGLE FORM KITAB
        function toggleFormKitab() {
            const form = document.getElementById("form-kitab");
            form.classList.toggle("hidden");
        }

        // MODAL LOGIC
        function openDeleteModal(id) {
            deleteId = id;
            document
                .getElementById("delete-modal")
                .classList.replace("hidden", "flex");
        }

        function closeDeleteModal() {
            document
                .getElementById("delete-modal")
                .classList.replace("flex", "hidden");
        }

        function confirmDelete() {
            console.log("Deleting ID:", deleteId);
            // Tambahkan logika hapus AJAX/Fetch di sini
            alert(`Data dengan ID ${deleteId} berhasil dihapus!`);
            closeDeleteModal();
        }

        // APPROVAL FUNCTIONS
        function approveRequest(requestId) {
            console.log("Approving request:", requestId);
            alert(`Permintaan ${requestId} telah disetujui!`);
            // In real app, would make API call here
        }

        function rejectRequest(requestId) {
            console.log("Rejecting request:", requestId);
            if (confirm(`Yakin menolak permintaan ${requestId}?`)) {
                alert(`Permintaan ${requestId} telah ditolak.`);
                // In real app, would make API call here
            }
        }

        // Responsive adjustments
        window.addEventListener("resize", function() {
            if (window.innerWidth >= 768) {
                const sidebar = document.getElementById("sidebar");
                sidebar.classList.remove("-translate-x-full");
            }
        });

        let quill;

        // Inisialisasi Quill editor
        function initQuillEditor() {
            quill = new Quill("#editor-container", {
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
                        ["link", "image", "blockquote", "code-block"],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        ["clean"],
                    ],
                },
                placeholder: "Tulis konten artikel Anda di sini...",
            });

            // Update hidden input saat konten berubah
            quill.on("text-change", function() {
                document.getElementById("konten-artikel").value =
                    quill.root.innerHTML;
            });
        }

        // Panggil initQuillEditor saat form ditampilkan
        function toggleFormArtikel() {
            const form = document.getElementById("form-artikel");
            form.classList.toggle("hidden");

            if (!form.classList.contains("hidden") && !quill) {
                // Beri sedikit delay untuk memastikan DOM sudah ready
                setTimeout(initQuillEditor, 100);
            }
        }

        // Fungsi untuk menyimpan artikel
        function simpanArtikel() {
            const judul = document.getElementById("judul-artikel").value;
            const konten = document.getElementById("konten-artikel").value;
            const kategori = document.getElementById("kategori-artikel").value;
            const status = document.getElementById("status-artikel").value;

            // Validasi
            if (!judul || !konten || !kategori || !status) {
                alert("Harap lengkapi semua field!");
                return;
            }

            // Di sini Anda bisa kirim data ke server
            const artikelData = {
                judul: judul,
                konten: konten,
                kontenText: quill.getText(), // Untuk konten plain text
                kategori: kategori,
                status: status,
                tanggal: new Date().toISOString(),
            };

            console.log("Artikel disimpan:", artikelData);

            // Reset form
            resetFormArtikel();

            // Tampilkan pesan sukses
            alert("Artikel berhasil disimpan!");
        }

        // Fungsi reset form
        function resetFormArtikel() {
            document.getElementById("judul-artikel").value = "";
            if (quill) {
                quill.setContents([]);
                quill.setText("");
            }
            document.getElementById("konten-artikel").value = "";
            document.getElementById("kategori-artikel").value = "";
            document.getElementById("status-artikel").value = "";
        }

        // Inisialisasi saat halaman dimuat jika form sudah visible
        document.addEventListener("DOMContentLoaded", function() {
            // Jika form tidak hidden dari awal, inisialisasi Quill
            if (
                !document.getElementById("form-artikel").classList.contains("hidden")
            ) {
                initQuillEditor();
            }
        });

        // Fungsi untuk preview gambar
        function previewImage(input) {
            const file = input.files[0];
            const preview = document.getElementById("cover-preview");
            const placeholder = document.getElementById("image-placeholder");
            const removeBtn = document.getElementById("remove-image");

            // Validasi ukuran file (maks 2MB)
            if (file && file.size > 2 * 1024 * 1024) {
                alert("Ukuran file maksimal 2MB");
                input.value = "";
                return;
            }

            // Validasi tipe file
            const validTypes = [
                "image/jpeg",
                "image/png",
                "image/gif",
                "image/webp",
            ];
            if (file && !validTypes.includes(file.type)) {
                alert("Format file harus JPG, PNG, GIF, atau WebP");
                input.value = "";
                return;
            }

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove("hidden");
                    placeholder.classList.add("hidden");
                    removeBtn.classList.remove("hidden");
                };

                reader.readAsDataURL(file);
            } else {
                preview.classList.add("hidden");
                placeholder.classList.remove("hidden");
                removeBtn.classList.add("hidden");
            }
        }

        // Fungsi untuk menghapus gambar
        function hapusGambar() {
            const input = document.getElementById("cover-image");
            const preview = document.getElementById("cover-preview");
            const placeholder = document.getElementById("image-placeholder");
            const removeBtn = document.getElementById("remove-image");

            input.value = "";
            preview.src = "";
            preview.classList.add("hidden");
            placeholder.classList.remove("hidden");
            removeBtn.classList.add("hidden");
        }

        // Modifikasi fungsi simpanArtikel untuk include gambar
        async function simpanArtikel() {
            const judul = document.getElementById("judul-artikel").value;
            const konten = document.getElementById("konten-artikel").value;
            const kategori = document.getElementById("kategori-artikel").value;
            const status = document.getElementById("status-artikel").value;
            const imageInput = document.getElementById("cover-image");
            const imageFile = imageInput.files[0];

            // Validasi
            if (!judul || !konten || !kategori || !status) {
                alert("Harap lengkapi semua field wajib!");
                return;
            }

            let coverBase64 = null;
            if (imageFile) {
                coverBase64 = await toBase64(imageFile);
            }

            // Simpan data (contoh dengan fetch API)
            console.log("Data artikel:", {
                judul: judul,
                kategori: kategori,
                status: status,
                hasCover: !!imageFile,
                coverBase64: coverBase64,
            });

            // Buat FormData untuk mengirim file
            const formData = new FormData();
            formData.append("judul", judul);
            formData.append("konten", konten);
            formData.append("kontenText", quill.getText());
            formData.append("kategori", kategori);
            formData.append("status", status);
            formData.append("tanggal", new Date().toISOString());

            if (imageFile) {
                formData.append("cover_image", imageFile);
            }

            alert(
                "Artikel berhasil disimpan!" +
                (imageFile ? " Dengan gambar cover." : "")
            );
            resetFormArtikel();
        }
    </script>
</body>

</html>
