@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Rekapan penjualan</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Rekapan penjualan</h6>
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
              <h6 class="text-white text-capitalize ps-4">Rekapan penjualan</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">print</i> Cetak</a>
            </div>
          </div>
          <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
        </div>
      </div>
      <div class="card-body pt-4 pb-3">
        <div class="row ">
          <div class="col col-md-5 ">
            <form method="get">
              <div class="row">
                <div class="col ">
                  <div class="input-group input-group-outline is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Bulan</label>
                    <select class="form-control" name="bulan" id="exampleFormControlSelect1">
                      @for($i = 1; $i <= 12; $i++)
                      <option value="{{$i}}" @if($i == $filter['bulan']) selected @endif>{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <!-- {{$current_year = date('Y')}} -->
                <div class="col ">
                  <div class="input-group input-group-outline is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Tahun</label>
                    <select class="form-control" name="tahun" id="exampleFormControlSelect1">
                      @for($year = date('Y'); $year >= 2020; $year--)
                      <option value="{{$year}}" @if($year == $filter['tahun']) selected @endif>{{$year}}</option>
                      @endfor
                    </select>
                  </div>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-4">lihat</button>
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total penjualan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($penjualan as $item)
              <tr>
                <td class="align-middle text-center text-sm">
                  <p>{{$item->tanggal}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>{{$item->total}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <a href="#" class="text-success font-weight-bold text-xs" >
                    <i class="fas fa-edit"></i>Lihat detail
                  </a>
                </td>
              </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Total penjualan</th>
                <th class="text-center text-uppercase text-secondary   font-weight-bolder opacity-7">Rp. {{$total->total}}</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
