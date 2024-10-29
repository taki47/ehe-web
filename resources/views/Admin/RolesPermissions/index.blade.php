@extends('Layouts.admin')

@section('title') Jogosultságok kezelése @endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Hiba történt! Kérjük, javítsd az alábbiakat:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Keresőmező -->
    <input type="text" id="search" placeholder="Keresés a jogosultságok között" class="form-control mb-3">

    <form action="{{ route('permissions.update') }}" method="POST">
        @csrf

        <table class="table table-hover" id="permissions-table">
            <thead>
                <tr>
                    <th>Jogosultságok</th>
                    @foreach ($roles as $role)
                        <th>
                            {{ $role->name }}
                            <br>
                            <!-- Mindent kijelöl és Kijelölés megszüntetése gombok minden szerepkörhöz -->
                            <button type="button" class="btn btn-link select-all p-0" data-role-id="{{ $role->id }}">Mindent kijelöl</button>
                            <button type="button" class="btn btn-link deselect-all p-0" data-role-id="{{ $role->id }}" style="display: none;">Kijelölés megszüntetése</button>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->readable }}</td>
                        @foreach ($roles as $role)
                            <td>
                                <input type="checkbox" name="permissions[{{ $role->id }}][]" value="{{ $permission->name }}"
                                       {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                       data-role-id="{{ $role->id }}">
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Jogosultságok frissítése</button>
    </form>

    <script>
        // Keresés megvalósítása
        document.getElementById('search').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#permissions-table tbody tr');

            rows.forEach(function(row) {
                let permissionName = row.cells[0].textContent.toLowerCase();
                if (permissionName.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Mindent kijelöl és Kijelölés megszüntetése gombok működése minden szerepkör számára
        document.querySelectorAll('.select-all').forEach(function(button) {
            button.addEventListener('click', function() {
                let roleId = this.getAttribute('data-role-id');
                let checkboxes = document.querySelectorAll('input[type="checkbox"][data-role-id="' + roleId + '"]');

                checkboxes.forEach(function(checkbox) {
                    if (checkbox.closest('tr').style.display !== 'none') {
                        checkbox.checked = true;
                    }
                });

                // "Kijelölés megszüntetése" gomb megjelenítése
                this.style.display = 'none';
                document.querySelector('.deselect-all[data-role-id="' + roleId + '"]').style.display = 'inline';
            });
        });

        document.querySelectorAll('.deselect-all').forEach(function(button) {
            button.addEventListener('click', function() {
                let roleId = this.getAttribute('data-role-id');
                let checkboxes = document.querySelectorAll('input[type="checkbox"][data-role-id="' + roleId + '"]');

                checkboxes.forEach(function(checkbox) {
                    if (checkbox.closest('tr').style.display !== 'none') {
                        checkbox.checked = false;
                    }
                });

                // "Mindent kijelöl" gomb visszaállítása
                this.style.display = 'none';
                document.querySelector('.select-all[data-role-id="' + roleId + '"]').style.display = 'inline';
            });
        });
    </script>
@endsection
