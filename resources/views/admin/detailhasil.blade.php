@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<h3>Hasil Penilaian TOPSIS</h3>
<br>
<h5>Hasil Matriks Keputusan Ternormalisasi</h5>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                @foreach($isi_kriteria as $keyT => $kt)
                <th>{{$kt->nama_kriteria}}</th>
                @endforeach
            </tr>
        </thead>
        @foreach($isi_alternatif as $keyA => $value)
        <tr>
            <td>{{$value->nama}}</td>
            @for($i = 0; $i < $alternatif; $i++) @for($j=0; $j < $kriteria; $j++) <td>{{$ternormalisasi[$j][$keyA]}}</td>
                @endfor
                @break
                @endfor
        </tr>
        @endforeach
    </table>

    <br>
    <h5>Hasil Matriks Keputusan Ternormalisasi Dan Terbobot</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                @foreach($isi_kriteria as $keyT => $kt)
                <th>{{$kt->nama_kriteria}}</th>
                @endforeach
            </tr>
        </thead>
        @foreach($isi_alternatif as $keyA => $value)
        <tr>
            <td>{{$value->nama}}</td>
            @for($i = 0; $i < $alternatif; $i++) @for($j=0; $j < $kriteria; $j++) <td>{{$terbobot[$j][$keyA]}}</td>
                @endfor
                @break
                @endfor
        </tr>
        @endforeach
    </table>

    <br>
    <h5>Nilai Solusi Ideal Positif dan Solusi Ideal Negatif</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Ket</th>
                @foreach($isi_kriteria as $keyT => $kt)
                <th>{{$kt->nama_kriteria}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>MAX</td>
                @for($i = 0; $i < $kriteria; $i++) <td>{{$maks[$i]}}</td>
                    @endfor
            </tr>
            <tr>
                <td>MIN</td>
                @for($i = 0; $i < $kriteria; $i++) <td>{{$min[$i]}}</td>
                    @endfor
            </tr>
        </tbody>
    </table>

    <br>
    <h5>Hasil D+ Dan D- Untuk Setiap Alternatif</h5>
    <table class="table">
        <thead>
            <tr>
                <th>Nilai D+</th>
                <th>Nama</th>
                <th>Nilai D-</th>
            </tr>
        </thead>
        <tbody>
            @foreach($isi_alternatif as $i => $altr) <tr>
                <td>{{$d_plus_2[$i]}}</td>
                <td>{{$altr->nama}}</td>
                <td>{{$d_min_2[$i]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <h5>Hasi Preferensi Dan Perangkingan</h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Hasil</th>
                <th scope="col">Ranking</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rangking as $value => $rk)
            <tr>
                <td>{{$value +1}}</td>
                <td>{{$rk->nama}}</td>
                <td>{{$rk->hasil}}</td>
                <td>{{$loop->iteration}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection