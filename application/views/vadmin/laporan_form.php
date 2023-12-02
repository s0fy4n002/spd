<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Tambah Laporan Kerja</h3>
                <h6 class="font-weight-normal mb-0">Laporan Bulanan THL - IT <span class="text-primary">BAPPEDA Kota Pekanbaru</span></h6>
            </div>
        </div>
    </div>
</div>
<div class="col-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Laporan Kerja</h4>
            <?php echo form_open_multipart('laporan/add'); ?>
            <div class="form-group">
                <label>Unit Kerja<font color="red">&nbsp;*</font></label>
                <select class="form-control select2" style="width: 100%;" name="unit_kerja" required>
                    <option value="" selected="selected">Pilih Unit Kerja</option>
                    <?php foreach ($unit as $row) { ?>
                        <option value="<?= $row['un_id']; ?>"><?= $row['un_nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tempat<font color="red">&nbsp;*</font></label>
                <input type="text" value="Badan Perencanaan Pembangunan Kota Pekanbaru" name="tempat" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Nama<font color="red">&nbsp;*</font></label>
                <select class="form-control select2" style="width: 100%;" name="nama_user" required>
                    <option value="" selected="selected">Pilih Nama</option>
                    <?php foreach ($user as $row) { ?>
                        <option value="<?= $row['usr_id']; ?>"><?= $row['usr_nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Periode : Contoh (Januari 2022)<font color="red">&nbsp;*</font></label>
                <input type="text" name="periode" class="form-control" placeholder="Inputkan Periode" required>
            </div>
            <div class="form-group">
                <label>Tanggal Kegiatan<font color="red">&nbsp;*</font></label>
                <input type="date" name="tgl_kegiatan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Jenis Kegiatan<font color="red">&nbsp;*</font></label>
                <input type="text" name="jenis_kegiatan" class="form-control" placeholder="Inputkan Jenis Kegiatan" required>
            </div>
            <div class="form-group">
                <label>Uraian Kegiatan<font color="red">&nbsp;*</font></label>
                <textarea name="uraian_kegiatan" class="form-control" id="uraian_kegiatan" required></textarea>
            </div>
            <div class="form-group">
                <label>Saran THL-IT : (Opsional)</label>
                <textarea name="saran_thlit" class="form-control" id="saran_thl"></textarea>
            </div>
            <div class="form-group">
                <label>Saran Kasum : (Opsional)</label>
                <textarea name="saran_kasum" class="form-control" id="saran_kasum"></textarea>
            </div>
            <div class="form-group">
                <label>Saran Pimpinan : (Opsional)</label>
                <textarea name="saran_pimpinan" class="form-control" id="saran_pimpinan"></textarea>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary mr-2">Simpan</button>
            <a class="btn btn-light" href="<?= site_url('laporan'); ?>">Batal</a>
            </form>
        </div>
    </div>
</div>