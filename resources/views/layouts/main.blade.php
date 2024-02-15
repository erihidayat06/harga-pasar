<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-TUGA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicons -->
    <link href="/assets/img/brebes.png" rel="icon">
    <link href="/assets/img/brebes.png" rel="apple-touch-icon">

    {{-- By: Eri Hidayat --}}
</head>

<body>

    @include('layouts.header')

    @yield('container')

    @include('layouts.footer')


    <script>
        function formKirim(element, display) {
            element.style.display = display;
            document.getElementById("button-kirim").style.display = ""
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typingText = document.getElementById('typing-text');
            const text = 'SI-TUGA';
            let currentIndex = 0;

            // Fungsi untuk menambahkan karakter baru
            function animateTyping() {
                if (currentIndex < text.length) {
                    typingText.textContent += text[currentIndex];
                    currentIndex++;
                    setTimeout(animateTyping, 100); // Memanggil kembali fungsi setelah jeda 100ms
                }
            }

            // Memulai animasi
            animateTyping();
        });
    </script>

    <script>
        // Saat halaman dimuat kembali
        window.onload = function() {
            // Periksa apakah terdapat nilai di local storage untuk posisi scroll
            var scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition !== null) {
                // Pindahkan posisi scroll ke nilai yang disimpan di local storage
                window.scrollTo(0, scrollPosition);
                // Hapus nilai dari local storage setelah menggunakannya
                localStorage.removeItem('scrollPosition');
            }
        };

        // Saat halaman ditinggalkan atau di-reload
        window.onbeforeunload = function() {
            // Simpan posisi scroll saat ini di local storage
            localStorage.setItem('scrollPosition', window.scrollY);
        };
    </script>

</body>

</html>
