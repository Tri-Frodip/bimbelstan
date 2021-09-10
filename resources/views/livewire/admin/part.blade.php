<div>
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
                                    {{ __('All Parts') }}
                                </h3>
                            </div>
                            <div class="col text-md-end">
                                <div>
                                    <button wire:click='create' class="btn btn-primary" role="button">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($showForm)
                        <form action="" method="post" wire:submit.prevent='{{ $part_id==0?'store':'update' }}'>
                            <div class="form-group row">
                                <div class="col-8">
                                    <label for="">{{ __('Part Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" wire:model='name'>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">{{ __('Format Validation') }}</label>
                                    <div class="input-group @error('format_validation') is-invalid @enderror">
                                        <select name="format_validation" wire:model='format_validation' id="" class="form-control @error('format_validation') is-invalid @enderror">
                                            @foreach ($formats as $key => $format)
                                            <option value="{{ $key }}">{{ $format }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn bg-gradient-success mb-0">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </div>
                                    @error('format_validation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>{{ __('Part Name') }}</th>
                                        <th>{{ __('Format Validation') }}</th>
                                        <th class="w-1 text-center">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parts as $i => $part)
                                        <tr>
                                            <td class="px-3">{{ $part->name }}</td>
                                            <td class="px-3">{{ __(ucfirst($part->format_validation)) }}</td>
                                            <td class="px-3">
                                                <button class="btn bg-gradient-danger" wire:click='delete({{ $i.','.$part->id }})'>
                                                    {{ __('Delete') }}
                                                </button>
                                                <button wire:click.prevent='edit({{ $i.','.$part->id }})' class="btn bg-gradient-success">
                                                    {{ __('Edit') }}
                                                </button>
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
</div>
