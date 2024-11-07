<li data-id='{{ $menu->id }}' class="menu-item">
    @if ( $menu->parent_id=="" )
        <div class="menu-content">
            <img src="/images/flags/{{ $menu->language->flag }}"><br />
            <img src="{{ asset('/images/tiles/' . $menu->image) }}" alt="{{ $menu->name }}" class="menu-image">

            <div class="menu-details">
                @if ( $menu->status==0 )
                    <h3 class="menu-title"><s>{{ $menu->name }}</s></h3>
                    <p class="menu-description"><s>{{ $menu->description }}</s></p>
                    <p class="menu-subdescription"><s>{{ $menu->subdescription }}</s></p>
                @else
                    <h3 class="menu-title">{{ $menu->name }}</h3>
                    <p class="menu-description">{{ $menu->description }}</p>
                    <p class="menu-subdescription">{{ $menu->subdescription }}</p>
                @endif
            </div>

            <div class="menu-actions">
                @if ( Auth::user()->can("any_menu_edit") )
                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-sm btn-primary">Szerkesztés</a>
                @endif

                @if ( Auth::user()->can("any_menu_delete") )
                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Biztosan törölni akarod ezt- és az összes esetlegesen alá tartozó menüpontot?');">Törlés</button>
                    </form>
                @endif
            </div>
        </div>
    @else
        <div>
            @if ( $menu->status==0 )
                <s>
                    {{ $menu->name }}
                </s>
            @else
                {{ $menu->name }}
            @endif
        </div>
        <div class="menu-actions">
            @php
                $topLevelParentId = $menu->getTopLevelParentId();
            @endphp

            @if ( \App\Helper::userCanAccess('menu_edit_'.$topLevelParentId) || Auth::user()->can("any_menu_edit") )
                <button type="button" class="btn" onclick='document.location.href="{{ route("menu.edit", $menu->id) }}";'><i class="fa-solid fa-pen-to-square"></i></button>
            @endif

            @if ( \App\Helper::userCanAccess('menu_delete_'.$topLevelParentId) || Auth::user()->can("any_menu_delete") )
                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" onclick="return confirm('Biztosan törölni akarod ezt- és az összes esetlegesen alá tartozó menüpontot?');"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            @endif
        </div>
    @endif

    @if ($menu->children->isNotEmpty())
        <ul>
            @foreach ($menu->children as $child)
                @include('Admin.Menu.partials.menu-item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>