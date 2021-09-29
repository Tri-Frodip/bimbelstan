@error('is_correct')
    <div class="alert alert-danger text-white">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="">{{ __('Question') }}</label>
    <textarea type="text" id="question" class="form-control @error('question') is-invalid @enderror" name="question" placeholder="{{ __('Question Name') }}">{{ old('question', $question->question??'') }}</textarea>
    @error('question')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<hr>
@foreach ($choices as $i => $choice)
    @php $inputChoice = "choices.$i.text"; @endphp
    <div class="form-group">
        <label for="">{{ __('Choice') }} {{ $loop->iteration }}</label>
        <div class="row no-gutters">
            <div class="col-12 col-md-10">
                <textarea type="text" class="form-control col-9 @error($inputChoice) is-invalid @enderror" id="choices{{ $loop->iteration }}" placeholder="{{ __('Choice') }} - {{ $loop->iteration }}" name="choices[{{ $i }}][text]">{{ old($inputChoice, $choice['text']) }}</textarea>
                @error($inputChoice, $choices?$choices[$i]['text']:'')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 col-md-2">
                @if ($part->format_validation=='normal')
                <div class="py-0" style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                    <div class="form-check mb-0">
                        <input class="form-check-input @error($inputChoice) is-invalid @enderror" {{ $choice['is_correct']==5?'checked':'' }} type="radio" value="{{ $i }}" name="is_correct" id="customRadio{{ $i }}">
                        <label class="custom-control-label mb-0" for="customRadio{{ $i }}">{{ __('Correct?') }}</label>
                    </div>
                </div>
                @else
                <div style="border-top-right-radius: .5rem;border-bottom-right-radius: .5rem;">
                    <input type="number" min="1" max="5" placeholder="{{ __('Nilai') }}" class="form-control @error('choices.'.$i.'.is_correct') is-invalid @enderror" name="choices[{{ $i }}][is_correct]" value="{{ old('choices.'.$i.'.is_correct', $choice['is_correct']) }}">
                </div>
                @endif
            </div>
        </div>
    </div>
@endforeach

@push('js')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        var toolbarGroups = [
            {
                "name": "basicstyles",
                "groups": ["basicstyles"]
            },
            {
                "name": "paragraph",
                "groups": ["list"]
            },
            {
                "name": "document",
                "groups": ["mode"]
            },
            {
                "name": "insert",
                "groups": ["insert"]
            }
        ];
        CKEDITOR.replace('question', {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+$('input[name=_token]').val(),
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+$('input[name=_token]').val(),
            toolbarGroups
        });
        for (let index = 1; index <= 5; index++) {
            CKEDITOR.replace('choices'+index, {
                filebrowserImageBrowseUrl: '/filemanager?type=Images',
                filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token='+$('input[name=_token]').val(),
                filebrowserBrowseUrl: '/filemanager?type=Files',
                filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='+$('input[name=_token]').val(),
                height: 60,
                toolbarGroups
            });
        }
    </script>
@endpush
