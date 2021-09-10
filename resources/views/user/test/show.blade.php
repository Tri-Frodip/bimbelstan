@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            {{ __('Tests') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Tests') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">

            <div class="col-md-6">
                @if ($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger text-white" role="alert">
                            {{ __('Whoopss... something went wrong!') }}
                        </div>
                    </div>
                @endif

                <form action="{{ route('user.test.update', $test->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h3>{{ $test->test_name }}</h3>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0 text-center">{{ $test->time }} {{ __('Minutes') }}</h6>
                                    <h6 class="text-center">{{ $test->test_group->count() }} {{ __('Questions') }}</h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="input-name">{{ __('Token') }}</label>
                                <div>
                                    <input type="text" name="token" id="input-token" class="form-control @error('token') is-invalid @enderror" required autofocus>

                                    @error('token')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Start') }}
                            </button>
                        </div>
                    </div><!-- /.card -->
                </form>
            </div>
        </div>
    </div>
@endsection
