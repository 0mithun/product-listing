@if ($childCategories->count())
    <ul class="dropdown-submenu">
        @foreach ($childCategories as $category)
            <li>
                <a class="dropdown-item" href="{{ route('category.product', $category->slug) }}">{{ $category->name }}</a>
                <x-dropdown-submenu :child_categories="$category->children" />
            </li>
        @endforeach
    </ul>
@endif
