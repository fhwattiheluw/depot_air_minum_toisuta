@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Kelola user</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Kelola user</h6>
</nav>
@endsection

@section('title')
Ini judul
@endsection

@section('konten')
<div class="row">
  <div class="col-12">
    <div class="card my-4">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="text-white text-capitalize ps-4">Manajemen user</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>Add User</a>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{$item->level}}</span>
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_edit_{{$item->id}}" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-edit"></i>Edit
                  </a>

                  <!-- Modal edit -->
                  <form class="modal fade" method="post" id="modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit user</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control" value="{{$item->name}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3">
                              <label class="form-label">Username</label>
                              <input type="email" name="email" class="form-control"  value="{{$item->email}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3">
                              <label class="form-label">Kata sandi</label>
                              <input type="text" name="password" class="form-control">
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

                  <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_remove_{{$item->id}}" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-trash"></i>Remove
                  </a>
                  <!-- Modal edit -->
                  <form class="modal fade" method="post" id="modal_remove_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Remove user</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col">
<p>Apakah anda yakin untuk hapus data ini ?</p>
                          </div>
                          <div class="col">
                            <div class="input-group is-invalid my-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control" value="{{$item->name}}" disabled>
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group  is-invalid my-3">
                              <label class="form-label">Username</label>
                              <input type="email" name="email" class="form-control"  value="{{$item->email}}" disabled>
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Remove</button>
                        </div>
                      </div>
                    </div>
                  </form>

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
<form class="modal fade" method="post" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @csrf
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Tambah user</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control">
          </div>
        </div>
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Username</label>
            <input type="email" name="email" class="form-control">
          </div>
        </div>
        <div class="col">
          <div class="input-group input-group-outline is-invalid my-3">
            <label class="form-label">Kata sandi</label>
            <input type="text" name="password" class="form-control">
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
