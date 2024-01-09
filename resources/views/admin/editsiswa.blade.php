<!-- Modal Edit -->
<div class="modal fade" id="modalEdit{{$siswa->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('siswa.update', $siswa->id)}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomor_pendaftaran">Nomor Pendaftaran</label>
                        <input type="text" class="form-control bg-light" name="nomor_pendaftaran" id="nomor_pendaftaran" value="{{$siswa->nomor_pendaftaran}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control bg-light" name="nama" id="nama" value="{{$siswa->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control bg-light" name="agama" id="agama" value="{{$siswa->agama}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="2" rows="5" class="form-control bg-light">{{$siswa->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input type="text" class="form-control bg-light" name="tahun_masuk" id="tahun_masuk" value="{{$siswa->tahun_masuk}}">
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