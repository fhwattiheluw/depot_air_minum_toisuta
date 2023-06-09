

<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input penjualan</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input penjualan</h6>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
ini judul
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>
<div class="row">
  <?php if(session()->has('success')): ?>
  <div class="col">
    <div class="alert alert-success text-white" role="alert" id="alert">
      <span class="alert-icon align-middle">
        <i class="fas fa-thumbs-up"></i>
      </span>
      <span class="alert-text"><strong>Success!</strong> <?php echo e(Session::get('success')); ?></span>
    </div>
  </div>
  <?php endif; ?>
  <?php if($errors->any()): ?>
    <div class="col">
      <div class="alert alert-danger text-white">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
    </div>
<?php endif; ?>
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
            <form action="<?php echo e(Route('penjualan.insert')); ?>" method="post" class="row justify-content-md-center">
              <?php echo csrf_field(); ?>
              <div class="col-6">
                <div class="input-group input-group-outline <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3 is-filled">
                  <label class="form-label">Tanggal</label>
                  <input type="date" name="tanggal" class="form-control" >
                </div>
                <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger">Pilih tanggal penjualan</small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

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
                    <?php $__currentLoopData = $kostumers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_kostumer); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelProject\depot-app\depot_air_minum_toisuta\laravel\resources\views/form_penjualan.blade.php ENDPATH**/ ?>