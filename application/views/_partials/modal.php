<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php if ($this->session->userdata('usr_level') === 'Admin') { ?>
    <!-- Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Setuju Confirmation-->
    <div class="modal fade" id="setujuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Verifikasi Status</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin mengubah status verifikasi menajadi setuju?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-setuju" class="btn btn-success" href="#">Setuju</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Belum Setuju Confirmation-->
    <div class="modal fade" id="belumsetujuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Verifikasi Status</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= site_url('laporan/verifikasi_belumsetuju') ?>" method="post">
                    <div class="modal-body">Apakah Anda yakin ingin mengubah status verifikasi menajadi tidak setuju?
                        <div class="mb-3"></div>
                        <input type="hidden" name="lap_id" id="lap_id" value="">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="btn_belumsetuju" class="btn btn-danger">Belum Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>