<div class="row align-items-center py-4">
    <div class="col-lg-6 col-7">
        <h6 class="h2 text-white d-inline-block mb-0">{{ $title }}</h6>
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        @if(Auth::user()->hasRole('Teacher'))
                            <i class="fa fa-calendar"></i>
                        @else 
                            <i class="fas fa-home"></i>
                        @endif
                    </a>
                </li>
                {{ $slot }}
            </ol>
        </nav>
    </div>
    @if (isset($calendar))
        {{ $calendar }}
    {{-- @else
        <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">{{ __('New') }}</a>
            <a href="#" class="btn btn-sm btn-neutral">{{ __('Filters') }}</a>
        </div> --}}
    @endif
    @if(Auth::user()->hasRole('Teacher') && request()->is('assigned_class'))
        <div class="col-lg-6 col-5 text-right">
            <a class="btn btn-sm btn-neutral add-class-btn"><i class="fa fa-plus"></i> {{ __('Add Class') }}</a>
        </div>
    @endif
</div>