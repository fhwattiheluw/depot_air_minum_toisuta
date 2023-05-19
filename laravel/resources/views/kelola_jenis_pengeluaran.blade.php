@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Kelola jenis pengeluaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Kelola jenis pengeluaran</h6>
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
              <h6 class="text-white text-capitalize ps-4">Kelola jenis pengeluaran</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>item pengeluaran</a>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama pengeluaran</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$item->nama_pengeluaran}}</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Edit
                  </a>
                  <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                    Remove
                  </a>
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

<!-- Modal -->
<form class="modal fade" id="exampleModal" method="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @csrf
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah item pengeluaran</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Nama item</label>
            <input type="text" name="nama_pengeluaran" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

<!-- end modal -->
@endsection
