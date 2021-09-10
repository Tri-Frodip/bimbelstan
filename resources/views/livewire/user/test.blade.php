<div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 mb-4 text-md-end">

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action='' method='post' wire:submit.prevent='getResult'>
                        @foreach ($questions as $i => $question)
                            <p class="d-flex justify-content-between">
                                <span class="font-weight-bold">
                                    {{ __('No') }} {{ $questions->currentPage() }}
                                </span>
                                <span class="h3">{{ $question->part->name }}</span>
                                <span class="font-weight-bold">
                                    {{ __('Time') }}
                                    <span class="badge bg-gradient-primary" id="time">{{ $diff }}</span>
                                    <span class="badge bg-gradient-success" wire:click.prevent='getResult'>{{ __('Done') }}</span>
                                </span>
                            </p>
                            <h6>{{ $question->question->question }}</h6>
                            <ul style="padding-left: 5px">
                                @foreach ($question->question->choices as $a => $choice)
                                    <li style="list-style: none">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" wire:change='saveAnswer' type="radio" value="{{ $choice->id }}" wire:model.defer='answers.{{$question->part->id}}.{{ $questions->currentPage() }}' name="answers[{{$question->part->id}}][{{ $questions->currentPage() }}]" id="choice{{ $i.$a }}">
                                            <label class="custom-control-label" for="choice{{ $i.$a }}">{{ $choice->text }}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                        {{ $questions->links('livewire.user.pagination') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("livewire:load", function(){
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
