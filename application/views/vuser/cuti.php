<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Pengajuan Cuti</p>

                <?php if ($this->session->flashdata('success')) : ?>
<div id="successMessage" class="alert alert-success" role="alert">
    <i class="fa fa-check"></i>&nbsp;<?= $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>
                <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
              </div>
            </div>
            <form action="<?= site_url("cuti/add") ?>" method="post">
            <div class="card-body">
              <p class="text-uppercase text-sm">Data Pengajuan</p>
              <!--   <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" value="jesse@example.com">
                  </div>
                </div> -->
               <!--  <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">First name</label>
                    <input class="form-control" type="text" value="Jesse">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Last name</label>
                    <input class="form-control" type="text" value="Lucky">
                  </div>
                </div>
              </div> -->

              <hr class="horizontal dark">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Awal Cuti</label>
                    <input class="form-control" type="date" name="tgl_awal">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Akhir Cuti</label>
                    <input class="form-control" type="date" name="tgl_akhir" >
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Keterangan</label>
                  <textarea class="form-control" name="keterangan"></textarea>
                  </div>
                </div>
                

                 
                 


            
        <button type="submit" name="simpan" class="btn btn-primary mr-2 col-md-4" style="margin-left: 10px">Simpan</button>
        <a class="btn btn-light col-md-4" href="<?= site_url('cuti'); ?>" style="margin-left: 10px">Batal</a>
        </form>
    </div>
  </div>
