@extends('layouts.guest')

@section('content')
    <style>
        .logo-penempatan{
            max-height: 50px;
            margin-right: 30px;
        }
        .instansi{
            margin-bottom: 40px;
        }
        .instansi span:nth-of-type(2){
            vertical-align: middle;
            display: inline-block;
            width: 80%;
            margin-left: 15px
        }
    </style>
    <header class="header-2">
        <div class="page-header min-vh-100 relative" style="background-image: url('{{ asset('vendor/soft-ui/img/curved-images/white-curved.jpeg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <div>
                            <img src="{{ asset('logo-no-bg.png') }}" class="w-60 py-3" alt="{{ __('FortifySoftUi') }}">
                        </div>
                        <h1 class="text-secondary pt-5 mt-n5">
                            {{ __('Web Ujian CPNS') }}
                        </h1>
                        <p class="lead text-secondary mt-3">
                            {{ __('The power or Laravel and the beauty of Soft UI theme.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="position-absolute w-100 z-index-1 bottom-0">
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="moving-waves">
                        <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                        <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                        <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="#ececec" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
    <section id="mengapa-pkn-stan" class="pt-5" style="background: #ececec">
        <div class="container mx-auto">
            <h3 class="text-center">Mengapa PKN STAN</h3>
            <div class="row mt-5">
                <div class="col-md-6 col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button font-weight-bold fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Accordion Item #1
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button font-weight-bold fs-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button font-weight-bold fs-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Accordion Item #3
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="accordion" id="accordionExample2">
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button font-weight-bold fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                              Accordion Item #1
                            </button>
                          </h2>
                          <div id="collapseOne2" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button font-weight-bold fs-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item shadow bg-white mb-2">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button font-weight-bold fs-4 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                              Accordion Item #3
                            </button>
                          </h2>
                          <div id="collapseThree3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample2">
                            <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 class="text-center my-5">Instansi Penampung Lulusan STAN</h4>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Pajak</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Inspektorat Jenderal</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Badan Kebijakan Fiskal</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Kekayaan Negara</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Badan Pendidikan dan Pelatihan Keuangan</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Anggaran</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Perimbangan Keuangan</span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Pajak</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Inspektorat Jenderal</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Badan Kebijakan Fiskal</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Kekayaan Negara</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">Badan Pendidikan dan Pelatihan Keuangan</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Anggaran</span>
                    </div>
                    <div class="instansi">
                        <span class="p-3 bg-warning" style="border-radius: 50%"><i class="fas fa-rocket"></i></span>
                        <span class="h5">DitJen Perimbangan Keuangan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" style="background: #ececec" viewBox="0 0 1440 318"><path fill="#fff" fill-opacity="1" d="M0,288L60,272C120,256,240,224,360,224C480,224,600,256,720,256C840,256,960,224,1080,208C1200,192,1320,192,1380,192L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <section id="profile" class="bg-white">
        <div class="container">
            <h3 class="mb-0 text-center">Profil Kami</h3>
            <p class="mb-0 text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam blanditiis doloribus veritatis ducimus fuga iure ipsa nesciunt quia voluptas voluptates dolores nemo ea voluptate ut nihil, eum quae porro veniam. Ipsa fuga mollitia aspernatur consequuntur quod. Quam amet laborum ab adipisci, fugiat atque sed accusamus eligendi soluta cupiditate iusto ea commodi! Quos eligendi consequuntur ratione quisquam, odit nisi necessitatibus odio facere voluptatem minima possimus amet suscipit quae mollitia vel soluta autem sequi consectetur excepturi non dolore molestiae pariatur assumenda! Praesentium optio reprehenderit repellendus sequi amet, cum rerum! Reiciendis harum sunt iusto nemo officia blanditiis eligendi voluptate voluptatum esse laboriosam. Architecto!</p>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" style="background: white" viewBox="0 0 1440 318"><path fill="rgb(168, 181, 207)" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <section id="keunggulan" class="py-6" style="background: rgb(168, 181, 207)">
        <div class="container">
            <h3 class="text-center mb-6">Keunggulan Tri Frodip</h3>
            <div class="row">
                <div class="col-md-3 col-12 text-center">
                    <i class="fas fa-lg bg-primary p-4 text-white fa-book" style="border-radius: 50%"></i>
                    <h5 class="my-4">Keunggulan 1</h5>
                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eum a iusto hic ea vitae nesciunt optio at esse! Unde voluptatem minima quos quibusdam sint adipisci. Fugiat, excepturi! Sapiente, fugit.</p>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <i class="fas fa-lg bg-primary p-4 text-white fa-book" style="border-radius: 50%"></i>
                    <h5 class="my-4">Keunggulan 2</h5>
                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eum a iusto hic ea vitae nesciunt optio at esse! Unde voluptatem minima quos quibusdam sint adipisci. Fugiat, excepturi! Sapiente, fugit.</p>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <i class="fas fa-lg bg-primary p-4 text-white fa-book" style="border-radius: 50%"></i>
                    <h5 class="my-4">Keunggulan 3</h5>
                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eum a iusto hic ea vitae nesciunt optio at esse! Unde voluptatem minima quos quibusdam sint adipisci. Fugiat, excepturi! Sapiente, fugit.</p>
                </div>
                <div class="col-md-3 col-12 text-center">
                    <i class="fas fa-lg bg-primary p-4 text-white fa-book" style="border-radius: 50%"></i>
                    <h5 class="my-4">Keunggulan 4</h5>
                    <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit eum a iusto hic ea vitae nesciunt optio at esse! Unde voluptatem minima quos quibusdam sint adipisci. Fugiat, excepturi! Sapiente, fugit.</p>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 318"><path fill="rgb(168, 181, 207)" fill-opacity="1" d="M0,64L60,85.3C120,107,240,149,360,154.7C480,160,600,128,720,106.7C840,85,960,75,1080,96C1200,117,1320,171,1380,197.3L1440,224L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
    <section id="program-bimbel">
        <div class="container" style="margin-top: 30px;">
            <h3 class="my-6 text-center">Program Bimbingan Belajar</h3>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header text-center pb-0">
                            <h3 class="card-title text-black">{{ __('Silver') }}</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul>
                                <li>Gatau</li>
                                <li>Bebas</li>
                            </ul>
                            <div class="form-group text-center my-0">
                                <a href="/paket-bimbel/silver" class="btn bg-gradient-info w-100 price" data-price="premium">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header text-center pb-0">
                            <h3 class="card-title">{{ __('Gold') }}</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul>
                                <li>Gatau</li>
                                <li>Bebas</li>
                            </ul>
                            <div class="form-group text-center my-0">
                                <a href="/paket-bimbel/gold" class="btn bg-gradient-info w-100 price" data-price="gold">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" style="background: transparent" viewBox="0 0 1440 318"><path fill="rgb(165, 171, 255)" fill-opacity="1" d="M0,128L60,144C120,160,240,192,360,176C480,160,600,96,720,90.7C840,85,960,139,1080,160C1200,181,1320,171,1380,165.3L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <section id="testimonials" style="background: rgb(165, 171, 255)">
        <div class="container">
            <h3 class="text-center mb-6">Testimoni</h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card mb-3 border-secondary" style="border-bottom: 3px solid;">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <img src="{{ asset('vendor/soft-ui/img/team-1.jpg') }}" style="max-width: 100%; border-radius: 50%" srcset="">
                                </div>
                                <div class="col-9">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro corrupti voluptatum maiores inventore? Consequuntur, laudantium dolores excepturi deleniti quasi quia, iure quaerat, vel nihil repellat temporibus quos consequatur necessitatibus facere omnis optio nemo quae unde sint possimus eligendi.</p>
                                    <h6 class="mb-0 pb-0">Alexandra Graham Bell</h6>
                                    <p class="mt-0 pt-0">Alumni STAN 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mb-3 border-secondary" style="border-bottom: 3px solid;">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <img src="{{ asset('vendor/soft-ui/img/team-2.jpg') }}" style="max-width: 100%; border-radius: 50%" srcset="">
                                </div>
                                <div class="col-9">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro corrupti voluptatum maiores inventore? Consequuntur, laudantium dolores excepturi deleniti quasi quia, iure quaerat, vel nihil repellat temporibus quos consequatur necessitatibus facere omnis optio nemo quae unde sint possimus eligendi.</p>
                                    <h6 class="mb-0 pb-0">Lorem, ipsum dolor.</h6>
                                    <p class="mt-0 pt-0">Alumni STAN 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card mb-3 border-secondary" style="border-bottom: 3px solid;">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <img src="{{ asset('vendor/soft-ui/img/team-3.jpg') }}" style="max-width: 100%; border-radius: 50%" srcset="">
                                </div>
                                <div class="col-9">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro corrupti voluptatum maiores inventore? Consequuntur, laudantium dolores excepturi deleniti quasi quia, iure quaerat, vel nihil repellat temporibus quos consequatur necessitatibus facere omnis optio nemo quae unde sint possimus eligendi.</p>
                                    <h6 class="mb-0 pb-0">Lorem ipsum dolor sit amet consectetur adipisicing.</h6>
                                    <p class="mt-0 pt-0">Alumni STAN 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mb-3 border-secondary" style="border-bottom: 3px solid;">
                        <div class="card-body">
                            <div class="row no-gutters">
                                <div class="col-3">
                                    <img src="{{ asset('vendor/soft-ui/img/team-4.jpg') }}" style="max-width: 100%; border-radius: 50%" srcset="">
                                </div>
                                <div class="col-9">
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro corrupti voluptatum maiores inventore? Consequuntur, laudantium dolores excepturi deleniti quasi quia, iure quaerat, vel nihil repellat temporibus quos consequatur necessitatibus facere omnis optio nemo quae unde sint possimus eligendi.</p>
                                    <h6 class="mb-0 pb-0">Lorem ipsum dolor sit.</h6>
                                    <p class="mt-0 pt-0">Alumni STAN 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" style="background: rgb(165, 171, 255)" viewBox="0 0 1440 318"><path fill="rgb(52, 52, 155)" fill-opacity="1" d="M0,224L60,224C120,224,240,224,360,208C480,192,600,160,720,138.7C840,117,960,107,1080,101.3C1200,96,1320,96,1380,96L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
@endsection

@push('js')
@if (session()->has('status'))
    <script>
        Toast.fire({
            icon: 'success',
            title: "{{ session()->get('status') }}"
        })
    </script>
@endif
@endpush
