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

            <div class="col-md-6">
                @if ($errors->any())
                    <div class="col-md-12">
                        <div class="alert alert-danger text-white" role="alert">
                            {{ __('Whoopss... something went wrong!') }}
                        </div>
                    </div>
                @endif

                <form action="{{ route('user.test.update', $test->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h3>{{ $test->test_name }}</h3>
                                </div>
                                <div class="col-6">
                                    <h6 class="mb-0 text-center">{{ $test->time }} {{ __('Minutes') }}</h6>
                                    <h6 class="text-center">{{ $test->test_group->count() }} {{ __('Questions') }}</h6>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="input-name">{{ __('Token') }}</label>
                                <div>
                                    <input type="text" name="token" id="input-token" class="form-control @error('token') is-invalid @enderror" required autofocus>

                                    @error('token')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.form-group -->
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modal-default"><i class="fas fa-question-circle pr-2"></i> {{ __('Working Instructions') }}</a>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                {{ __('Start') }}
                            </button>
                        </div>
                    </div><!-- /.card -->
                </form>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">{{ __('Working Instructions') }}</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">{{ __('Close') }}</button>
          </div>
        </div>
      </div>
    </div>
@endsection
