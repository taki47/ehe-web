<option value="{{ $menu->id }}" {{ old() && old("parent_id") == $menu->id || (!old() && ($editMenu->parent_id ?? null) == $menu->id) ? "selected" : "" }}>{{ $prefix }}{{ $menu->name }}</option>
@if ($menu->children->isNotEmpty())
    @foreach ($menu->children as $child)
        @include('Admin.Menu.partials.menu-option', ['menu' => $child, 'prefix' => $prefix . '-- '])
    @endforeach
@endif
