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
            <a class="opacity-5 text-dark" href="{{ route('user.test.index') }}">
                {{ __('results') }}
            </a>
        </li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
            {{ __('Results') }}
        </li>
    </ol>
@endsection

@section('title')
    <h6 class="font-weight-bolder mb-0">
        {{ __('Test Results') }}
    </h6>
@endsection

@push('css')
    <style>
        .hiddenRow {
            padding: 0 !important;
        }
    </style>
@endpush

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
                    @if ($results->count()>0)
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{ __('Test Name') }}</th>
                                    <th>{{ __('Time') }}</th>
                                    <th>{{ __('Part Count') }}</th>
                                    <th>{{ __('Question Total') }}</th>
                                    <th class="w-1 text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->test->test_name }}</td>
                                        <td>{{ $result->test->time }} {{ __('Minutes') }}</td>
                                        <td><b>{{ $result->test->test_group->groupBy('part_id')->count() }}</b> {{ __('Parts') }}</td>
                                        <td><b>{{ $result->test->test_group->count() }}</b> {{ __('Questions') }}</td>
                                        <td data-toggle="collapse" data-target="#result{{ $loop->iteration }}" class="accordion-toggle">
                                            <button class="btn bg-gradient-info mb-0">{{ __('Detail') }}</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="hiddenRow">
                                            <div class="accordian-body collapse" id="result{{ $loop->iteration }}">
                                                <ul class="list-group">
                                                    @foreach (json_decode($result->result, false) as $test => $total)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $test }}
                                                        <span class="badge bg-gradient-success">{{ $total }}</span>
                                                    </li>
                                                    @endforeach
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="font-weight-bold">{{ __('Total') }}</span>
                                                        <span class="badge bg-gradient-primary">{{ $result->total }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-warning text-white">{{ __('Test result not available') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
