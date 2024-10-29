@extends('Layouts.admin')

@section('title') Napló bejegyzések @endsection

@section('content')
    <!-- Keresőmező -->
    <input type="text" id="search" placeholder="Keresés az események között" class="form-control mb-3">

    <table class="table table-hover" id="logs-table">
        <tr>
            <th>#</th>
            <th>Entitás típusa</th>
            <th>Entitás azonosító</th>
            <th>Esemény típusa</th>
            <th>Esemény</th>
            <th>Felhasználó</th>
            <th>Időpont</th>
        </tr>

        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->entity_type }}</td>
                <td>
                    #{{ $log->entity_id }}<br>
                    {{ $log->getEntityName($log->entity_type, $log->entity_id) }}
                </td>
                <td>
                    @switch($log->event_type)
                        @case("CREATE")
                            Létrehozás
                            @break
                        @case("MODIFY")
                            Módosítás
                            @break
                        @case("DELETE")
                            Törlés
                            @break
                        @default
                    @endswitch
                </td>
                <td>
                    @php
                        $decodedDescription = json_decode($log->event_description, true);
                    @endphp

                    @if (is_array($decodedDescription) || is_object($decodedDescription))
                        {{-- Az érték JSON-ként jelenik meg, ha tömb vagy objektum --}}
                        @foreach ($decodedDescription as $description)
                            {{ $description }}<br>
                        @endforeach
                    @else
                        {{-- Az érték sima szövegként jelenik meg --}}
                        {{ $log->event_description }}
                    @endif
                </td>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
    </table>

    <script>
        // Keresés megvalósítása
        document.getElementById('search').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#logs-table tbody tr');

            rows.forEach(function(row) {
                let cells = row.getElementsByTagName('td');
                let rowContainsFilter = false;

                // Ellenőrizzük az összes cellát
                for (let i = 0; i < cells.length; i++) {
                    if (cells[i].textContent.toLowerCase().includes(filter)) {
                        rowContainsFilter = true;
                        break;
                    }
                }

                // A sor megjelenítése vagy elrejtése
                row.style.display = rowContainsFilter ? '' : 'none';
            });
        });
    </script>
@endsection
