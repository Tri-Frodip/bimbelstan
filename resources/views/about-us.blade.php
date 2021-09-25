@extends('layouts.guest')

@section('content')
<style>
    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: black;
        outline: 0;
        box-shadow: 0 0 0 2px #463f2b;
    }
</style>
<header class="header-2">
    <div class="page-header bg-light pt-6 pt-md-4 min-vh-100">
        <div class="container">
            <div class="row my-3 pt-6">
                <div class="col-md-6 col-12 mb-4">
                    <h3 class="text-center">Kontak Kami</h3>
                    <div class="form-group">
                        <input type="text" placeholder="Nama" class="form-control border-dark">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" class="form-control border-dark">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Pesan" rows="7" class="form-control border-dark"></textarea>
                    </div>
                    <button class="btn btn-dark text-warning w-100">Kirim</button>
                </div>
                <div class="col-md-6 col-12">
                    <h3 class="text-center">Lokasi</h3>
                    <iframe style="width: 100%; height: 360px" src="https://maps.google.com/maps?q=Singaparna,%20Cikunten&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<svg xmlns="http://www.w3.org/2000/svg" class="bg-light" viewBox="0 0 1440 318"><path fill="#34349b" fill-opacity="1" d="M0,224L48,192C96,160,192,96,288,90.7C384,85,480,139,576,138.7C672,139,768,85,864,64C960,43,1056,53,1152,58.7C1248,64,1344,64,1392,64L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
@endsection

@push('js')
    <script>
        $('*[href="#program-bimbel"]').attr('href', '/#program-bimbel')
    </script>
@endpush
