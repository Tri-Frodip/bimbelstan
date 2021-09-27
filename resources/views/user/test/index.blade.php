@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm">
            <a class="opacity-5 text-dark" href="{{ url('/') }}">
                <img src="/logo-no-bg.png" style="max-width: 100px" alt="" srcset="">
            </a>
        </li>
    </ol>
@endsection

@push('css')
    <style>
        .hiddenRow {
            padding: 0 !important;
        }
    </style>
@endpush

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
                                    <th>{{ __('Question Total') }}</th>
                                    <th class="w-1 text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>
                                            {{ $test->test_name }}
                                            @if (in_array($test->id, $result_test))
                                                <div class="ml-3 badge bg-gradient-danger">{{ __('Disable') }}</div>
                                            @else
                                                <div class="ml-3 badge bg-gradient-success">{{ __('Available') }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $test->time }} {{ __('Minutes') }}</td>
                                        <td><b>{{ $test->test_group->groupBy('part_id')->count() }}</b> {{ __('Parts') }}</td>
                                        <td><b>{{ $test->test_group->count() }}</b> {{ __('Questions') }}</td>
                                        <td>
                                            @if (in_array($test->id, $result_test))
                                                <a data-toggle="collapse" data-target="#result{{ $loop->iteration }}" class="btn mb-0 bg-gradient-info">{{ __('Test Result') }}</a>
                                            @else
                                                <a href="{{ route('user.test.show', $test->id) }}" class="btn mb-0 bg-gradient-success">{{ __('Test') }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="hiddenRow">
                                            <div class="accordian-body collapse" id="result{{ $loop->iteration }}">
                                                <ul class="list-group">
                                                    @foreach (json_decode($test->getMyResult()->result??'[]', false)->part??[] as $test_name => $total)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{ $test_name }}
                                                        @if ((json_decode($test->getMyResult()->result??'[]', false)->lulus??[])->$test_name)
                                                            <span class="badge text-right bg-gradient-success">Lulus</span>
                                                        @else
                                                            <span class="badge text-right bg-gradient-danger">Tidak Lulus</span>
                                                        @endif
                                                        <span class="badge bg-gradient-success">{{ $total }}</span>
                                                    </li>
                                                    @endforeach
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="font-weight-bold">{{ __('Total') }}</span>
                                                        <span class="badge bg-gradient-primary">{{ $test->getMyResult()->total??0 }}</span>
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
                    <div class="alert alert-warning text-white">{{ __('Test not available') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
