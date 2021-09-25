@extends('layouts.guest', ['footer'=>'bg-secondary'])

@section('content')
<header class="header-2">
    <div class="page-header bg-gray-300 pt-6 pt-md-6 min-vh-100">
        <div class="container">
            <h2 class="text-center text-info text-gradient mb-0 mt-5">Registrasi Bimbingan Belajar</h2>
            <h3 class="mb-3 text-warning text-gradient text-center">Paket {{ ucfirst($price) }}</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form text-left" id="register-form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Phone') }}</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="{{ __('Phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" aria-label="{{ __('Email') }}" aria-describedby="email-addon">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Dob') }}</label>
                                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror" placeholder="{{ __('Dob') }}">
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Gender') }}</label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value=""></option>
                                        <option value="L" {{ old('gender')=='L'?'selected':'' }}>{{ __('Male') }}</option>
                                        <option value="P" {{ old('gender')=='P'?'selected':'' }}>{{ __('Female') }}</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Asal Sekolah') }}</label>
                                    <input type="text" name="instance" value="{{ old('instance') }}" class="form-control @error('instance') is-invalid @enderror" placeholder="{{ __('Instance') }}">
                                    @error('instance')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Jurusan') }}</label>
                                    <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="form-control @error('jurusan') is-invalid @enderror" placeholder="{{ __('Instance') }}">
                                    @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}" aria-describedby="password-addon">
                                        <div class="input-group-text show_password" style="cursor: pointer">
                                            <i class="fas fa-eye d-none"></i>
                                            <i class="fas fa-eye-slash"></i>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" aria-label="{{ __('Confirm Password') }}" aria-describedby="password-addon">
                                        <div class="input-group-text show_password" style="cursor: pointer">
                                            <i class="fas fa-eye d-none"></i>
                                            <i class="fas fa-eye-slash"></i>
                                        </div>
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<svg xmlns="http://www.w3.org/2000/svg" class="bg-gray-300" viewBox="0 0 1440 318"><path fill="#8392AB" fill-opacity="1" d="M0,256L48,256C96,256,192,256,288,229.3C384,203,480,149,576,144C672,139,768,181,864,192C960,203,1056,181,1152,165.3C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
@endsection

@push('js')
    <script>
        $('*[href="#program-bimbel"]').attr('href', '/#program-bimbel')
    </script>
@endpush
