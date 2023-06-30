@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Rekapan pengeluaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Rekapan pengeluaran</h6>
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
            <h6 class="text-white text-capitalize ps-4">Detail pengeluaran : {{$date}}</h6>
            </div>
            <div class="col-6 text-end">
              <!-- <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">print</i> Cetak</a> -->
            </div>
          </div>
          <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
        </div>
      </div>
      <div class="card-body pt-4 pb-3">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              </tr>
            </thead>
            <tbody>
              @foreach($detail as $item)
              <tr class="text-center">
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->nama_item}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->jumlah}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->harga_satuan}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->jumlah * $item->harga_satuan}}</p>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->keterangan}}</p>
                </td>
                <td>
                  <!-- <a href="#" class="text-primary font-weight-bold text-xs" >
                    <i class="fas fa-edit"></i>Edit
                  </a>
                  <a href="#" class="text-danger font-weight-bold text-xs" >
                    <i class="fas fa-edit"></i>Remove
                  </a> -->
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
