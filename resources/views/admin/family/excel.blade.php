<table>
    <tbody>
        <tr>
            <th><b>No.</b></th>
            <th><b>Nama</b></th>
            <th><b>Telepon</b></th>
            <th><b>Tanggal Lahir</b></th>
            <th><b>Alamat</b></th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @php
                        $indent = '';
                    @endphp
                    @for ($i = 0; $i < $d['indent']; $i++)
                        @php
                            $indent .= '___';
                        @endphp
                    @endfor
                    {{ $indent }} {{ $d['name'] }}
                </td>
                <td>{{ $d['phone'] }}</td>
                <td>{{ $d['birth_date'] }}</td>
                <td>{{ $d['address'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
