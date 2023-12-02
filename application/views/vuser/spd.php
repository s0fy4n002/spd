<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Tambah Pengajuan Perjalanan Dinas</p>

                <?php if ($this->session->flashdata('success')) : ?>
<div id="successMessage" class="alert alert-success" role="alert">
    <i class="fa fa-check"></i>&nbsp;<?= $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>
                <!-- <button class="btn btn-primary btn-sm ms-auto">Settings</button> -->
              </div>
            </div>
            <form action="<?= site_url("spd/add") ?>" method="post">
            <div class="card-body">
              <p class="text-uppercase text-sm">Pemberi Tugas</p>
              <div class="row">
              	
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Pemberi Tugas</label>
                   <select class="form-control select2" style="width: 100%;" name="pemberi" required>
                        <option value="" selected="selected">Pilih Pemberi Tugas</option>
                        <?php foreach ($user as $row) { ?>
                        <option value="<?= $row['usr_id']; ?>"><?= $row['usr_nama'] ?> - <?= $row['usr_unit'] ?></option>
                         <?php } ?>
                    </select>
                  </div>
                </div>
                <?php
                  function bulanKeRomawi($bulan) {
                      $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];

                      return isset($romawi[$bulan]) ? $romawi[$bulan] : 'Bulan tidak valid';
                  }

                  // Contoh penggunaan
                  $bulan = date('m'); // Ganti dengan bulan yang diinginkan
                  $romawiBulan = bulanKeRomawi($bulan);
                  ?>

                 <div class="col-md-6 hidden">
                  <div class="form-group">
                   
                  <input class="form-control" type="text" name="nomor" value="/SPD/PPIN/<?php echo $romawiBulan ?>/<?php echo date('Y') ?>" hidden >
                  </div>
                </div>
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
              <p class="text-uppercase text-sm">Penerima Tugas</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Penerima Tugas</label>
                    <input class="form-control" type="text" value="<?= $this->session->userdata('usr_nama'); ?>"  readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" type="text" value="<?= $this->session->userdata('usr_id'); ?>" name="penerima" hidden>
                  </div>
                </div>

                 <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Rincian Perjalanan Dinas</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Berangkat dari Provinsi</label>
                    <select class="form-control" id="provinsi1"> 
                      <!-- Opsi Provinsi akan diisi secara dinamis menggunakan JavaScript -->
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Berangkat Dari Kota</label>
                     <select class="form-control" id="kota1" name="berangkat">
                       <!-- Opsi Kota akan diisi secara dinamis menggunakan JavaScript -->
                    </select>
                  </div>
                </div>
                  <hr class="horizontal dark">
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Bertugas Ke Provinsi</label>
                    <select class="form-control" id="provinsi2"> 
                      <!-- Opsi Provinsi akan diisi secara dinamis menggunakan JavaScript -->
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Bertugas Ke Kota</label>
                     <select class="form-control" id="kota2" name="bertugas">
                       <!-- Opsi Kota akan diisi secara dinamis menggunakan JavaScript -->
                    </select>
                  </div>
                </div>

                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Kembali</label>
                  <input class="form-control" type="date" name="kembali">
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Moda Transportasi</label>
                    <select class="form-control" name="transportasi">
                       <option value="" selected="selected">Pilih Moda Transportasi</option>
                      <option value="Pesawat Terbang">Pesawat Terbang</option>
                      <option value="Mobil">Mobil</option>
                    </select>
                  </div>
                </div>
                
             
                 <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Urusan</label>
                  <textarea class="form-control" name="urusan"></textarea>
                  </div>
                </div>
                 


            </div>
          </div>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary mr-2 col-md-4" style="margin-left: 10px">Simpan</button>
        <a class="btn btn-light col-md-4" href="<?= site_url('dashboard'); ?>" style="margin-left: 10px">Batal</a>
        </form>

      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
    // Ganti "YOUR_API_ENDPOINT" dengan URL API provinsi dari emsifa.com
    const provinsiEndpoint = "https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json";
    const regenciesEndpointBase = "https://www.emsifa.com/api-wilayah-indonesia/api/regencies";

    async function getProvinsi(formId) {
        try {
            const response = await axios.get(provinsiEndpoint);
            const data = response.data;
            console.log(`Provinsi data for form ${formId}:`, data);
            populateSelect(`provinsi${formId}`, data);

            // Add event listener for province change
            const provinsiSelect = document.getElementById(`provinsi${formId}`);
            provinsiSelect.addEventListener('change', function () {
                updateKota(formId);
            });

            // Trigger initial update for city data
            updateKota(formId);
        } catch (error) {
            console.error(`Error fetching provinsi for form ${formId}:`, error);
        }
    }

    async function getKotaByProvinsi(formId, provinsiId) {
        const regenciesEndpoint = `${regenciesEndpointBase}/${provinsiId}.json`;

        try {
            const response = await axios.get(regenciesEndpoint);
            const data = response.data;
            console.log(`Kota data for form ${formId}:`, data);
            populateSelectWithCityNames(`kota${formId}`, data); // Perubahan di sini
        } catch (error) {
            console.error(`Error fetching kota for form ${formId}:`, error);
        }
    }

    function updateKota(formId) {
        var provinsiSelect = document.getElementById(`provinsi${formId}`);
        var selectedProvinsi = provinsiSelect.value;
        getKotaByProvinsi(formId, selectedProvinsi);
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement("option");
        option.value = value; // Gunakan nama kota sebagai nilai
        option.text = text;
        selectElement.add(option);
    }

    function populateSelect(selectId, data) {
        var selectElement = document.getElementById(selectId);
        selectElement.innerHTML = "";

        data.forEach(function(item) {
            addOption(selectElement, item.id, item.name);
        });
    }

    function populateSelectWithCityNames(selectId, data) {
        var selectElement = document.getElementById(selectId);
        selectElement.innerHTML = "";

        data.forEach(function(item) {
            addOption(selectElement, item.name, item.name); // Gunakan nama kota sebagai nilai dan teks
        });
    }

    window.onload = function () {
        getProvinsi('1');
        getProvinsi('2');
    };
</script>