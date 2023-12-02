<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    private static $_table = 'jadwal';
    private static $_primaryKey = 'id_jadwal';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal_model');
        $this->auth->restrict();
    }
 
    public function index()
    {
        $data['title'] = 'Laporan - SIPROTAN';

        $data['jadwal'] = $this->jadwal_model->get_jadwal();
   

        $data['jadwal_detail'] = $this->jadwal_model->get_jadwal_detail();

        if ($this->session->userdata('usr_level') === 'Admin') {
            $data['content'] = 'vadmin/jadwal';
            $this->load->view('vadmin/index', $data);
        } elseif ($this->session->userdata('usr_level') === 'User') {
            $data['content'] = 'vuser/jadwal';
            $this->load->view('vuser/index', $data);
        } 
    }

    public function pesan()
    {
        $data['title'] = 'Jenis Shift - e-Schedule';
        $this->load->view('vadmin/pesanterjadwaldaily', $data);
    }

    // public function get_data()
    // {
    //     if (!$this->input->is_ajax_request()) {
    //         exit('No direct script access allowed');
    //     } else {
    //         $this->load->library('datatables_ssp');

    //         $columns = array(
    //             array('db' => 'id_jadwal', 'dt' => 'id_jadwal'),
    //             array('db' => 'shf_jenis', 'dt' => 'shf_jenis'),
    //             array('db' => 'shf_deskripsi', 'dt' => 'shf_deskripsi'),
    //             array('db' => 'pesan', 'dt' => 'pesan'),
    //             array(
    //                 'db' => 'shf_id',
    //                 'dt' => 'action',
    //                 'formatter' => function ($id) {
    //                     return '<a href="' . site_url('shift/edit/' . $id) . '" class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i>Edit</a>
    //                             <a onclick="deleteConfirm(' . "'" . site_url('shift/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash"></i>Hapus</a>';
    //                 }
    //             )
    //         );

    //         $sql_details = [
    //             'user' => $this->db->username,
    //             'pass' => $this->db->password,
    //             'db' => $this->db->database,
    //             'host' => $this->db->hostname
    //         ];

    //         echo json_encode(
    //             Datatables_ssp::simple($_GET, $sql_details, self::$_table, self::$_primaryKey, $columns)
    //         );
    //     }
    // }

    public function add()
    {
        if (isset($_POST['simpan'])) {

            $nama_user = $this->input->post('nama_user', TRUE);
            $unit_kerja = $this->input->post('unit_kerja', TRUE);
            $tempat = $this->input->post('tempat', TRUE);
            $nama_user = $this->input->post('nama_user', TRUE);
            $periode = $this->input->post('periode', TRUE);
            $tgl_kegiatan = $this->input->post('tgl_kegiatan', TRUE);
            $jenis_kegiatan = $this->input->post('jenis_kegiatan', TRUE);
            $uraian_kegiatan = $this->input->post('uraian_kegiatan', TRUE);
            $saran_thlit = $this->input->post('saran_thlit', TRUE);
            $saran_kasum = $this->input->post('saran_kasum', TRUE);
            $saran_pimpinan = $this->input->post('saran_pimpinan', TRUE);
            // $ttdkasum = $this->input->post('ttdkasum', TRUE);
            $created_at = date('Y-m-d H:i:s');

            $data = [
                'id_user' => $nama_user,
                'id_unit' => $unit_kerja,
                'lap_tempat' => $tempat,
                'id_user' => $nama_user,
                'lap_periode' => $periode,
                'lap_tgl' => $tgl_kegiatan,
                'lap_jeniskeg' => $jenis_kegiatan,
                'lap_uraiankeg' => $uraian_kegiatan,
                'lap_saran_thlit' => $saran_thlit,
                'lap_saran_kasum' => $saran_kasum,
                'lap_saran_pimpinan' => $saran_pimpinan,
                // 'lap_ttdkasum' => $ttdkasum,
                'created_at' => $created_at
            ];

            $this->laporan_model->insert($data);
            $this->session->set_flashdata('success', 'Laporan berhasil ditambahkan.');
            redirect('laporan');
        } else {
            $data['unit'] = $this->laporan_model->get_unit();
            $data['user'] = $this->laporan_model->get_user();
            $data['title'] = 'Tambah Laporan - e-Laporan';
            $data['form_title'] = 'Tambah Laporan';
            $data['content'] = 'vadmin/laporan_form';
            $this->load->view('vadmin/index', $data);
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $where = "lap_id = $id";
        $data['laporan'] = $this->laporan_model->get_laporan($where);
        $updated_at = date('Y-m-d H:i:s');

        if (isset($_POST['simpan'])) {
            $ttdkasum = $_FILES['ttdkasum']['name'];

            $this->load->library('upload');

            $config['upload_path']      = './assets/img/';
            $config['allowed_types']    = 'jpg|png';
            $config['file_ext_tolower'] = TRUE;
            $config['max_size']         = 2048;
            $config['overwrite'] = TRUE;
            $x = explode(".", $ttdkasum);
            $ext = strtolower(end($x));
            $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.' . $ext;
            // $config['file_name'] = $s_id . "-foto." . $ext;
            $ttdkasum = $config['file_name'];
            $this->upload->initialize($config);
            $this->upload->do_upload('ttdkasum');

            $data = [
                'id_unit' => $this->input->post('unit_kerja', TRUE),
                'lap_tempat' => $this->input->post('tempat', TRUE),
                'id_user' => $this->input->post('nama_user', TRUE),
                'lap_periode' => $this->input->post('periode', TRUE),
                'lap_tgl' => $this->input->post('tgl_kegiatan', TRUE),
                'lap_jeniskeg' => $this->input->post('jenis_kegiatan', TRUE),
                'lap_uraiankeg' => $this->input->post('uraian_kegiatan', TRUE),
                'lap_saran_thlit' => $this->input->post('saran_thlit', TRUE),
                'lap_saran_kasum' => $this->input->post('saran_kasum', TRUE),
                'lap_saran_pimpinan' => $this->input->post('saran_pimpinan', TRUE),
                'lap_ttdkasum' => (!empty($ttdkasum)) ? $ttdkasum : $data['laporan']['lap_ttdkasum'],
                'updated_at' => $updated_at
            ];

            $this->laporan_model->update($data, $id);
            $this->session->set_flashdata('success', 'Laporan berhasil diperbarui.');
            redirect('laporan');
        } else {
            $data['unit'] = $this->laporan_model->get_unit();
            $data['user'] = $this->laporan_model->get_user();
            $data['title'] = 'Edit Laporan - e-Laporan';
            $data['form_title'] = 'Edit Laporan';
            $data['content'] = 'vadmin/laporan_edit_form';
            $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            $this->load->view('vadmin/index', $data);
        }
    }

    // public function cetak_pdf()
    // {
    //     // $id_user = $this->session->userdata('usr_id');
    //     $id = $this->uri->segment(3);
    //     $where = "lap_id = $id";
    //     $data['laporan'] = $this->laporan_model->get_laporan($where);

    //     $this->load->library('pdfgenerator');

    //     // $tgl = $this->input->post('tgl', TRUE);
    //     // $tgl2 = $this->input->post('tgl2', TRUE);
    //     // $data['laporan'] = $this->laporan_model->get_laporan_cetak($id_user, $tgl, $tgl2);
    //     // $data['laporan2'] = $this->laporan_model->get_laporan_cetak2($id_user, $tgl, $tgl2);

    //     if ($this->session->userdata('usr_level') === 'SupAdmin') {
    //         $html = $this->load->view('vsupadmin/laporan_cetak', $data, true);
    //     } elseif ($this->session->userdata('usr_level') === 'Admin') {
    //         $html = $this->load->view('vadmin/laporan_cetak', $data, true);
    //     } elseif ($this->session->userdata('usr_level') === 'User') {
    //         $html = $this->load->view('vuser/laporan_cetak', $data, true);
    //     } elseif ($this->session->userdata('usr_level') === 'Operator') {
    //         $html = $this->load->view('voperator/laporan_cetak', $data, true);
    //     }
    //     // $html = $this->load->view('vuser/laporan_cetak', $data, true);
    //     $file_pdf = 'laporan_kerja';
    //     $paper = 'A4';
    //     $orientation = 'portrait';

    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function delete($id = NULL)
    {
        $this->laporan_model->delete($id);
        $this->session->set_flashdata('success', 'Laporan berhasil dihapus.');
        redirect('laporan');
    }
}
