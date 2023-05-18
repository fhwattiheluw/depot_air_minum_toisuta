

<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input pengeluaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input pengeluaran</h6>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
ini judul
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelProject\depot-app\depot_air_minum_toisuta\laravel\resources\views/form_pengeluaran.blade.php ENDPATH**/ ?>