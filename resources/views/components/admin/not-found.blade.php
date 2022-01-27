@php
$singuler = Str::plural($word, 1);
$plural = Str::plural($word, 2);
@endphp
<div class="empty py-5">
    <div class="empty-img">
        <img src="{{ asset('backend/image') }}/not-found.svg" height="128" alt="">
    </div>
    <h5 class="mt-4">No results found</h5>
    <p class="empty-subtitle text-muted">
        There is no {{ strtolower($plural) }} found in this page.
    </p>
    <div class="empty-action">
        @if ($route !== '')
            <a href="{{ route($route) }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add your first {{ strtolower($singuler) }}
            </a>
        @endif
    </div>
</div>
