@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Rekapan pengantaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Rekapan pengantaran</h6>
</nav>
@endsection

@section('title')
ini judul
@endsection

@section('konten')
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="text-white text-capitalize ps-4">Rekapan tipe penjualan</h6>
            </div>
            <div class="col-6 text-end">

            </div>
          </div>
          <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
        </div>
      </div>
      <div class="card-body pt-4 pb-3">
        <div class="row ">
          <div class="col col-md-5 ">
            <form method="get">
              @csrf
              <div class="row">
                <div class="col ">
                  <div class="input-group input-group-outline mb-4 is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Bulan</label>
                    <select class="form-control" name="m" id="exampleFormControlSelect1">
                      @for($i = 01; $i <= 12; $i++)
                      <option value="{{$i}}" @if($i == $filter['bulan']) selected @endif >{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="col ">
                  <div class="input-group input-group-outline mb-4 is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Tahun</label>
                    <select class="form-control" name="y" id="exampleFormControlSelect1">
                    @for($i = 2023; $i >= 2020; $i--)
                      <option value="{{$i}}" @if($i == $filter['tahun']) selected @endif >{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-4"><i class="fas fa-search"></i> Lihat</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah beli di tempat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah antar dengan motor</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah antar dengan mobil</th>
              </tr>
            </thead>
            <tbody>
              @foreach($penjualan as $items)
              <tr>
                <td class="align-middle text-center text-sm">
                  <p>{{$items->tanggal}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>{{$items->total_tempat}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>{{$items->total_motor}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>{{$items->total_mobil}}</p>
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
