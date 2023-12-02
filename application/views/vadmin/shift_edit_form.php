<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Edit Shift Kerja</h3>
                <h6 class="font-weight-normal mb-0">Jadwal Masuk Departemen IT <span class="text-primary">- PT. Sumber Alfaria Trijaya Tbk</span></h6>
            </div>
        </div>
    </div>
</div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Shift Kerja</h4>
            <form action="<?= $action; ?>" method="post">
                <div class="form-group">
                    <label>Deskripsi Shift</label>
                    <input type="text" name="des_shift" class="form-control" placeholder="Inputkan Shift Kerja" value="<?= isset($shift['shf_deskripsi']) ? $shift['shf_deskripsi'] : NULL ?>" required>
                </div>
                <div class="form-group">
                    <label>Pesan</label>
                    <input type="text" name="pesan" class="form-control" placeholder="Inputkan Pesan" value="<?= isset($shift['pesan']) ? $shift['pesan'] : NULL ?>" required>
                </div>
                <button type="submit" name="simpan" class="btn btn-primary mr-2">Simpan</button>
                <a class="btn btn-light" href="<?= site_url('shift'); ?>">Batal</a>
            </form>
        </div>
    </div>
</div>