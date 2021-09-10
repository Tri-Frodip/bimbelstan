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
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ route('question.index') }}">
                {{ __('Question') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            {{ __('Add New Question') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Add New Question') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger text-white" role="alert">
                        {{ __('Whoopss... something went wrong!') }}
                    </div>
                </div>
            @endif

            <div class="col-12">
                @livewire('admin.part')
            </div>
        </div>
    </div>
@endsection
