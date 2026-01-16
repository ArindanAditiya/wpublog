
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
            // awal quil
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
    