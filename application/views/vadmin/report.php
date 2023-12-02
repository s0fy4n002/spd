<?php
defined('BASEPATH') or exit('No direct script access allowed');
$months = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember',
];
?>


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <?php if ($this->session->flashdata('success')) : ?>
                <div id="successMessage" class="alert alert-success" role="alert">
                    <i class="fa fa-check"></i>&nbsp;<?= $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
        </div>
        <form action="<?= site_url('laporan'); ?>" method="get" class="row">
            <div class="col-md-2">
                <select name="bulan" class="form-control" id="">
                    <option value="">-bulan-</option>
                    <?php foreach ($months as $key => $value) : ?>
                        <option <?= $bulan == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary">Filter</button>
            </div>
        </form>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4>SPD</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a onclick="return ExcellentExport.excel(this, 'table-spd', 'spd.xls');" class="btn btn-success"><i class="mdi mdi-file-excel"></i>Excel</a>
                            </div>


                        </div>

                        <table id="table-spd" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pemberi</th>
                                    <th>Penerima</th>
                                    <th>Urusan</th>
                                    <th>Tanggal</th>
                                    <th>Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($spd as $row) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->spd_pemberi ?></td>
                                        <td><?= $row->spd_penerima ?></td>
                                        <td><?= $row->urusan ?></td>
                                        <td><?= $row->tanggal ?></td>
                                        <td><?= $row->kembali ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12 grid-margin stretch-card mt-4">
            <div class="card">
                <div class="card-header">
                </div>

                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4>Cuti</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a onclick="return ExcellentExport.excel(this, 'table-cuti', 'cuti.xls');" class="btn btn-success"><i class="mdi mdi-file-excel"></i>Excel</a>
                            </div>


                        </div>

                        <table id="table-cuti" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Keterangan</th>
                                    <th>Tgl Awal</th>
                                    <th>Tgl Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($cuti as $c) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
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
    </div>
</div>