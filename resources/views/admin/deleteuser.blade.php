@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<div class="card" style="font-size: 14px;">
    <div class="card-header">
        <h3>Data User</h3>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
    </div>
    <div class="card-body">

        <table class="table table-striped table-hover table-sm" id="tableUser">
            <thead>
                <tr>
                    <th style="width: 2%;">No</td>
                    <th style="width: 30%;">Nama</th>
                    <th style="width: 20%;">Username</th>
                    <th style="width: 20%;">Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $siswa)
                <tr class="table-body">
                    <td>{{ $loop->iteration }}</td>
                    @if( $siswa->nama != null)
                    <td>{{ $siswa->nama }}</td>
                    @else
                    <td>{{ $siswa->name}}</td>
                    @endif
                    <td>{{ $siswa->username}}</td>
                    @if( $siswa->role == 1)
                    <td>Admin</td>
                    @else
                    <td>Siswa</td>
                    @endif
                    <td>
                        <form action="{{route('delete.user', $siswa->username)}}" method="post">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Hapus Data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal Insert -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('session.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" class="form-control rounded-left" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control rounded-left" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Level</label>
                        <select name="role" id="role" class="form-control rounded-left" required>
                            <option value="1">Admin</option>
                            <option value="0">Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control rounded-left" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control rounded-left" name="password" id="password" required>
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
    let table = new DataTable('#tableUser');
</script>
@endpush