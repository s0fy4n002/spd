<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Tambah User</h3>
                <h6 class="font-weight-normal mb-0">Jadwal Masuk Departemen IT <span class="text-primary">- PT. Sumber Alfaria Trijaya Tbk</span></h6>
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
                    <label>Username</label>
                    <input type="text" name="usr_username" class="form-control" placeholder="Inputkan Username" value="<?= isset($user['usr_username']) ? $user['usr_username'] : NULL ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="usr_password" class="form-control" placeholder="Inputkan Password" value="<?= isset($user['usr_password']) ? $user['usr_password'] : NULL ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="usr_nama" class="form-control" placeholder="Inputkan Nama User" value="<?= isset($user['usr_nama']) ? $user['usr_nama'] : NULL ?>" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control select2" style="width: 100%;" name="usr_level" id="usr_level" required>
                        <option value="<?= isset($user['usr_level']) ? $user['usr_level'] : NULL ?>" selected="selected"><?= isset($user['usr_level']) ? $user['usr_level'] : NULL ?></option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label>TTD</label>
                    <input type="file" name="usr_foto" class="form-control" required><br>
                    <?php if (file_exists('assets/img/' . $user['usr_foto'])) { ?>
                        <img src="<?= site_url('assets/img/' . $user['usr_foto']) ?>" width="100" />
                    <?php } ?>
                </div> -->
                <button type="submit" name="simpan" class="btn btn-primary mr-2">Simpan</button>
                <a class="btn btn-light" href="<?= site_url('user'); ?>">Batal</a>
            </form>
        </div>
    </div>
</div>