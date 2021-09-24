@extends('layouts.guest')

@section('content')
    <header class="header-2">
        <div class="page-header min-vh-75 relative" style="background-image: url('{{ asset('vendor/soft-ui/img/curved-images/curved.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <div>
                            <img src="{{ asset('logo-no-bg.png') }}" class="w-30 py-3" alt="{{ __('FortifySoftUi') }}">
                        </div>
                        <h1 class="text-white pt-5 mt-n5">
                            {{ __('Web Ujian CPNS') }}
                        </h1>
                        <p class="lead text-white mt-3">
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
                        <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
                    </g>
                </svg>
            </div>
        </div>
    </header>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title">{{ __('Regular') }}</h3>
                    </div>
                    <div class="card-body pt-0">
                        <ul>
                            <li>Gatau</li>
                            <li>Bebas</li>
                        </ul>
                        <button class="btn bg-gradient-success price" data-price="regular">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title text-black">{{ __('Premium') }}</h3>
                    </div>
                    <div class="card-body pt-0">
                        <ul>
                            <li>Gatau</li>
                            <li>Bebas</li>
                        </ul>
                        <button class="btn bg-gradient-success price" data-price="premium">Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title">{{ __('Gold') }}</h3>
                    </div>
                    <div class="card-body pt-0">
                        <ul>
                            <li>Gatau</li>
                            <li>Bebas</li>
                        </ul>
                        <button class="btn bg-gradient-success price" data-price="gold">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-info text-gradient" id="title-modal"></h3>
                  {{-- <p class="mb-0">Enter your email and password to sign in</p> --}}
                </div>
                <div class="card-body">
                  <form role="form text-left" id="register-form" method="post">
                    <input type="hidden" name="price">
                    <div class="form-group">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Phone') }}</label>
                        <input type="number" name="phone" class="form-control" placeholder="{{ __('Phone') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}" aria-label="{{ __('Email') }}" aria-describedby="email-addon">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Dob') }}</label>
                        <input type="date" name="dob" class="form-control" placeholder="{{ __('Dob') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Gender') }}</label>
                        <select name="gender" class="custom-select">
                            <option value=""></option>
                            <option value="L">{{ __('Male') }}</option>
                            <option value="P">{{ __('Female') }}</option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Instance') }}</label>
                        <input type="text" name="instance" class="form-control" placeholder="{{ __('Instance') }}">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Password') }}</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password-addon">
                            <div class="input-group-text show_password" style="cursor: pointer">
                                <i class="fas fa-eye d-none"></i>
                                <i class="fas fa-eye-slash"></i>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm Password') }}</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" aria-label="{{ __('Confirm Password') }}" aria-describedby="password-addon">
                            <div class="input-group-text show_password" style="cursor: pointer">
                                <i class="fas fa-eye d-none"></i>
                                <i class="fas fa-eye-slash"></i>
                            </div>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">{{ __('Register') }}</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    {{ __("Have an account?") }}
                    <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">{{ __('Login') }}</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('js')
    <script>
        String.prototype.capitalize = function() {
            return this.charAt(0).toUpperCase() + this.slice(1);
        }
        $('.price').on('click', function(){
            let price = $(this).data('price');
            $('input[name=price]').val(price)
            $('#title-modal').text('Paket '+price.toString().capitalize());
            $('#modal-form').modal('show')
        })
        $('.show_password').on('click',function(){
            let icon = $(this).children()
            let eye = $(icon[0]);
            let eye_slash = $(icon[1]);
            let input_type = $(this).prev()[0].type
            $(this).prev()[0].type = input_type == 'password'?'text':'password';
            eye.toggleClass('d-none')
            eye_slash.toggleClass('d-none');
        })
        $('#register-form').on('submit', function(e){
            e.preventDefault()
            let data = $(this).serialize();
            $.ajax({
                url: '/api/register',
                method: 'post',
                data,
                success: function(result){
                    ['name','phone','email','dob','gender','instance','password','password_confirmation'].forEach((v)=>{
                        $(`input[name=${v}],select[name=${v}]`).val('')
                    })
                    $('#modal-form').modal('hide')
                    let price = result.price.toLocaleString('id', { style: 'currency', currency: 'IDR' });
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil terdaftar',
                        html: `Silahkan melakukan transaksi ke norek <b>0823498712</b> sebesar harga <b>${price}</b>`
                    })
                },
                error: function({responseJSON}){
                    for(err in responseJSON.errors){
                        $(`*[name=${err}]`).addClass('is-invalid').parent().find('.invalid-feedback').text(responseJSON.errors[err][0])
                    }
                }
            });
        })
        $('input,select').on('change keyup',function(){
            $(this).removeClass('is-invalid')
        })
    </script>
@endpush
