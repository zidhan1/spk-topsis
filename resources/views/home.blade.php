@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h4 style="font-weight: bolder;">Selamat Datang, {{ Auth::user()->name }}</h4>
                    <!--  -->
                    <div class="card">
                        <div class="row">
                            <div class="col-1">
                                <div class="card-body">
                                    <img src="{{asset('assets/img/icons/flags/LOLOS.png')}}" alt="" style="width:50px;">
                                </div>
                            </div>
                            <div class="col">
                                <h5 style="padding-top: 10px;">SELECTION</h5>
                                <a href="{{url('/result')}}" style="text-decoration:none">Lihat hasil seleksi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 style="font-weight: bolder;">Daftar Peringkat Rekomendasi Siswa ACP</h4>
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

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rangking as $siswa)
                                <tr class="table-body">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswa->nomor_pendaftaran }}</td>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->tahun_masuk }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection