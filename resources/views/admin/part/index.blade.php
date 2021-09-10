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
            {{ __('Part') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Part') }}
    </h6>
@endsection

@section('content')
    @livewire('admin.part')
@endsection

