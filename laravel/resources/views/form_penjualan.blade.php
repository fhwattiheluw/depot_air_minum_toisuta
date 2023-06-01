@extends('layouts')

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input penjualan</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input penjualan</h6>
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

<!-- <script type="text/javascript">
$(document).ready(function(){
  $("#SelectDataKostumer").hide();
    $('#pilihTipePenjualan').on('change', function() {
      if ( this.value == 'beli di tempat' || this.value =="")
      {
        $("#SelectDataKostumer").hide();
      }
      else
      {
        $("#SelectDataKostumer").show();
      }
    });
});
</script> -->
@endsection

@section('title')
ini judul
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
          <h6 class="text-white text-capitalize ps-4">Form penjualan</h6>
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="row">
          <div class="col p-4">
            <form action="{{Route('penjualan.insert')}}" method="post" class="row justify-content-md-center">
              @csrf
              <div class="col-6">
                <div class="input-group input-group-outline @error('tanggal') is-invalid @enderror my-3 is-filled">
                  <label class="form-label">Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" >
                </div>
                @error('tanggal') <small class="text-danger">Pilih tanggal penjualan</small> @enderror

                <div class="input-group input-group-static is-invalid mb-4">
                  <label for="exampleFormControlSelect1" class="ms-0">Pengantaran</label>
                  <select class="form-control" name="tipe_penjualan" id="pilihTipePenjualan">
                    <option>--- Pilih ---</option>
                    <option value="beli di tempat">Beli di tempat</option>
                    <option value="antar motor">Antar motor</option>
                    <option value="antar mobil">Antar mobil</option>
                  </select>
                </div>
                <div id="SelectDataKostumer" class="input-group input-group-static">
                  <label for="exampleFormControlSelect2" class="ms-0">Pilih Konsumen</label>
                  <select multiple="" name="kostumer" class="form-control pb-4" id="exampleFormControlSelect2" >
                    <option value="0" selected>Tidak ada</option>
                    @foreach($kostumers as $item)
                    <option value="{{$item->id}}">{{$item->nama_kostumer}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group input-group-static mb-4">
                  <label for="exampleFormControlSelect1" class="ms-0">Pilih harga satuan</label>
                  <select class="form-control" name="harga_satuan" id="exampleFormControlSelect1">
                    <option>--- Pilih ---</option>
                    <option value="6000">Rp. 6000</option>
                    <option value="7000">Rp. 7000</option>
                  </select>
                </div>
                <div class="input-group input-group-static mb-4">
                  <label for="exampleFormControlSelect1" class="ms-0">Tipe pembayaran</label>
                  <select class="form-control" name="pembayaran" id="exampleFormControlSelect1">
                    <option>--- Pilih ---</option>
                    <option value="lunas">Lunas</option>
                    <option value="bon">Bon</option>
                  </select>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Jumlah galon</label>
                  <input type="number" name="jumlah" class="form-control" >
                </div>
                <div class="input-group input-group-outline my-3">
                  <button type="submit" class="btn btn-primary" name="button">Submit</button>
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
