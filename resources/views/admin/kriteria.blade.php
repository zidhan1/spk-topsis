@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <h3>Data Kriteria</h3>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKriteria">Tambah Kriteria</button>
    </div>
    <div class="card-body">

        <table class="table table-striped table-hover table-sm" id="tableKriteria">
            <thead>
                <tr>
                    <th style="width: 2%;">No</td>
                    <th style="width: 30%;">Nama Kriteria</th>
                    <th style="width: 10%;">Nilai Bobot</th>
                    <th style="width: 30%;">Keterangan</th>
                    <th style="width: 30%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $kriteria)
                <tr class="table-body">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kriteria->nama_kriteria }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    @if( $kriteria->atribut === 1)
                    <td>Benefit</td>
                    @else
                    <td>Cost</td>
                    @endif
                    <td>
                        <form action="{{route('kriteria.delete', $kriteria->id_kriteria)}}" method="POST">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditKriteria{{$kriteria->id_kriteria}}" class="btn btn-outline-warning btn-sm">Edit</a>
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Hapus Kriteria ?')">Hapus</button>
                        </form>
                    </td>
                    @include('admin.editkriteria')
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="modalKriteria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('kriteria.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control bg-light" name="nama_kriteria" id="nama_kriteria">
                    </div>
                    <div class="form-group">
                        <label>Nilai Bobot</label>
                        <select name="bobot" id="bobot" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="atribut">Keterangan</label>
                        <select name="atribut" id="atribut" class="form-control">
                            <option value="1">Benefit</option>
                            <option value="2">Cost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endsection
    @push('script')
    <script type="text/javascript">
        let table = new DataTable('#tableKriteria');
    </script>
    @endpush