<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">SPD</p>
                <h5 class="font-weight-bolder">
                  <?= $total_user_spd ?>
                </h5>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder"><?php echo date('l,'); ?></span>
                  <?php echo date('d-M-Y'); ?>
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Cuti</p>
                <h5 class="font-weight-bolder">
                  <?= $total_user_cuti ?>
                </h5>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
                  since last week
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-spaceship text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </div>

  <div class="row mt-4">

    <div class="col-lg-7">
      <div class="card">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Data</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">

            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-tag text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                  <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                  <i class="ni ni-box-2 text-white opacity-10"></i>
                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                  <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                </div>
              </div>
              <div class="d-flex">
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
              </div>
            </li>

          </ul>

        </div>


      </div>

    </div>
  </div>
</div>