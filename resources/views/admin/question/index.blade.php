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
            {{ __('Question') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Question') }}
    </h6>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            <div class="col-12 mb-4 text-md-end">

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h3 class="card-title">
                                    {{ __('All Questions') }}
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Part Name') }}</th>
                                            <th>{{ __('Format Validation') }}</th>
                                            <th>{{ __('Question Total') }}</th>
                                            <th class="w-1 text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($parts as $part)
                                            <tr>
                                                <td class="px-3">{{ $part->name }}</td>
                                                <td class="px-3">{{ __(ucfirst($part->format_validation)) }}</td>
                                                <td class="px-3"><b>{{ $part->questions->count() }}</b> {{ __('Questions') }}</td>
                                                <td class="px-3">
                                                    <a href="{{ route('admin.question.edit', $part->id) }}" class="btn bg-gradient-success">
                                                        {{ __('Add Question') }}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
