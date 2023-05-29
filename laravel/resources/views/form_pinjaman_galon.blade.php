@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input peminjaman galon</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input peminjaman galon</h6>
</nav>
@endsection

@section('title')
ini judul
@endsection

@section('konten')

<div class="row">

  @if ($errors->any())
  <div class="col">
    <div class="alert alert-warning text-white" role="alert" id="alert">
      <span class="alert-icon align-middle">
        <i class="fas fa-exclamation-triangle"></i>
      </span>
      <span class="alert-text"><strong>Warning!</strong> Periksa kembali inputan anda</span>
    </div>
  </div>
@endif

@if(session()->has('success'))
<div class="col">
  <div class="alert alert-success text-white" role="alert" id="alert">
    <span class="alert-icon align-middle">
      <i class="fas fa-thumbs-up"></i>
    </span>
    <span class="alert-text"><strong>Success!</strong> {{Session::get('success')}}</span>
  </div>
</div>
@endif

<div class="col-lg-12">
  <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="text-white text-capitalize ps-4">Kelola peminjaman galon</h6>
          </div>
          <div class="col-6 text-end">
            <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>Peminjaman</a>
          </div>
        </div>
        <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
      </div>
    </div>
    <div class="card-body px-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tanggal</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kostumer</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ket.</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($peminjaman as $item)
            <tr>
              <td class="text-xs font-weight-bold mb-0">{{$item->tanggal_pinjam}}</td>
              <td class="text-xs font-weight-bold mb-0">{{$item->id_kostumer}}</td>
              <td class="text-xs font-weight-bold mb-0">{{$item->jumlah_galon}}</td>
              <td class="text-xs font-weight-bold mb-0">{{$item->keterangan}}</td>
              <td class="align-middle">
                <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_edit_{{$item->id}}" data-toggle="tooltip" data-original-title="Edit user">
                  <i class="fas fa-edit"></i>Edit
                </a>
                <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_remove_{{$item->id}}" data-toggle="tooltip" data-original-title="Edit user">
                  <i class="fas fa-trash"></i>Remove
                </a>

              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
        Current Page: {{ $peminjaman->currentPage() }}<br>
Jumlah Data: {{ $peminjaman->total() }}<br>
Data perhalaman: {{ $peminjaman->perPage() }}<br>
<br>
        {{ $peminjaman->links() }}
      </div>
    </div>
  </div>
</div>


</div>

<!-- Modal -->
<form method="post" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @csrf
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Add peminjaman galon</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="SelectDataKostumer" class="input-group input-group-static">
          <label for="exampleFormControlSelect2" class="ms-0">Pilih Konsumen</label>
          <select multiple="" name="kostumer" class="form-control pb-4" id="exampleFormControlSelect2">
            @foreach($kostumer as $item)
            <option value="{{$item->id}}">{{$item->nama_kostumer}}</option>
            @endforeach
          </select>
        </div>
        @error('kostumer')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group input-group-outline @error('jumlah') is-invalid @enderror my-3">
          <label class="form-label">Tanggal pinjam</label>
          <input type="date" class="form-control" name="tanggal">
        </div>
        @error('tanggal')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group input-group-outline @error('jumlah') is-invalid @enderror my-3">
          <label class="form-label">Jumlah galon</label>
          <input type="text" class="form-control" name="jumlah">
        </div>
        @error('jumlah')
        <small class="text-danger">{{$message}}</small>
        @enderror
        <div class="input-group input-group-outline my-3">
          <textarea name="keterangan" class="form-control" rows="5" placeholder="Keterangan" spellcheck="false"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</form>

<!-- end modal -->
@endsection
