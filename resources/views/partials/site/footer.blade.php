<footer class="footer py-5" style="background: rgb(52, 52, 155);">
    <div class="container">
        <h3 class="text-center text-white">Sosial Media</h3>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4">
                    <span class="text-lg fab fa-facebook"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4">
                    <span class="text-lg fab fa-twitter"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4">
                    <span class="text-lg fab fa-instagram"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4">
                    <span class="text-lg fab fa-whatsapp"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-white me-xl-4 me-4">
                    <span class="text-lg fab fa-github"></span>
                </a>
            </div>
            <div class="col-lg-8 mb-4 mx-auto text-center">
                <a href="/tentang-kami" target="_blank" class="text-white me-xl-5 me-3 mb-sm-0 mb-2">
                    Tentang Kami
                </a>
                <a href="/lokasi-bimbel" target="_blank" class="text-white me-xl-5 me-3 mb-sm-0 mb-2">
                    Lokasi Bimbel
                </a>
                <a href="/kontak-kami" target="_blank" class="text-white me-xl-5 me-3 mb-sm-0 mb-2">
                    Kontak Kami
                </a>
                <a href="/faq" target="_blank" class="text-white me-xl-5 me-3 mb-sm-0 mb-2">
                    FAQ
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-white">
                    © {{ date('Y') }} {{ config('app.name') }}
                </p>
            </div>
        </div>
    </div>
</footer>

@include('partials.logout-form')
