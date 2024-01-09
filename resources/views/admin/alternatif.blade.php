@extends('.master')
@section('title','SPK TOPSIS')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <h3>Data Alternatif</h3>
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalImport">
            Import
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover table-sm" id="tableAlternatif">
            <thead>
                <tr>
                    <th style="width: 2%;">No</td>
                    <th style="width: 25%;">Nama </th>
                    <th style="width: 10%;">Tahun</th>
                    <th style="width: 10%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa->unique('nama') as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->tahun_masuk }}</td>
                    <td>
                        <form action="{{route('alternatif.delete', $data->id)}}" method="post">
                            <a href="{{route('alternatif.detail', $data->id)}}" class="btn btn-sm btn-primary">Detail</a>
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<br>
<form action="{{route('detail.hasil')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-auto">
            <div class="form-group">
                <select class="form-select" name="tahun_masuk" id="tahun_masuk" required>
                    <option value="">Pilih Tahun</option>
                    @foreach($siswa->unique('tahun_masuk') as $dt)
                    <option value="{{$dt->tahun_masuk}}">{{$dt->tahun_masuk}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="number" class="form-control" name="jml_siswa" id="jml_siswa" placeholder="Kapasitas Siswa" required min="10">
            </div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-outline-primary">Mulai Perhitungan</button>
        </div>
    </div>
</form>


<!-- Modal Import -->
<div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Nilai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('alternatif.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="file">File Excel</label>
                    <input type="file" class="form-control" name="file" id="file" required>
                    <br>
                    <select class="form-select" name="tahun_masuk" id="tahun_masuk" required>
                        <option value="">Tahun Masuk</option>
                        @foreach($tahun->unique('tahun_masuk') as $siswa)
                        <option value="{{$siswa->tahun_masuk}}">{{$siswa->tahun_masuk}}</option>
                        @endforeach
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>





@endsection
@push('script')
<script type="text/javascript">
    let table = new DataTable('#tableAlternatif');
</script>
@endpush