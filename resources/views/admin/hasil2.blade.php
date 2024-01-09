@extends('.master')
@section('title','SPK TOPSIS')
@section('content')
<h3>Hasil Rangking</h3>
<div class="card">
    <div class="card-body">
        <p>Pilih Tahun Untuk Melihat Data Hasil</p>
        <form action="{{route ('hasil.request') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <select name="tahun_masuk" id="tahun" class="form-control">
                        @foreach($tahun as $siswa)
                        <option value="{{ $siswa->tahun_masuk }}">{{ $siswa->tahun_masuk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
    let table = new DataTable('#tableHasil');
</script>
@endpush