@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input pengeluaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input pengeluaran</h6>
</nav>
@endsection

@section('title')
Form Detail Pengeluaran
@endsection

@section('konten')

      <div class="row">
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
          @if ($errors->any())
            <div class="col">
              <div class="alert alert-danger text-white">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            </div>
        @endif

        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-4">Form pengeluaran</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="col p-4">
                  <form action="{{Route('detail_pengeluaran.store')}}" method="post"  class="row justify-content-md-center" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 col-md-6">
                      <div class="input-group input-group-static is-invalid mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">jenis pengeluaran</label>
                        <select class="form-control" name="id_pengeluaran" id="exampleFormControlSelect1">
                          <option>--- Pilih ---</option>
                          @foreach($jenis as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->nama_pengeluaran}}</option>
                          @endforeach
                        </select>
                      </div>
                      <label class="ms-0">Tanggal</label>
                      <div class="input-group input-group-outline my-3">
                        <!-- <label class="form-label">Tanggal</label> -->
                        <input type="date" name="tanggal" class="form-control">
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control">
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <label class="form-label">Harga satuan</label>
                        <input type="number" name="harga_satuan" class="form-control">
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <textarea name="keterangan" class="form-control" rows="5" placeholder="Ketik keterangan" spellcheck="false"></textarea>
                      </div>
                      <label for="">Nota</label>
                      <div class="input-group input-group-outline  is-invalid my-3">
                        <!-- <label class="form-label">Nota</label> -->
                        <input type="file" name="nota" class="form-control">
                      </div>
                      <div class="input-group input-group-outline my-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!-- end modal -->
@endsection
