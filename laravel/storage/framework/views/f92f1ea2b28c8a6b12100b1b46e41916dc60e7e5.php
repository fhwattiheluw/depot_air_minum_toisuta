

<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Rekapan pengantaran</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Rekapan pengantaran</h6>
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
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="text-white text-capitalize ps-4">Rekapan tipe penjualan</h6>
            </div>
            <div class="col-6 text-end">

            </div>
          </div>
          <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
        </div>
      </div>
      <div class="card-body pt-4 pb-3">
        <div class="row ">
          <div class="col col-md-5 ">
            <form method="get">
              <?php echo csrf_field(); ?>
              <div class="row">
                <div class="col ">
                  <div class="input-group input-group-outline mb-4 is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Bulan</label>
                    <select class="form-control" name="m" id="exampleFormControlSelect1">
                      <?php for($i = 01; $i <= 12; $i++): ?>
                      <option value="<?php echo e($i); ?>" <?php if($i == $filter['bulan']): ?> selected <?php endif; ?> ><?php echo e($i); ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <div class="col ">
                  <div class="input-group input-group-outline mb-4 is-filled">
                    <label for="exampleFormControlSelect1" class="form-label">Tahun</label>
                    <select class="form-control" name="y" id="exampleFormControlSelect1">
                    <?php for($i = 2023; $i >= 2020; $i--): ?>
                      <option value="<?php echo e($i); ?>" <?php if($i == $filter['tahun']): ?> selected <?php endif; ?> ><?php echo e($i); ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-4"><i class="fas fa-search"></i> Lihat</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah beli di tempat</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah antar dengan motor</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah antar dengan mobil</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $penjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="align-middle text-center text-sm">
                  <p><?php echo e($items->tanggal); ?></p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p><?php echo e($items->total_tempat); ?></p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p><?php echo e($items->total_motor); ?></p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p><?php echo e($items->total_mobil); ?></p>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelProject\depot-app\depot_air_minum_toisuta\laravel\resources\views/rekapan_pengantaran.blade.php ENDPATH**/ ?>