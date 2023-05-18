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
                <h6 class="text-white text-capitalize ps-4">Form pengeluaran</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="row">
                <div class="col p-4">
                  <form class="row justify-content-md-center">
                    <div class="col-lg-6 col-md-6">
                      <div class="input-group input-group-static is-invalid mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">jenis pengeluaran</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>--- Pilih ---</option>
                          <option>pengeluaran a</option>
                          <option>pengeluaran a</option>
                          <option>pengeluaran a</option>
                        </select>
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <label class="form-label">Jumlah</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <label class="form-label">Harga satuan</label>
                        <input type="text" class="form-control">
                      </div>
                      <div class="input-group input-group-outline is-invalid my-3">
                        <textarea class="form-control" rows="5" placeholder="Ketik keterangan" spellcheck="false"></textarea>
                      </div>
                      <label for="">Nota</label>
                      <div class="input-group input-group-outline  is-invalid my-3">
                        <!-- <label class="form-label">Nota</label> -->
                        <input type="file" class="form-control">
                      </div>
                      <div class="input-group input-group-outline my-3">
                        <button type="button" class="btn btn-primary" name="button">Submit</button>
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
