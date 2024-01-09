@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <h3>Data Siswa</h3>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="tableSiswa" style="width: 100%;">
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
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa->nomor_pendaftaran }}</td>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->agama }}</td>
                        <td>{{ $siswa->alamat }}</td>
                        <td>{{ $siswa->tahun_masuk }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEdit{{$siswa->id}}" class="btn btn-outline-warning btn-sm">Edit</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete{{$siswa->id}}" class="btn btn-outline-danger btn-sm">Hapus</a>
                        </td>
                        @include('admin.editsiswa')
                        @include('admin.deletesiswa')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Insert -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('siswa.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
                        <input type="text" class="form-control bg-light" name="nomor_pendaftaran" id="nomor_pendaftaran" value="SDB{{$newDateFormat}}{{$data->count()+1}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control bg-light" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control" required>
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="2" rows="5" class="form-control bg-light"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <select name="tahun_masuk" class="form-control" id="tahun_masuk" required>
                            @php
                            $tahunIni = date('Y');
                            $tahunDepan = $tahunIni + 5;

                            for ($tahun = $tahunIni; $tahun <= $tahunDepan; $tahun++) { echo "<option value=\" $tahun\">$tahun</option>";
                                }
                                @endphp
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
</div>
@endsection
@push('script')
<script type="text/javascript">
    let table = new DataTable('#tableSiswa');
</script>
@endpush