<!-- Modal Edit Kriteria -->
<div class="modal fade" id="modalEditKriteria{{$kriteria->id_kriteria}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('kriteria.update', $kriteria->id_kriteria)}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control bg-light" name="nama_kriteria" id="nama_kriteria" value="{{$kriteria->nama_kriteria}}">
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