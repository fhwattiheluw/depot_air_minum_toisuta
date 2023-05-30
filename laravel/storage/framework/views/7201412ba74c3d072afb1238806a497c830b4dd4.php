<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Input peminjaman galon</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Input peminjaman galon</h6>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
ini judul
<?php $__env->stopSection(); ?>

<?php $__env->startSection('konten'); ?>

<div class="row">

  <?php if($errors->any()): ?>
  <div class="col">
    <div class="alert alert-warning text-white" role="alert" id="alert">
      <span class="alert-icon align-middle">
        <i class="fas fa-exclamation-triangle"></i>
      </span>
      <span class="alert-text"><strong>Warning!</strong> Periksa kembali inputan anda</span>
    </div>
  </div>
  <?php endif; ?>

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
              <tr class="text-center">
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">tanggal</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kostumer</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ket.</th>
                <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $peminjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="text-center">
                <td class="text-xs  font-weight-bold mb-0"><?php echo e($item->tanggal_pinjam); ?></td>
                <td class="text-xs font-weight-bold mb-0"><?php echo e($item->kostumer->nama_kostumer); ?></td>
                <td class="text-xs font-weight-bold mb-0"><?php echo e($item->jumlah_galon); ?></td>
                <td class="text-xs font-weight-bold mb-0"><?php echo e($item->keterangan); ?></td>
                <td class="align-middle">
                  <!-- modal edit -->
                  <a href="javascript:;" class="text-warning font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_edit_<?php echo e($item->id); ?>" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-edit"></i>Edit
                  </a>
                  <!-- Modal -->
                  <form method="post" class="modal fade" id="modal_edit_<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <?php echo csrf_field(); ?>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Edit peminjaman galon</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="SelectDataKostumer" class="input-group input-group-static">
                            <label for="exampleFormControlSelect2" class="ms-0">Pilih Konsumen</label>
                            <select multiple="" name="kostumer" class="form-control pb-4" id="exampleFormControlSelect2">
                              <?php $__currentLoopData = $kostumer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_kostumer); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <?php $__errorArgs = ['kostumer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
                            <label class="form-label">Tanggal pinjam</label>
                            <input type="date" class="form-control" name="tanggal">
                          </div>
                          <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
                            <label class="form-label">Jumlah galon</label>
                            <input type="text" class="form-control" name="jumlah">
                          </div>
                          <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                  <!-- modal remove -->
                  <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal_remove_<?php echo e($item->id); ?>" data-toggle="tooltip" data-original-title="Edit user">
                    <i class="fas fa-trash"></i>Remove
                  </a>
                  <!-- Modal -->
                  <form method="post" class="modal fade" id="modal_remove_<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <?php echo csrf_field(); ?>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Remove data</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div id="SelectDataKostumer" class="input-group input-group-static">
                            <label for="exampleFormControlSelect2" class="ms-0">Pilih Konsumen</label>
                            <select multiple="" name="kostumer" class="form-control pb-4" id="exampleFormControlSelect2">
                              <?php $__currentLoopData = $kostumer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_kostumer); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                          </div>
                          <?php $__errorArgs = ['kostumer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
                            <label class="form-label">Tanggal pinjam</label>
                            <input type="date" class="form-control" name="tanggal">
                          </div>
                          <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                          <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
                            <label class="form-label">Jumlah galon</label>
                            <input type="text" class="form-control" name="jumlah">
                          </div>
                          <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <small class="text-danger"><?php echo e($message); ?></small>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

          </table>
          <p class="text-xs text-bold mb-0 ps-5">
            Current Page: <?php echo e($peminjaman->currentPage()); ?><br>
            Jumlah Data: <?php echo e($peminjaman->total()); ?><br>
            Data perhalaman: <?php echo e($peminjaman->perPage()); ?><br>
            <br>
          </p>

          <?php echo e($peminjaman->links()); ?>

        </div>
      </div>
    </div>
  </div>


</div>

<!-- Modal add -->
<form method="post" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php echo csrf_field(); ?>
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
            <?php $__currentLoopData = $kostumer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->nama_kostumer); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <?php $__errorArgs = ['kostumer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
          <label class="form-label">Tanggal pinjam</label>
          <input type="date" class="form-control" name="tanggal">
        </div>
        <?php $__errorArgs = ['tanggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <div class="input-group input-group-outline <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> my-3">
          <label class="form-label">Jumlah galon</label>
          <input type="text" class="form-control" name="jumlah">
        </div>
        <?php $__errorArgs = ['jumlah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger"><?php echo e($message); ?></small>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fadli h wattiheluw\Documents\PROJEK\depot_air_minum_toisuta\laravel\resources\views/form_pinjaman_galon.blade.php ENDPATH**/ ?>