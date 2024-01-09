<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center">Daftar Rekomendasi Siswa Axioo Class Program</h2>
    <table class="table table-striped table-hover table-sm" id="tableHasil">
        <thead>
            <tr>
                <th style="width: 2%;">No</td>
                <th style="width: 15%;">Nomor</th>
                <th style="width: 20%;">Nama</th>
                <th style="width: 10%;">Tahun</th>
                <th style="width: 20%;">Nilai</th>
                <th style="width: 10%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $siswa)
            <tr class="table-body">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nomor_pendaftaran }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->tahun_masuk }}</td>
                <td>{{ $siswa->hasil }}</td>
                <td>
                    @if($siswa->keterangan == 'onproses')
                    Dalam Proses
                    @elseif($siswa->keterangan == 'valid')
                    Bersedia
                    @elseif($siswa->keterangan == 'nonvalid')
                    Tidak Bersedia
                    @else
                    Gugur
                    @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>