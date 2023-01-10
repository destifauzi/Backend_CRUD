<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <center>
        <p>
            <button type="button" onclick="window.location='/mhs/tambah'">
            Tambah
</button>
        </p>
        <table style="width: 80%; border-collapse: collapse; border:1px solid #000" border="1">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($dataMhs as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d ->mhsnim }}</td>
                    <td>{{ $d ->mhsnama }}</td>
                    <td>{{ $d ->mhstelp }}</td>
                    <td>{{ $d ->mhsalamat }}</td>
                    <td>
                        <button type="button" onclick="windows.location='/mhs/edit/{{$d->mhsnim}}'">
                        Edit
                        </button>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </center>
</body>
</html>