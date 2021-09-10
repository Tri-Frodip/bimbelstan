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
        @if (session('status'))
            <div class="col-12">
                <div class="alert alert-success text-white" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <div class="col-12 mb-4 text-md-end">

        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if ($tests->count()>0)
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{ __('Test Name') }}</th>
                                    <th>{{ __('Time') }}</th>
                                    <th>{{ __('Part Count') }}</th>
                                    <th>{{ __('Total Question') }}</th>
                                    <th class="w-1 text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $test->test_name }}</td>
                                        <td>{{ $test->time }} {{ __('Minutes') }}</td>
                                        <td><b>{{ $test->test_group->groupBy('part_id')->count() }}</b> {{ __('Parts') }}</td>
                                        <td><b>{{ $test->test_group->count() }}</b> {{ __('Questions') }}</td>
                                        <td>
                                            <a href="{{ route('user.test.show', $test->id) }}" class="btn bg-gradient-success">{{ __('Test') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-warning text-white">{{ __('Test not available') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
