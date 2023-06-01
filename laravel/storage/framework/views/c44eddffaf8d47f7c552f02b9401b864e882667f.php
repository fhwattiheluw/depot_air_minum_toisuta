<?php $__env->startSection('breadcrumb'); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark " aria-current="page">Rekapan penjualan berdasarkan kostumer</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Rekapan penjualan berdasarkan kostumer</h6>
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
              <h6 class="text-white text-capitalize ps-4">Rekapan berdasarkan kostumer</h6>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">print</i> Cetak</a>
            </div>
          </div>
          <!-- <h6 class="text-white text-capitalize ps-3">Manajemen user</h6> -->
        </div>
      </div>
      <div class="card-body px-0 pb-2">
        <div class="row ">
          <div class="col col-md-5 ">
            <form>
              <div class="row">
                <div class="col ">
                  <div class="input-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Bulan</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col ">
                  <div class="input-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Tahun</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                  <button type="button" class="btn btn-primary mb-4" name="button">Submit</button>
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
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kostumer a</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kostomer b</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kostomer c</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">kostomer d</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle text-center text-sm">
                  <p>$item_tgl->tanggal</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>6</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>5</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>300000</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <p>50000</p>
                </td>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">Net income</th>
                <th class="text-center text-uppercase text-secondary   font-weight-bolder opacity-7">Rp. 1000000</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fadli h wattiheluw\Documents\PROJEK\depot_air_minum_toisuta\laravel\resources\views/rekapan_penjualan_kostumer.blade.php ENDPATH**/ ?>