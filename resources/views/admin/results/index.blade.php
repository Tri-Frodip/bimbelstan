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
                    <div class="row">
                        <div class="col">
                            <h3 class="card-title">
                                {{ __('All Users') }}
                            </h3>
                        </div>
                        <div class="col text-md-end">
                            <div>
                                <a href="{{ url('export-users') }}" class="btn bg-gradient-success" role="button">
                                    <i class="fas fa-file-excel mr-3 text-white"></i> {{ __('Export') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Dob') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th class="w-1 text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $user->name }}
                                            {!! $user->getStatus() !!}
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dob }}</td>
                                        <td>{{ ucfirst($user->price) }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle dropdown-toggle-split mb-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i>
                                                </button>
                                                <ul class="dropdown-menu shadow-sm">
                                                    <li>
                                                        <form action="/admin/reset-test/{{ $user->id }}" method="post">
                                                            @csrf @method('delete')
                                                            <button class="dropdown-item" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                                                <i class="fas fa-trash-restore-alt pr-2"></i> {{ __('Reset Test') }}
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" data-bs-toggle="collapse" href="#collapse{{ $loop->iteration }}" role="button" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                                            <i class="fas fa-info-circle pr-2"></i> {{ __('Detail') }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('user-test.export_pdf', $user) }}" target="_blank" class="dropdown-item">
                                                            <i class="fas fa-file-pdf pr-2"></i> {{ __('Export PDF') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="py-0 border-0 w-100">
                                            <div class="collapse p-2" id="collapse{{ $loop->iteration }}">
                                                @if ($user->test_results->count()>0)
                                                <div class="card card-body">
                                                    <ul class="list-group">
                                                        @foreach ($user->test_results as $result)
                                                            <li class="list-group-item active">{{ $result->test->test_name }}</li>
                                                            @foreach (json_decode($result->result, false)->part as $test_name => $total)
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $test_name }}
                                                                @if ((json_decode($result->result, false)->lulus)->$test_name)
                                                                    <span class="badge text-right bg-gradient-success">Lulus</span>
                                                                @else
                                                                    <span class="badge text-right bg-gradient-danger">Tidak Lulus</span>
                                                                @endif
                                                                <span class="badge bg-gradient-success">{{ $total }}</span>
                                                            </li>
                                                            @endforeach
                                                            <li class="list-group-item d-flex justify-content-between pl-3">
                                                                <b>{{ __('Total') }}</b>
                                                                <span class="badge bg-gradient-success">{{ $result->total }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @else
                                                <div class="alert alert-warning mt-2 text-white font-weight-bold">{{ __('The User has not been tested.') }}</div>
                                                @endif
                                            </div>
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
@endsection
