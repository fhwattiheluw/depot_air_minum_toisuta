@extends('layouts')

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
              <h6 class="text-white text-capitalize ps-4">Kelola data customer</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>Kostumer</a>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Telp</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">John Michael</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">Manager</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">Online</span>
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

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<form class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah kostumer</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Nama Kostumer</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Telp/Wa Kostumer</label>
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

<!-- end modal -->
@endsection
