@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Kelola data kostumer</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Kelola data kostumer</h6>
</nav>
@endsection

@section('js')
<script type="text/javascript">
$(function() {
  // setTimeout() function will be fired after page is loaded
  // it will wait for 5 sec. and then will fire
  // setTimeout(function() {
  //     $("#alert").hide('blind', {}, 500)
  // }, 5000);
  $("#alert").delay(1500).fadeOut('slow');
});
</script>
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

  @if(session()->has('status'))
  <div class="col">
    <div class="alert alert-success text-white" role="alert" id="alert">
      <span class="alert-icon align-middle">
        <i class="fas fa-thumbs-up"></i>
      </span>
      <span class="alert-text"><strong>Success!</strong> {{Session::get('status')}}</span>
    </div>
  </div>
  @endif

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
              @foreach($items as $item)
              <tr>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$item->nama_kostumer}}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->telp}}</p>
                </td>
                <td class="align-middle text-sm">
                  <p class="text-xs font-weight-bold mb-0">{{$item->alamat}}</p>
                  <!-- <span class="badge badge-sm bg-gradient-success">Online</span> -->
                </td>
                <td class="align-middle">
                  <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_edit_{{$item->id}}" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-edit"></i>Edit
                  </a>

                  <!-- Modal edit -->
                  <form action="{{route('kostumer.update',['id' => Crypt::encryptString($item->id)])}}" class="modal fade" method="post" id="modal_edit_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit kostumer</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3 is-filled">
                              <label class="form-label">Nama Kostumer</label>
                              <input type="hidden" name="id" class="form-control" value="{{$item->id}}">
                              <input type="text" name="nama_kostumer" class="form-control" value="{{$item->nama_kostumer}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3 is-filled">
                              <label class="form-label">No. Telp</label>
                              <input type="text" name="telp" class="form-control" value="{{$item->telp}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group input-group-outline is-invalid my-3 is-filled">
                              <label class="form-label">Alamat</label>
                              <input type="text" name="alamat" class="form-control" value="{{$item->alamat}}">
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
                  <!-- Modal hapus -->
                  <form action="{{route('kostumer.remove',['id' => Crypt::encryptString($item->id)])}}" class="modal fade" method="post" id="modal_remove_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Remove kostumer</h5>
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
                              <label class="form-label">Nama Kostumer</label>
                              <input type="text" name="nama_kostumer" class="form-control" value="{{$item->nama_kostumer}}" disabled>
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
<form class="modal fade" id="exampleModal" method="post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  @csrf
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
          <div class="input-group input-group-outline @error('nama_kostumer') is-invalid @enderror my-3">
            <label class="form-label">Nama Kostumer</label>
            <input type="text" name="nama_kostumer" class="form-control" value="{{old('nama_kostumer')}}">
          </div>
          @error('nama_kostumer')
          <small class="text-danger" >{{$message}}</small>
          @enderror
        </div>
        <div class="col">
          <div class="input-group input-group-outline @error('telp') is-invalid @enderror my-3">
            <label class="form-label">Telp/Wa Kostumer</label>
            <input type="text" name="telp" class="form-control" value="{{old('telp')}}">
          </div>
          @error('telp')
          <small class="text-danger" >{{$message}}</small>
          @enderror
        </div>
        <div class="col">
          <div class="input-group input-group-outline @error('alamat') is-invalid @enderror my-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{old('alamat')}}">
          </div>
          @error('alamat')
          <small class="text-danger" >{{$message}}</small>
          @enderror
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
