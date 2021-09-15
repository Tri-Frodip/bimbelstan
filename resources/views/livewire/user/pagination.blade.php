<div>
    @if ($paginator->hasPages())
        <div class="d-flex justify-content-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span aria-hidden="true" class="btn bg-gradient-secondary disabled">&lsaquo; {{ __('Prev') }}</span>
            @else
                <button type="button" dusk="previousPage" class="btn bg-gradient-secondary" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; {{ __('Prev') }}</button>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button type="button" dusk="nextPage" class="btn bg-gradient-secondary" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">{{ __('Next') }} &rsaquo;</button>
            @else
                <button class="btn bg-gradient-secondary" type='submit'>{{ __('Submit') }} &rsaquo;</button>
            @endif
        </div>
        <div class="accordion" id="accordionRental">
            <div class="accordion-item mb-3">
              <h5 class="accordion-header" id="headingOne">
                <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  {{ __('Numbers') }}
                  <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                  <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                </button>
              </h5>
              <div id="collapseOne" wire:ignore.self class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionRental" style="">
                {{-- Pagination Elements --}}
                <div class="row mt-3">
                    @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                        <div class="col-md-4 col-3">
                            @if ($page == $paginator->currentPage())
                                <button class="btn w-100 bg-gradient-success" type='button' wire:key="paginator-page-{{ $page }}"><span>{{ $page }}</span></button>
                            @else
                                <button class="btn w-100" type='button' wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                            @endif
                        </div>
                    @endfor
                </div>
              </div>
            </div>
        </div>
    @endif
</div>
