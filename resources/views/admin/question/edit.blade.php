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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ __('Part').' '.$part->name }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.question.update', ['part'=>$part, 'question'=>$question]) }}" method="post">
                            @csrf
                            @include('admin.question._form', ['question'=>$question])
                            <button class="btn bg-gradient-success">{{ __('Add') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
