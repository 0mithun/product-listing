@if (session('layout_mode') === 'left_nav')
    @include('layouts.left-nav')
@else
    @include('layouts.top-nav')
@endif
