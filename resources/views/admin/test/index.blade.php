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
                                {{ __('All Tests') }}
                            </h3>
                        </div>
                        <div class="col text-md-end">
                            <div>
                                <a href="{{ route('admin.test.create') }}" class="btn bg-gradient-primary" role="button">
                                    {{ __('Add') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-vcenter">
                            <thead>
                                <tr>
                                    <th>{{ __('Test Name') }}</th>
                                    <th>{{ __('Time') }}</th>
                                    <th>{{ __('Part Count') }}</th>
                                    <th>{{ __('Question Total') }}</th>
                                    <th>{{ __('Token') }}</th>
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
                                        <td><b>{{ $test->token }}</b></td>
                                        <td>
                                            <form action="{{ route('admin.test.destroy', $test->id) }}" method="post" class="deleteForm">
                                                @csrf
                                                @method('delete')
                                                <button class="btn bg-gradient-danger">{{ __('Delete') }}</button>
                                                <a href="{{ route('admin.test.edit', $test->id) }}" class="btn bg-gradient-info">{{ __('Edit') }}</a>
                                            </form>
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

@push('js')
    <script>
        $('.deleteForm').on('submit', function(e){
            e.preventDefault()
            Swal.fire({
                title: "{{ __('Are you sure?') }}",
                text: "{{ __('The test will be deleted permanently') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{ __('Yes') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit()
                }
            })
        })
    </script>
@endpush
