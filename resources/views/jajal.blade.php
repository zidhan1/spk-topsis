<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/sl-1.6.2/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <table class="table table-striped table-hover table-sm" id="tableSiswa">
        <thead>
            <tr>
                <th style="width: 2%;">No</td>
                <th style="width: 30%;">Nomor Pendaftaran</th>
                <th style="width: 30%;">Nama</th>
                <th style="width: 10%;">Agama</th>
                <th style="width: 30%;">Alamat</th>
                <th style="width: 10%;">Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr class="table-body">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nomor_pendaftaran }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->tahun_masuk }}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit{{$siswa->id}}" class="btn btn-outline-warning btn-sm">Edit</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete{{$siswa->id}}" class="btn btn-outline-primary btn-sm">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/sl-1.6.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let table = new DataTable('#tableSiswa');
    </script>
</body>

</html>