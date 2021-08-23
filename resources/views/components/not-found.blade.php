<div class="empty">
    <div class="empty-img">
        <img src="{{ asset('backend/image') }}/not-found.svg" height="128" alt="">
    </div>
    <h5 class="mt-1">{{ $title }}</h5>
    <p class="empty-subtitle text-muted">
        {{ $subtitle }}
    </p>
    <div class="empty-action">
        <a href="{{ route($route) }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            {{ $btnMessage }}
        </a>
    </div>
</div>
