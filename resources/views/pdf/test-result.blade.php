<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style media="screen">
        body{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        table{
            border-collapse: collapse;
            border: 0;
            width: 100%;
        }
        table thead tr th,tbody tr td{
            border: 1px solid;
            padding: 8px;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <h3 align='center'>Informasi Pengguna</h3>
    <table align="center">
        <tr>
            <td>Nama</td>
            <td style="width: 1px">:</td>
            <td>{{ $user->name }}</td>

            <td>Tanggal Lahir</td>
            <td style="width: 1px">:</td>
            <td>{{ $user->dob }}</td>
        </tr>
        <tr>
            <td>No Telp</td>
            <td>:</td>
            <td>{{ $user->phone }}</td>

            <td>Paket</td>
            <td>:</td>
            <td>{{ $user->price }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $user->email }}</td>

            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <h3 align="center">Informasi Hasil Tes</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Ujian</th>
                <th>Waktu</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->test_results as $test)
                <tr>
                    <td style="text-align: center;font-weight:bold">{{ $loop->iteration }}</td>
                    <td>{{ $test->test->test_name }}</td>
                    <td>{{ $test->test->time }} Menit</td>
                    <td>
                        <ul style="margin: 0">
                            @foreach (json_decode($test->result, false) as $test_name => $result)
                                <li>{{ $test_name }} => {{ $result }}</li>
                            @endforeach
                            <li>Total => {{ $test->total }}</li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
