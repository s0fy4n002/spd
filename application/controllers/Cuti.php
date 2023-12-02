<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
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
            $data['content'] = 'vuser/cuti';
            $data['user'] = $this->spd_model->get_user();
            $this->load->view('vuser/index', $data);
        } 
    }

   

   public function add()
    {
        if (isset($_POST['simpan'])) {

            $keterangan = $this->input->post('keterangan', TRUE);
            $tgl_awal = $this->input->post('tgl_awal', TRUE);
            $id_user = $this->session->userdata('usr_id', TRUE);
            $tgl_akhir = $this->input->post('tgl_akhir', TRUE);
           
            $tanggal = date('Y-m-d');

            $data = [
                'keterangan' => $keterangan,
                'tgl_awal' => $tgl_awal,
                'id_user' => $id_user,
                'tgl_akhir' => $tgl_akhir,
                'tanggal' => $tanggal
            ];


            $this->cuti_model->insert($data);
            $this->session->set_flashdata('success', 'Pengajuan berhasil ditambahkan.');
            redirect('cuti');
        } else {
            $data['title'] = 'Tambah Pengajuan Cuti';
            $data['form_title'] = 'Tambahkan Pengajuan Cuti';
            $data['content'] = 'vuser/cuti';
            $this->load->view('vadmin/index', $data);
        }
    }


     public function edit()
    {
       
        $id = $this->uri->segment(3);
        $where = "id_cuti = $id";
        $data['spd'] = $this->cuti_model->data($where);
        $updated_at = date('Y-m-d H:i:s');

        if (isset($_POST['simpan'])) {
            $data = [
                'tgl_awal' => $this->input->post('tgl_awal', TRUE),
                'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'updated_at' => $updated_at
            ];

            $this->cuti_model->update($data, $id);
            $this->session->set_flashdata('success', 'Data Pengajuan berhasil diperbarui.');
            redirect('laporan');
        } else {
            $data['title'] = 'Edit Data Pengajuan';
            $data['form_title'] = 'Edit Data Sample';
            $data['content'] = 'vuser/cetak/cuti';
            $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            $this->load->view('vadmin/index', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->cuti_model->delete($id);
        $this->session->set_flashdata('success', 'Data Pengajuan Berhasil dihapus.');
        redirect('laporan');
    }
}