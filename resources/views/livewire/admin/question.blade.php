<div>
    <style>
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
                            {{ $part->name }}
                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                        </button>
                    </h2>
                    <div id="collapse" class="accordion-collapse collapse show border border-top-0" aria-labelledby="headingOne" data-bs-parent="#accordionQuestion">
                        <div class="accordion-body text-sm opacity-8">
                            <div class="d-flex justify-content-between">
                                <h4>{{ __("The Questions") }}</h4>
                                <button class="btn btn-sm bg-gradient-primary" wire:click.prevent="addQuestion">{{ __('Add Question') }}</button>
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
                                                                @if ($part->format_validation=='normal')
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
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addQuestion" tabindex="-1" role="dialog" aria-labelledby="addQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addQuestionLabel">{{ $modalTitle }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @error('is_correct')
                    <div class="alert alert-danger text-white">{{ $message }}</div>
                @enderror
                <form action="" method="post" wire:submit.prevent='{{ $action }}' id="form">
                    <div class="form-group">
                        <label for="">{{ __('Question') }}</label>
                        <textarea type="text" class="form-control @error('question') is-invalid @enderror" wire:model.defer='question' name="question" placeholder="{{ __('Question Name') }}"></textarea>
                        @error('question')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    @foreach ($choices as $i => $choice)
                        @php $inputChoice = "choices.$i.text"; @endphp
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control col-9 @error($inputChoice) is-invalid @enderror" placeholder="{{ __('Choice') }} - {{ $loop->iteration }}" wire:model.defer="{{ $inputChoice }}" name="choices[{{ $i }}]['text']">
                                @if ($part->format_validation=='normal')
                                <div class="input-group-text py-0" style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input @error($inputChoice) is-invalid @enderror" type="radio" value="{{ $i }}" wire:model.defer='is_correct' name="is_correct" id="customRadio{{ $i }}">
                                        <label class="custom-control-label mb-0" for="customRadio{{ $i }}">{{ __('Correct?') }}</label>
                                    </div>
                                </div>
                                @else
                                <div class="input-group-text w-25" style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                                    <input type="number" min="1" max="5" class="form-control @error('choices.'.$i.'.is_correct') is-invalid @enderror" name="choices[{{ $i }}]['is_correct']" wire:model='choices.{{ $i }}.is_correct'>
                                </div>
                                @endif
                                @error($inputChoice)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button wire:click.prevent='{{ $action }}' class="btn bg-gradient-primary">{{ __('Save Changes') }}</button>
            </div>
        </div>
        </div>
    </div>
    <script>
        // let inputs = document.querySelectorAll('input');
        // console.log(inputs);
        // inputs.forEach((node,i)=>{
        //     node.addEventListener('focus', function(){
        //         console.log('tereset');
        //         // window.livewire.emit('resetValidate', '')
        //     })
        // })

    </script>
</div>
