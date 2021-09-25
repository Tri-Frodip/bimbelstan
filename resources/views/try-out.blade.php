@extends('layouts.guest', ['style'=>
    ''
])

@section('content')
<header class="header-2">
    <div class="page-header pt-6 pb-0 pt-md-4 bg-light min-vh-100">
        <div class="container">
            <h3 class="my-3 pt-6 text-center">Program Try Out</h3>
            <div class="row pb-0">
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow">
                        <div class="card-header text-center pb-0">
                            <h3 class="card-title">{{ __('Regular') }}</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul>
                                <li>Gatau</li>
                                <li>Bebas</li>
                                <li>Gatau</li>
                                <li>Bebas</li>
                                <li>Gatau</li>
                                <li>Bebas</li>
                            </ul>
                            <div class="form-group text-center my-0">
                                <button class="btn bg-gradient-info w-75 price" data-price="regular">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow">
                        <div class="card-header text-center pb-0">
                            <h3 class="card-title text-black">{{ __('Premium') }}</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul>
                                <li>Gatau</li>
                                <li>Bebas</li>
                            </ul>
                            <div class="form-group text-center my-0">
                                <button class="btn bg-gradient-info w-75 price" data-price="premium">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow">
                        <div class="card-header text-center pb-0">
                            <h3 class="card-title">{{ __('Gold') }}</h3>
                        </div>
                        <div class="card-body pt-0">
                            <ul>
                                <li>Gatau</li>
                                <li>Bebas</li>
                            </ul>
                            <div class="form-group text-center my-0">
                                <button class="btn bg-gradient-info w-75 price" data-price="gold">Daftar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</header>
<svg xmlns="http://www.w3.org/2000/svg" class="bg-light" viewBox="0 0 1440 319"><path fill="#34349b" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
{{-- Modal --}}
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header text-center pb-0 text-left">
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
                    <select name="gender" class="form-control">
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
        $('*[href="#program-bimbel"]').attr('href', '/#program-bimbel')
        String.prototype.capitalize = function() {
            return this.charAt(0).toUpperCase() + this.slice(1);
        }
        $('.price').on('click', function(){
            let price = $(this).data('price');
            console.log(price);
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
