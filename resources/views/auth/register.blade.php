@extends('layouts.auth')

@section('heading', 'Welcome!')
@section('sub-heading', 'Use these awesome forms to create new account.')
@section('header-bg', asset('vendor/soft-ui/img/curved-images/curved6.jpg'))

@section('content')
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-6 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4 pb-0">
                        <h5>{{ __('Daftar Try Out gratis') }}</h5>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-white text-center">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" id="form-register" role="form text-left">
                            <input type="hidden" name="price" value="normal">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}">
                                <div class="invalid-feedback">@error('name')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Phone') }}</label>
                                <input type="number" name="phone" class="form-control" placeholder="{{ __('Phone') }}">
                                <div class="invalid-feedback">@error('phone')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="email" class="form-control" placeholder="{{ __('Email') }}" aria-label="{{ __('Email') }}" aria-describedby="email-addon">
                                <div class="invalid-feedback">@error('email')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Dob') }}</label>
                                <input type="date" name="dob" class="form-control" placeholder="{{ __('Dob') }}">
                                <div class="invalid-feedback">@error('dob')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Gender') }}</label>
                                <select name="gender" class="form-control">
                                    <option value=""></option>
                                    <option value="L">{{ __('Male') }}</option>
                                    <option value="P">{{ __('Female') }}</option>
                                </select>
                                <div class="invalid-feedback">@error('gender')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Instance') }}</label>
                                <input type="text" name="instance" class="form-control" placeholder="{{ __('Instance') }}">
                                <div class="invalid-feedback">@error('instance')
                                    {{ $message }}
                                @enderror</div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password-addon">
                                    <div class="input-group-text show_password" style="cursor: pointer">
                                        <i class="fas fa-eye d-none"></i>
                                        <i class="fas fa-eye-slash"></i>
                                    </div>
                                    <div class="invalid-feedback">@error('password')
                                        {{ $message }}
                                    @enderror</div>
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
                                    <div class="invalid-feedback">@error('')
                                        {{ $message }}
                                    @enderror</div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 mb-2">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            @if (Route::has('login'))
                                <p class="text-sm mt-3 mb-0 text-center">
                                    {{ __('Already have an account?') }}
                                    <a href="{{ route('login') }}" class="text-dark font-weight-bolder">
                                        {{ __('Login here.') }}
                                    </a>
                                </p>
                            @endif

                            @if (Route::has('password.request'))
                                <p class="text-sm mt-3 mb-0 text-center">
                                    <a href="{{ route('password.request') }}" class="text-dark font-weight-bolder">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                </p>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.show_password').on('click',function(){
            let icon = $(this).children()
            let eye = $(icon[0]);
            let eye_slash = $(icon[1]);
            let input_type = $(this).prev()[0].type
            $(this).prev()[0].type = input_type == 'password'?'text':'password';
            eye.toggleClass('d-none')
            eye_slash.toggleClass('d-none');
        })
        $('#form-register').on('submit', function(e){
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
                        html: `Silahkan melakukan transaksi ke norek <b>${result.norek}</b> sebesar harga <b>${price}</b>`
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
