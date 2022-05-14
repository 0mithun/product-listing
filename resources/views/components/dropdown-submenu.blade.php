@if ($childCategories->count())
    <ul class="dropdown-submenu">
        @foreach ($childCategories as $category)
            <li>
                <a class="dropdown-item" href="{{ route('slug.view', nestedPathRemoveFirst($category->slug_path)) }}">{{ $category->name }}</a>
                <x-dropdown-submenu :child_categories="$category->children" />
            </li>
        @endforeach
    </ul>
@endif
