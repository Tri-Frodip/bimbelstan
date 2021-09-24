<div>
    <form action="#" method="post" wire:submit.prevent='{{ $action }}'>
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-9 col-7">
                        <label for="">{{ __('Test Name') }}</label>
                        <input type="text" class="form-control @error('test_name') is-invalid @enderror" name="test_name" wire:model='test_name'>
                        @error('test_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 col-5">
                        <label for="">{{ __('Time') }}</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control @error('time') is-invalid @enderror" name="time" wire:model='time'>
                            <span class="input-group-text" style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                                <span class="d-none d-md-block">{{ __('Minutes') }}</span>
                                <span class="d-block d-md-none">{{ __('Mnts') }}</span>
                            </span>
                            @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-7 col-md-8">
                        <label for="">{{ __('Token') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('token') is-invalid @enderror" name="token" wire:model='token'>
                            <button type="button" class="btn bg-gradient-info mb-0" style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;" wire:click.prevent='generateToken'>
                                <span class="d-none d-md-block text-white"><i class="fas fa-lg fa-random text-white"></i> {{ __('Generate') }}</span>
                                <span class="d-block d-md-none"><i class="fas fa-lg fa-random text-white"></i></span>
                            </button>
                            @error('token')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-5 col-md-4">
                        <label for="">{{ __('The Parts') }}</label>
                        <button wire:click.prevent='addPart' class="btn bg-gradient-secondary w-100">{{ __('Add Part') }}</button>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        {{ $err }} <br>
                    @endforeach
                @endif
                @foreach ($parts as $i => $part)
                    <div class="form-group">
                        <label for="">{{ __('Part') }} {{ $loop->iteration }}</label>
                        <div class="input-group">
                            <select name="parts[{{ $i }}]['part_id']" class="form-control @error('parts.'.$i.'.part_id') is-invalid @enderror" wire:model='parts.{{ $i }}.part_id'>
                                <option></option>
                                @foreach (\App\Models\Part::all() as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-text">
                                <div class="form-check form-switch mb-0">
                                    <input class="form-check-input" type="checkbox" id="is_random_{{ $i }}" wire:model='parts.{{ $i }}.is_random'>
                                    <label class="form-check-label mb-0" for="is_random_{{ $i }}">{{ __('Random?') }}</label>
                                </div>
                            </div>
                            @if (!$part['is_random']&&$part['part_id']!=0)
                                <div class="btn bg-gradient-primary mb-0" data-toggle="collapse" data-target="#question{{ $loop->iteration }}" class="accordion-toggle"><i class="fas fa-caret-down"></i></div>
                            @else
                                <input type="number" class="form-control form-control-sm px-3" style="max-width: 150px" {{ $part['is_random']?'':'disabled' }} wire:model='parts.{{ $i }}.total_question' placeholder="{{ __('Question Total') }}">
                            @endif
                        </div>
                    </div>
                    @if (!$part['is_random']&&$part['part_id']!=0)
                    <div class="accordian-body collapse mb-3" id="question{{ $loop->iteration }}">
                        <ul class="list-group">
                            @foreach (\App\Models\Part::find($part['part_id'])->questions as $a => $question)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" id="questionSelected{{ $i.$a }}" wire:model.defer='parts.{{ $i }}.questions.{{ $question->id }}' name="parts[{{ $i }}]['questions'][{{ $question->id }}]">
                                    <label class="custom-control-label" for="questionSelected{{ $i.$a }}">{{ $question->question }}</label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                @endforeach
                <button class="btn bg-gradient-success">{{ __('Submit') }}</button>
            </div>
        </div>
    </form>
</div>
