<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Tabel Jadwal</h3>
                <h6 class="font-weight-normal mb-0">Jadwal Masuk Departemen IT <span class="text-primary">- PT. Sumber Alfaria Trijaya Tbk</span></h6>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <div id="successMessage" class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>&nbsp;<?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<!-- DataTables -->
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Waktu</th>
                                <th class="text-uppercase">Unit</th>
                                <?php $tglhariini=date('Y-m-d');  ?>
                                <?php $tglhariini1=date('Y-m-d',strtotime("+1 day"));  ?>
                                <?php $tglhariini2=date('Y-m-d',strtotime("+2 day"));  ?>
                                <th class="text-uppercase"><?php echo $tglhariini  ?></th>
                                <th class="text-uppercase"><?php echo $tglhariini1  ?></th>
                                <th class="text-uppercase"><?php echo $tglhariini2  ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td rowspan="2" class="align-middle">07:00 - 16:00</td>
                        <td>Office Support</td>
                 
                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini1 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini2 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>
                
                        
                    </tr>
                    <tr>
                        <td>Store Support</td>
                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini1 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '07:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini2 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td rowspan="2">15:00 - 24:00</td>
                        <td>Office Support</td>
                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini1 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini2 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>
                       
                    </tr>
                    <tr>
                    <td>Store Support</td>
                    <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini1 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '15:00:00' and $jd['unit'] == 'Store' and $jd['tgl_jadwal'] == $tglhariini2 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td rowspan="2">22:00 - 07:00</td>
                        <td>Office Support</td>
                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '22:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '22:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini1 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>

                        <td>
                        <?php foreach ($jadwal as $jd) {  ?>
                            <?php if ($jd['jam'] == '22:00:00' and $jd['unit'] == 'Office' and $jd['tgl_jadwal'] == $tglhariini2 ) {
                              ?>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?=$jd['usr_nama'];?></span>
                       
                        <div class="margin-10px-top font-size14">07:00 - 16:00</div>
                        <div class="font-weight-bold font-size13 text-light-black "><?=$jd['shf_deskripsi'];?></div><br>
                        <?php } ?>
                        <?php } ?>
                        </td>
                       
                    </tr>
              
                            
                        </tbody>
                    </table>
                </div>
            </div>