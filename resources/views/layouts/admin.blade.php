@if (setting()->default_layout)
    @include('layouts.left-nav')
@else
    @include('layouts.top-nav')
@endif
