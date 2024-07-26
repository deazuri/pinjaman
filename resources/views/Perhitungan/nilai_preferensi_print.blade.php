<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Preferensi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Data Preferensi</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">V1</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nilaiPreferensi as $preferensi)
                @if($preferensi['nomor_urut'] <= 50) <tr>
                    <td>{{ $preferensi['nomor_urut'] }}</td>
                    <td>{{ $preferensi['nama'] }}</td>
                    <td>{{ $preferensi['nilai'] }}</td>
                    </tr>
                    @endif
                    @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>