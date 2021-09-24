<div>
    <style>
        .simple-choice-inner {
            display: list-item;
            list-style: lower-alpha inside;
            position: relative;
            clear: left;
        }

        .simple-choice-inner div {
            display: inline-block;
        }

        .simple-choice-inner .choiceInput {
            float: left;
            margin-right: -15px;
        }
        .form-check-input:checked[type="radio"] {
            /* margin-left: -2px; */
        }
        body{
        -webkit-touch-callout: none; /* iOS Safari */
            -webkit-user-select: none; /* Safari */
            -khtml-user-select: none; /* Konqueror HTML */
            -moz-user-select: none; /* Firefox */
                -ms-user-select: none; /* Internet Explorer/Edge */
                    user-select: none; /* Non-prefixed version, currently
                                        supported by Chrome and Opera */
        }
    </style>
    <div class="container py-4">
        <form action='' method='post' wire:submit.prevent='getResult'>
        <div class="row justify-content-center">
            <div class="col-12 mb-4 text-lg-end">

            </div>

            <div class="col-12 col-lg-8 order-lg-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-title text-center">
                            <span class='d-1'>{{ $test->test_name }}</span>
                        </div>
                        @foreach ($questions as $i => $question)
                            <span class="h4 text-center d-block d-lg-none">{{ $question->part->name }}</span>
                            <p class="d-flex justify-content-between">
                                <span class="font-weight-bold w-15">
                                    {{ __('No') }} {{ $questions->currentPage() }}
                                </span>
                                <span class="h4 text-center d-none d-lg-block">{{ $question->part->name }}</span>
                                <span class="font-weight-bold justify-content-between">
                                    <span class="badge bg-gradient-primary" id="time">{{ $diff }}</span>
                                    <span class="badge bg-gradient-success" id="done">{{ __('Done') }}</span>
                                </span>
                            </p>
                            <h6>{{ $question->question->question }}</h6>
                            <div class="choice-interaction">
                                <span class="prompt">
                                    @foreach ($question->question->choices as $a => $choice)
                                    <div class="simple-choice-inner">
                                        <div class="choiceInput">
                                            <input class="form-check-input" wire:change='saveAnswer' type="radio" value="{{ $choice->id }}" wire:model.defer='answers.{{$question->part->id}}.{{ $questions->currentPage() }}' name="answers[{{$question->part->id}}][{{ $questions->currentPage() }}]" id="choice{{ $i.$a }}">
                                        </div>
                                        <div class="choice-content">
                                            <div class="item_options">
                                                <label for="choice{{ $i.$a }}">{{ $choice->text }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 order-lg-1">
                <div class="card">
                    <div class="card-header">
                        {{ $questions->links('livewire.user.pagination') }}
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <script>
        document.addEventListener("livewire:load", function(){
            $('#done').on('click', (e)=>{
                e.preventDefault()
                Swal.fire({
                    title: 'Apakah anda yakin ingin mengakhiri ujian?',
                    text: event.detail.text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('getResult')
                    }
                })
            })
            // Swal.fire({
            //     title: 'Enable mode fullscreen?',
            //     showCancelButton: true,
            // }).then(result=>{
            //     if(result.isConfirmed){
            //         if (screenfull.isEnabled)
            //             screenfull.request();
            //     }
            // })
            setInterval(()=>{
                var ms = moment('{{$time}}',"YYYY-MM-DD HH:mm:ss").diff(moment());
                var d = moment.duration(ms);
                if(d._milliseconds<0){
                    console.log('selesai');
                    Livewire.emit('getResult')
                }
                var time = d.get("hours").toString().padStart(2, '0') +":"+ d.get("minutes").toString().padStart(2, '0') +":"+ d.get("seconds").toString().padStart(2, '0')
                $('#time').text(time)
            },1000)
        })
    </script>
</div>
