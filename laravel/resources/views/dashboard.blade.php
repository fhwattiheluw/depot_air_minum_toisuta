@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Dashboard</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Dashboard</h6>
</nav>
@endsection

@section('title')
Ini judul
@endsection

@section('konten')
<!-- <div class="row">
  <div class="col-lg-4 col-md-6 mt-4 mb-4">
    <div class="card z-index-2 ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-secondary shadow-secondary border-radius-lg py-3 pe-1">
          <div class="chart">
            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0 ">Harian</h6>
        <p class="text-sm ">Laporan penjualan</p>
        <hr class="dark horizontal">
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 mt-4 mb-4">
    <div class="card z-index-2  ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0 "> Bulanan </h6>
        <p class="text-sm ">Laporan penjualan</p>
        <hr class="dark horizontal">
        <div class="d-flex ">
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 mt-4 mb-3">
    <div class="card z-index-2 ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
          <div class="chart">
            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h6 class="mb-0 ">Tahunan</h6>
        <p class="text-sm ">Laporan penjualan</p>
        <hr class="dark horizontal">
        <div class="d-flex ">
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="row mt-4">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <h6 class="text-white text-capitalize ps-3"><i class="fas fa-bell"></i> Pemberitahuan pengambilan galon</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Costumer</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No Telp</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal terakhir ambil</th>
              </tr>
            </thead>
            <tbody>
              @foreach($notif_pengembilan_galon as $row)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$row->nama_kostumer}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <a href="#"><i class="fab fa-whatsapp"></i><span class="text-secondary text-xs font-weight-bold">{{$row->telp}}</span></a>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-bold">{{$row->alamat}}</span>
                </td>
                <td class="align-middle text-center">
              <span class="badge badge-sm bg-gradient-success">{{$row->tanggal}}</span>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
