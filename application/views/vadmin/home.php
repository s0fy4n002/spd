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
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total User</p>
                <h5 class="font-weight-bolder">
                  <?= $get_total_user ?>
                </h5>
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
    <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Shift</p>
                <h5 class="font-weight-bolder">
                  <?= $get_total_shift ?>
                </h5>
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
    </div> -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total SPD</p>
                <h5 class="font-weight-bolder">
                  <?= $get_total_spd ?>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-istanbul text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Cuti</p>
                <h5 class="font-weight-bolder">
                  <?= $total_cuti ?>
                </h5>
                <!-- <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                </p> -->
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row mt-4">

    <div class="col-lg-6 col-12 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">SPD Overview</h6>
          <p class="text-sm mb-0">
            <!-- <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021 -->
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-12 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Cuti overview</h6>
          <p class="text-sm mb-0">
            <!-- <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021 -->
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-cuti" class="chart-cuti" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>


    
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">SPD</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Pemberi</th>
                <th>Penerima</th>
                <th>Urusan</th>
                <th>Kembali</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($spd as $spd) : ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td><?= $spd->spd_pemberi ?></td>
                  <td><?= $spd->spd_penerima ?></td>
                  <td><?= $spd->urusan ?></td>
                  <td><?= $spd->kembali ?></td>
                </tr>
              <?php $no++;
              endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-lg-12 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Cuti</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-hover">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th>User</th>
                <th>Keterangan</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($cuti as $c) : ?>
                <tr>
                  <td class="text-center"><?= $no ?></td>
                  <td><?= $c->user_cuti ?></td>
                  <td><?= $c->keterangan ?></td>
                  <td><?= $c->tgl_awal ?></td>
                  <td><?= $c->tgl_akhir ?></td>
                </tr>
              <?php $no++;
              endforeach ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  