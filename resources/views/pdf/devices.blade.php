<h1>Dispositivos</h1>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Serial Number</th>
            <th>Fecha de creación</th>
            <th>Fecha de actualización</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @foreach ($devices as $device)
            <tr>
                <td>{{ $device->id }}</td>
                <td>{{ $device->name }}</td>
                <td>{{ $device->description }}</td>
                <td>{{ $device->status }}</td>
                <td>{{ $device->serial_number }}</td>
                <td>{{ $device->created_at }}</td>
                <td>{{ $device->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>