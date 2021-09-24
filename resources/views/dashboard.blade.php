@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ url('/') }}">
                <img src="/logo-no-bg.png" style="max-width: 100px" alt="" srcset="">
            </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active my-auto" aria-current="page">
            {{ __('Dashboard') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Dashboard') }}
    </h6>
@endsection

@section('content')
    @can('admin')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="col-md-4 col-12">
                <div class="card border-primary mb-2" style="border-left: 3px solid; height: 140px;">
                    <div class="card-body text-center">
                        <div class="pt-4">
                            <p class="lead">
                                <i class="fas fa-users fa-lg pr-3"></i> {{ __('Users Total') }} {{ $users->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border-primary mb-2" style="border-left: 3px solid; height: 140px;">
                    <div class="card-body text-center">
                        <div class="pt-4">
                            <p class="lead">
                                <i class="fas fa-cubes fa-lg pr-3"></i> {{ __('Part Count') }} {{ $parts->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card border-primary mb-2" style="border-left: 3px solid; height: 140px;">
                    <div class="card-body text-center">
                        <div class="pt-4">
                            <p class="lead">
                                <i class="fas fa-question fa-lg pr-3"></i> {{ __('Question Total') }} {{ $questions->count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="w-100">
            <img src="{{ url('bg-user.jpg') }}" style="max-width: 100%" alt="" srcset="">
        </div>
    @endcan
@endsection
