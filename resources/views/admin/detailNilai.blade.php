@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <h3>Detail Alternatif</h3>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover table-sm " id="tableAlternatif">
            <thead>
                <tr class="text-start">
                    <th style="width: 2%;">No</td>
                    <th style="width: 25%;">Nama </th>
                    @foreach($nilai as $key => $value)
                    <th style="width: 10%;">K{{$key+1}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <td>1</td>
                <td>{{$siswa->nama}}</td>
                @foreach($nilai as $value)
                <td>{{$value->nilai}}</td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection