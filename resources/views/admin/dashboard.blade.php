@extends('.master')
@section('title','SPK TOPSIS')

@section('content')
<h3>Dashboard</h3>
<div class="row">
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Total Siswa</h5>
        <h3 class="card-text text-center">{{$data}}</h3>
        <a href="{{url('siswa')}}" class="btn btn-primary">Lihat Data</a>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Total Kriteria</h5>
        <h3 class="card-text text-center">{{$kriteria}}</h3>
        <a href="{{url('kriteria')}}" class="btn btn-primary">Lihat Data</a>
      </div>
    </div>
  </div>
  <div class="col-4">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Total Preferensi</h5>
        <h3 class="card-text text-center">{{$hasil}}</h3>
        <a href="{{url('hasil')}}" class="btn btn-primary">Lihat Data</a>
      </div>
    </div>
  </div>
</div>

<br>
<canvas id="myChart" style="width:800px; height:200px;"></canvas>
@endsection
@push('script')
<script type="text/javascript">
  const myChart = new Chart("myChart", {
    type: "line",
    data: {
      labels: ["2022", "2023"],
      datasets: [{
          label: "Total Data Siswa",
          data: [0, <?php echo $data ?>],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "Total Preferensi",
          data: [0, <?php echo $hasil ?>],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {}
  });
</script>
@endpush