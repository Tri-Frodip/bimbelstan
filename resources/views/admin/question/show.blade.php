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
        {{ __('Add - Remove Question') }}
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
                @livewire('admin.question', ['part' => $question])
                {{-- <style>
                    .hiddenRow {
                        padding: 0 !important;
                    }
                </style>
                <div class="card">
                    <div class="card-body">
                        <div class="accordion" id="accordionQuestion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                        {{ $question->name }}
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    </button>
                                </h2>
                                <div id="collapse" class="accordion-collapse collapse show border border-top-0" aria-labelledby="headingOne" data-bs-parent="#accordionQuestion">
                                    <div class="accordion-body text-sm opacity-8">
                                        <div class="d-flex justify-content-between">
                                            <h4>{{ __("The Questions") }}</h4>
                                            <a class="btn btn-sm bg-gradient-primary" href="{{ route('admin.question.create') }}">{{ __('Add Question') }}</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px"></th>
                                                        <th style="width: 20px">{{ __('No') }}</th>
                                                        <th>{{ __('Question') }}</th>
                                                        <th style="width: 50px" class="text-center">{{ __("Action") }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($questions as $question)
                                                        <tr>
                                                            <td data-toggle="collapse" data-target="#question{{ $loop->iteration }}" class="accordion-toggle"><i class="fas fa-eye"></i></td>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ \Str::limit($question->question, 80) }}</td>
                                                            <td class="text-center">
                                                                <button wire:click.prevent='delete({{ $question->id }})' class="badge bg-gradient-danger">{{ __('Delete') }}</button>
                                                                <button wire:click.prevent='edit({{ $question->id }})' class="badge bg-gradient-info">{{ __('Edit') }}</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4" class="hiddenRow">
                                                                <div class="accordian-body collapse" id="question{{ $loop->iteration }}">
                                                                    <ul class="list-group">
                                                                        @foreach ($question->choices as $choice)
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                            {{ $choice->text }}
                                                                            @if ($question->format_validation=='normal')
                                                                                @if ($choice->is_correct==1||$choice->is_correct==5)
                                                                                <span class="badge bg-gradient-success">{{ __('Correct') }}</span>
                                                                                @endif
                                                                            @else
                                                                                <span class="badge bg-gradient-success">{{ $choice->is_correct }}</span>
                                                                            @endif
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            {{ $questions->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
