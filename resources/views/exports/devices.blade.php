<table>
    <thead>
    <tr>
        <th style="font-weight: 500">Id</th>
        <th style="font-weight: 500">Nombre</th>
        <th style="font-weight: 500">Descripcion</th>
        <th style="font-weight: 500">MAC</th>
        <th style="font-weight: 500">IP</th>
    </tr>
    </thead>
    <tbody>
    @foreach($devices as $device)
        <tr>
            <td>{{ $device->id }}</td>
            <td>{{ $device->name }}</td>
            <td>{{ $device->description }}</td>
            <td>{{ $device->mac_address }}</td>
            <td>{{ $device->ip_address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>