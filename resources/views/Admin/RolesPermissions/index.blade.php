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
                        <th>{{ $role->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->readable }}</td> <!-- Olvasható név itt -->
                        @foreach ($roles as $role)
                            <td>
                                <input type="checkbox" name="permissions[{{ $role->id }}][]" value="{{ $permission->name }}"
                                       {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
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
    </script>
@endsection
