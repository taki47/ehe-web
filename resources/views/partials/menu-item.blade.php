<li>
    <a href="{{ $menu->link ?: 'javascript:void(0);' }}" {{ empty($menu->link) ? "onClick='return false;'" : "" }}>{{ $menu->name }}</a>
    
    <!-- Ha vannak gyerekek, akkor újabb <ul> blokkot nyitunk és rekurzívan megjelenítjük -->
    @if ($menu->children->isNotEmpty())
        <ul>
            @foreach ($menu->children as $child)
                @include('partials.menu-item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>