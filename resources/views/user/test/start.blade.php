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
        {{ __('Start Test') }}
    </h6>
@endsection

@section('content')
    @livewire('user.test', ['test' => $test,'time'=>$time])
@endsection

@push('js')
    <script>
        setInterval(()=>{
            var ms = moment('{{$time}}',"YYYY-MM-DD HH:mm:ss").diff(moment());
            var d = moment.duration(ms);
            console.log(d);
            var time = d.get("hours").toString().padStart(2, '0') +":"+ d.get("minutes").toString().padStart(2, '0') +":"+ d.get("seconds").toString().padStart(2, '0')
            $('#time').text(time)
        },1000)
    </script>
@endpush
