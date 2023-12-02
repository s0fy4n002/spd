<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Tambah User</h3>
                <h6 class="font-weight-normal mb-0">Laporan Bulanan THL - IT <span class="text-primary">BAPPEDA Kota Pekanbaru</span></h6>
            </div>
        </div>
    </div>
</div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah User</h4>
            <?php echo form_open_multipart($action); ?>
            <div class="form-group">
                <!-- <label>Username</label> -->
                <input type="hidden" name="usr_username" class="form-control" placeholder="Inputkan Username" value="<?= isset($user['usr_username']) ? $user['usr_username'] : NULL ?>" readonly>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="usr_password" class="form-control" placeholder="Inputkan Password Baru" required>
            </div>
            <div class="form-group">
                <!-- <label>Nama User</label> -->
                <input type="hidden" name="usr_nama" class="form-control" placeholder="Inputkan Nama User" value="<?= isset($user['usr_nama']) ? $user['usr_nama'] : NULL ?>" readonly>
            </div>
            <div class="form-group">
                <!-- <label>Level</label> -->
                <input type="hidden" name="usr_level" class="form-control" value="<?= isset($user['usr_level']) ? $user['usr_level'] : NULL ?>" readonly>
            </div>
            <div class="form-group">
                <!-- <label>TTD</label> -->
                <input type="hidden" name="usr_foto" class="form-control" readonly>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary mr-2">Simpan</button>
            <a class="btn btn-light" href="<?= site_url('dashboard'); ?>">Batal</a>
            </form>
        </div>
    </div>
</div>