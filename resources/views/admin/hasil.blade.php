@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<div class="card" style="font-size: 14px;">
  <div class="card-header">
    <h3>Hasil Rangking</h3>
    @foreach($rangking->unique('tahun_masuk') as $data)
    <a href="{{ route ('hasil.cetak', $data->tahun_masuk) }}" class="btn btn-info">Cetak PDF</a>
    @endforeach
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-sm" id="tableHasil">
        <thead>
          <tr>
            <th style="width: 2%;">No</td>
            <th style="width: 15%;">Nomor</th>
            <th style="width: 20%;">Nama</th>
            <th style="width: 10%;">Tahun</th>
            <th style="width: 20%;">Nilai</th>
            <th style="width: 10%;">Keterangan</th>
            <th>Bersedia</th>
            <th>Tidak Bersedia</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rangking as $siswa)
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
            <td>
              <form action="{{route('hasil.lulus', $siswa->id_hasil)}}" method="POST">
                @csrf
                <input type="hidden" id="keterangan" name="keterangan" value="valid">
                <button type="submit" class="btn btn-sm btn-outline-success">Bersedia</button>
              </form>
            </td>
            <td>
              <form action="{{route('hasil.tidak', $siswa->id_hasil)}}" method="POST">
                @csrf
                <input type="hidden" id="keterangan" name="keterangan" value="nonvalid">
                <input type="hidden" id="tahun" name="tahun" value="{{ $siswa->tahun_masuk }}">
                <button type="submit" class="btn btn-sm btn-outline-warning">Tidak Bersedia</button>
              </form>
            </td>
            <td>
              <form action="{{route('hasil.delete', $siswa->id_hasil)}}" method="post">
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
</div>

@endsection
@push('script')
<script type="text/javascript">
  let table = new DataTable('#tableHasil');
</script>
@endpush