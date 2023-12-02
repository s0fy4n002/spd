<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
<div class="card">
<div class="card-body p-3">
<div class="row">
<div class="col-8">
<div class="numbers">
 <form action="<?= base_url('laporan') ?>" method="post">
                                <div class="form-group col-md-12">
                                    <h6>Filter Pengajuan Per Bulan</h6>
                                    <input class="form-control" id="tgl" required type="month" name="bulan" value="<?= $bulan ?>"><br>
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-eye"></i> Lihat Rekap</button>
                                    <br>
                                </div>
                            </form>
</p>
</div>
</div>
<div class="col-4 text-end">
<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
<i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
</div>
</div>
</div>
</div>
</div>
</div>
<br>



   <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Pengajuan Perjalanan Dinas</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Download</th>
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penerima</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pemberi</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Berangkat Dari</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bertugas Ke</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $n = 1;
                                        foreach ($data as $data) { ?>
                    <tr>
                       <td class="align-middle">
                        <a href="<?= site_url('laporan/pdf/'.$data['id_spd']); ?>" class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-download text-xs"></i>  <i class="fa fa-plane text-xs"></i>
                        </a>
                      </td>

                     
                      <td>
                        
                                          
                        <div class="d-flex px-2">
                          <div>
                            <!-- <img src="<?= site_url() ?>assets/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify"> -->
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?=$this->session->userdata('usr_nama');?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?=$data['nama_pem'];?></p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?=$data['berangkat'];?></span>
                      </td>
                       <td>
                        <span class="text-xs font-weight-bold"><?=$data['bertugas'];?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?=$data['tanggal'];?></span>
                      </td>
                       <td>
                        <a href="<?= site_url('spd/edit/'.$data['id_spd']); ?>"><span class="text-xs font-weight-bold"><i class="fa fa-pen text-xs"></i> Edit </span></a>
                        <a href="<?= site_url('spd/delete/'.$data['id_spd']); ?>" onclick="konfirmasiHapus()"><span class="text-xs font-weight-bold"><i class="fa fa-trash text-xs"></i> Hapus </span></a>
                      </td>


                     
                     
                    </tr>
                    <?php 
                  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 

 <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Data Pengajuan Cuti</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Download</th>
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Awal Cuti</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Akhir Cuti</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keeterangan</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pengajuan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php $n = 1;
                                        foreach ($cuti as $data) { ?>
                    <tr>
                       <td class="align-middle">
                        <a href="<?= site_url('laporan/cuti/'.$data['id_cuti']); ?>" class="btn btn-link text-secondary mb-0">
                          <i class="fa fa-download text-xs"></i>  <i class="fa fa-plane text-xs"></i>
                        </a>
                      </td>

                     
                      <td>
                        
                                          
                        <div class="d-flex px-2">
                          <div>
                            <!-- <img src="<?= site_url() ?>assets/assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify"> -->
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?=$this->session->userdata('usr_nama');?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?=$data['tgl_awal'];?></p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?=$data['tgl_akhir'];?></span>
                      </td>
                       <td>
                        <span class="text-xs font-weight-bold"><?=$data['keterangan'];?></span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold"><?=$data['tanggal'];?></span>
                      </td>
                       <td>
                        <a href="<?= site_url('cuti/edit/'.$data['id_cuti']); ?>"><span class="text-xs font-weight-bold"><i class="fa fa-pen text-xs"></i> Edit </span></a>
                        <a href="<?= site_url('cuti/delete/'.$data['id_cuti']); ?>" onclick="konfirmasiHapus()"><span class="text-xs font-weight-bold"><i class="fa fa-trash text-xs"></i> Hapus </span></a>
                      </td>


                     
                     
                    </tr>
                    <?php 
                  } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 


 
 
<script>
    function konfirmasiHapus() {
        var inginMenghapus = confirm("Apakah Anda yakin ingin menghapus data ini?");
        
        if (inginMenghapus) {
            // Kode untuk menghapus data
            hapusData();
        } else {
            // Kode jika pengguna membatalkan penghapusan
            console.log("Penghapusan dibatalkan.");
        }
    }

    function hapusData() {
        // Kode untuk menghapus data
        console.log("Data dihapus!");
        // Tempatkan kode penghapusan data di sini
    }
</script>
