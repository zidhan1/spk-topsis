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
<div class="card">
    <div class="card-body">
        <form action="{{route('alternatif.store')}}" method="post">
            @csrf
            <div class="row g-3 align-items-start">
                <div class="col-auto">
                    <h3>Masukkan Nilai Alternatif</h3>
                </div>
                <div class="col-auto">
                    <label for="id_siswa">{{$siswa->nama}}</label>
                    <input type="hidden" class="form-control " id="id_siswa" name="id_siswa" value="{{$siswa->id}}">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    @foreach($kriteria as $kt => $dataKt)
                    @php($jml = count($penilaian))
                    @if($jml === 0)
                    @php($i = 0)
                    @elseif($jml > 0)
                    @php($i = $penilaian[$kt]->nilai)
                    @endif
                    <div class="form-group">
                        <label for="nilai_{{$dataKt->id_kriteria}}">{{$dataKt->nama_kriteria}}</label>
                        <input type="number" id="textest" class="form-control" name="nilai_{{$dataKt->id_kriteria}}" value="{{$i}}" required min="20">
                    </div>
                    @endforeach
                </div>
                <div class="col-3">
                    @isset($nilai_test)
                    @foreach($nilai_test as $value)
                    <div class="form-group">
                        <label for="">Dasar Komputer</label>
                        <input type="text" class="form-control" name="" value="{{$value->dasar_komputer}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Analogi</label>
                        <input type="text" class="form-control" name="" value="{{$value->analogi}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Penalaran</label>
                        <input type="text" class="form-control" name="" value="{{$value->penalaran}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Numerik</label>
                        <input type="text" class="form-control" name="" value="{{$value->numerik}}">
                    </div>
                    <div class="form-group">
                        <label for="">Nilai Intelegensi</label>
                        <input type="text" class="form-control" name="" value="{{$value->intelegensi}}">
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>
            <br>
            @php($jml = count($penilaian))
            @if($jml === 0)
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            @elseif($jml > 0)
            <a href="/alternatif" class="btn btn-outline-danger">Kembali</a>
            @endif
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Bobot Nilai
            </button>
        </form>
    </div>
</div>


<!-- Modal -->
<div class="modal fade modal-xl" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Detail Bobot Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-auto" style="font-size: 12px;">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col" colspan="2">Dasar Komputer</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Nilai Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilai ≤ 30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nilai ≤ 60</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nilai ≤ 90</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nilai ≤ 120</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nilai ≤ 150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-auto" style="font-size: 12px;">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col" colspan="2">Analogi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Nilai Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilai ≤ 30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nilai ≤ 60</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nilai ≤ 90</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nilai ≤ 120</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nilai ≤ 150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-auto" style="font-size: 12px;">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col" colspan="2">Penalaran</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Nilai Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilai ≤ 30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nilai ≤ 60</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nilai ≤ 90</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nilai ≤ 120</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nilai ≤ 150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-auto" style="font-size: 12px;">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col" colspan="2">Numerik</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Nilai Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilai ≤ 70</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nilai ≤ 140</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nilai ≤ 210</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nilai ≤ 280</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nilai ≤ 350</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-auto" style="font-size: 12px;">
                        <table class="table text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col" colspan="2">Intelegensi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Nilai Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nilai ≤ 30</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nilai ≤ 60</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nilai ≤ 90</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nilai ≤ 120</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Nilai ≤ 150</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection