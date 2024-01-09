@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-info text-white">Data Siswa</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nomor Pendaftaran</td>
                            <td>:</td>
                            <td>{{$data->nomor_pendaftaran}}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$data->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Tahun Masuk</td>
                            <td>:</td>
                            <td>{{$data->tahun_masuk}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if($data->keterangan == 'valid')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-success">
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-9">
                            <h6>Selamat, Anda dinyatakan lolos dan bersedia masuk kelas ACP</h6>
                            <p>Nomor Pendaftaran : {{$data->nomor_pendaftaran}}</p>
                            <p>Kelas : Axioo Class Program</p>
                        </div>
                        <div class="col justify-content-end">
                            <img src="{{asset('assets/img/icons/flags/LOLOS.png')}}" alt="" style="width:100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif($data->keterangan == 'onproses')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-secondary">
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-9">
                            <h6>Selamat, Anda termasuk <b>MEMENUHI</b> kriteria siswa kelas ACP. Silahkan verifikasi kebersediaan anda.</h6>
                            <div class="row">
                                <div class="col-auto">
                                    <form action="{{route ('siswa.bersedia', $data->id_hasil) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="keterangan" id="keterangan" value="valid">
                                        <button class="btn btn-info btn-sm" type="submit">Bersedia</button>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <form action="{{route ('siswa.tidak', $data->id_hasil) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="keterangan" id="keterangan" value="nonvalid">
                                        <input type="hidden" id="tahun" name="tahun" value="{{ $data->tahun_masuk }}">
                                        <button class="btn btn-danger btn-sm" type="submit">Tidak Bersedia</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col justify-content-end">
                            <img src="{{asset('assets/img/icons/flags/LOLOS.png')}}" alt="" style="width:100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-danger">
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-9">
                            <h6>Mohon maaf, Anda dinyatakan <b>GUGUR</b> dalam seleksi siswa kelas unggulan</h6>
                            <p>Nomor Pendaftaran : {{$data->nomor_pendaftaran}}</p>
                            <p>Kelas : Teknik Komputer Jaringan</p>
                        </div>
                        <div class="col justify-content-end">
                            <img src="{{asset('assets/img/icons/flags/LOLOS.png')}}" alt="" style="width:100px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


</div>

@endsection