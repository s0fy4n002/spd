<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spd extends CI_Controller
{

    private static $_title = 'Form Tambah Data Surat Perjalanan Dinas';
    private static $_table = 'user';
    private static $_primaryKey = 'usr_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('spd_model');
        $this->load->model('cuti_model');
        $this->auth->restrict();
    }

    public function index()
    {
        if ($this->session->userdata('usr_level') === 'Admin') {
            $data['title'] = self::$_title;
            $data['content'] = 'vadmin/spd';
            $this->load->view('vadmin/index', $data);
        }  elseif ($this->session->userdata('usr_level') === 'User') {
            $data['title'] = self::$_title;
            $data['content'] = 'vuser/spd';
            $data['user'] = $this->spd_model->get_user();
            $this->load->view('vuser/index', $data);
        } 
    }

   

   public function add()
    {
        if (isset($_POST['simpan'])) {

            $nomor = $this->input->post('nomor', TRUE);
            $pemberi = $this->input->post('pemberi', TRUE);
            $penerima = $this->input->post('penerima', TRUE);
            $berangkat = $this->input->post('berangkat', TRUE);
            $bertugas = $this->input->post('bertugas', TRUE);
            $kembali = $this->input->post('kembali', TRUE);
            $transportasi = $this->input->post('transportasi', TRUE);
            $urusan = $this->input->post('urusan', TRUE);
            $tanggal = date('Y-m-d');

            $data = [
                'nomor' => $nomor,
                'pemberi' => $pemberi,
                'penerima' => $penerima,
                'berangkat' => $berangkat,
                'bertugas' => $bertugas,
                'kembali' => $kembali,
                'transportasi' => $transportasi,
                'urusan' => $urusan,
                'tanggal' => $tanggal
            ];


            $this->spd_model->insert($data);
            $this->session->set_flashdata('success', 'Pengajuan berhasil ditambahkan.');
            redirect('spd');
        } else {
            $data['title'] = 'Tambah Pengajuan Perjalanan Dinas';
            $data['form_title'] = 'Tambahkan Pengajuan Perjalanan Dinas';
            $data['content'] = 'vuser/spd';
            $this->load->view('vadmin/index', $data);
        }
    }


     public function edit()
    {
       
        $id = $this->uri->segment(3);
        $where = "id_spd = $id";
        $data['spd'] = $this->spd_model->data($where);
        $updated_at = date('Y-m-d H:i:s');

        if (isset($_POST['simpan'])) {
            $data = [
                'nomor' => $this->input->post('nomor', TRUE),
                'pemberi' => $this->input->post('pemberi', TRUE),
                'penerima' => $this->input->post('penerima', TRUE),
                'urusan' => $this->input->post('urusan', TRUE),
                'berangkat' => $this->input->post('berangkat', TRUE),
                'bertugas' => $this->input->post('bertugas', TRUE),
                'kembali' => $this->input->post('kembali', TRUE),
                'transportasi' => $this->input->post('transportasi', TRUE),
                'updated_at' => $updated_at
            ];

            $this->spd_model->update($data, $id);
            $this->session->set_flashdata('success', 'Data Pengajuan berhasil diperbarui.');
            redirect('laporan');
        } else {
            $data['title'] = 'Edit Data Pengajuan';
            $data['form_title'] = 'Edit Data Sample';
            $data['content'] = 'vuser/cetak/spd';
            $data['user'] = $this->spd_model->get_user();
            $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            $this->load->view('vadmin/index', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->spd_model->delete($id);
        $this->session->set_flashdata('success', 'Data Pengajuan Berhasil dihapus.');
        redirect('laporan');
    }
}