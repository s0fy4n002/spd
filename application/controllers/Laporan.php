<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    private static $_title = 'Form Tambah Data Surat Perjalanan Dinas';
    private static $_table = 'spd';
    private static $_primaryKey = 'id_spd';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('spd_model');
        $this->load->model('dashboard_model');
        $this->load->model('cuti_model');
        $this->auth->restrict();
        $this->load->helper('tanggal');
    }

    public function index()
    {
        if ($this->session->userdata('usr_level') === 'Admin') {
            $bulan = $this->input->get('bulan', TRUE) ?? '';

            $data['spd'] = $this->dashboard_model->get_spd($bulan);
            $data['cuti'] = $this->dashboard_model->get_cuti($bulan);

            $data['title'] = self::$_title;
            $data['bulan'] = $bulan;
            
            $data['content'] = 'vadmin/report';
            $this->load->view('vadmin/index', $data);

        } elseif ($this->session->userdata('usr_level') === 'User') {
            $bln = $this->input->post('bulan');
            if (!isset($bln)) {
                $bulan    =  date('Y-m');
            } else {
                $bulan = $this->input->post('bulan');
            }
            $data['title'] = self::$_title;
            $data['content'] = 'vuser/laporan';
            $data['user'] = $this->spd_model->get_user();
            $data['data'] = $this->spd_model->get_data($bulan);
            $data['cuti'] = $this->cuti_model->get_data($bulan);
            $data['bulan'] = $bulan;
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
            $this->load->view('vuser/spd', $data);
        }
    }




    public function delete($id = NULL)
    {
        $this->user_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus.');
        redirect('user');
    }

    function pdf()
    {
        $id = $this->uri->segment(3);
        $where = "id_spd = $id";
        $where2 = "$id";
        $this->load->library('CustomPDF');
        $pdf = new FPDF('P', 'mm', 'Letter');

        $pdf->AddPage();

        // Image


        $pdf->Image('https://i.ibb.co/T2rVr3B/ppinfra.png', 90, 10, 30, 22, 'PNG');

        // Set Y position for the title below the image
        $pdf->SetY(32);  // Adjust the value as needed

        // Title
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 7, 'SURAT PERJALANAN DINAS', 0, 1, 'C');

        // Your data
        $pdf->SetFont('Arial', '', 10);

        $spd = $this->db->where($where)->where('penerima', $this->session->userdata('usr_id'))->get(self::$_table)->row_array();
        $user =  $this->db->where('usr_id', $this->session->userdata('usr_id'))->get('user')->row_array();
        $pemberi =  $this->db->select('*,usr_nama as nama_pem,usr_username as username, usr_jabatan as jabatan, usr_unit as unit')->join('user u', 'j.pemberi = u.usr_id')->where('id_spd', $where2)->get('spd j')->row_array();;

        if (!empty($spd)) {
            // Check if 'nomor' key exists in the array
            if (isset($spd['nomor'])) {
                $pdf->Cell(0, 7, 'NO.      ' . $spd['nomor'] . '', 0, 1, 'C');  // The last '0' indicates no border, '1' indicates a new line after the cell, 'C' centers the text
            } else {
                $pdf->Cell(0, 7, 'Nomor not found', 0, 1, 'C');
            }
        } else {
            $pdf->Cell(0, 7, 'No data found', 0, 1, 'C');
        }
        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Pemberi Tugas ;", 40, 1, "L");
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 10);
        // Set font
        $pdf->SetFont('Arial', '', 10);

        // Nama
        $pdf->Cell(20, 7, "Nama", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $pemberi['nama_pem'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "NRP", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $pemberi['username'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Jabatan", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $pemberi['jabatan'], 0, 1, "L");
        $pdf->Ln();

        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Penerima Tugas ;", 40, 1, "L");
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 10);
        // Set font
        $pdf->SetFont('Arial', '', 10);

        // Nama
        $pdf->Cell(20, 7, "Nama", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_nama'], 0, 1, "L");


        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "NRP", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_username'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Jabatan", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_jabatan'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Unit / Departemen", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_unit'], 0, 1, "L");
        $pdf->Ln();

        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Rincian Perjalanan Dinas ;", 40, 1, "L");
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 10);
        // Set font
        $pdf->SetFont('Arial', '', 10);

        // Nama
        $pdf->Cell(20, 7, "Berangkat Dari", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $spd['berangkat'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Bertugas Ke", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $spd['bertugas'], 0, 1, "L");


        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Tanggal Kembali", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . format_indo($spd['kembali']), 0, 1, "L");
        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Moda Transportasi", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $spd['transportasi'], 0, 1, "L");
        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Urusan", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $spd['urusan'], 0, 1, "L");
        $pdf->Ln();

        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Pengesahan ;", 40, 1, "L");

        $tgl = date('Y-m-d');

        // $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, format_indo($tgl), 0, 1, "C");


        $pdf->Cell(15);
        $pdf->Cell(55, 7, 'Pemohon', 1, 0, 'C');
        $pdf->Cell(55, 7, 'Mengetahui', 1, 0, 'C');
        $pdf->Cell(50, 7, 'Menyetujui', 1, 0, 'C');

        $pdf->Ln();
        $pdf->Cell(15);
        $pdf->Cell(55, 30, '', 1, 0, 'C');
        $pdf->Cell(55, 30, '', 1, 0, 'C');
        $pdf->Cell(50, 30, '', 1, 0, 'C');

        $pdf->Ln();
        $pdf->Cell(15);
        $pdf->Cell(55, 7, $user['usr_nama'], 1, 0, 'C');
        $pdf->Cell(55, 7, '', 1, 0, 'C');
        $pdf->Cell(50, 7, $pemberi['nama_pem'], 1, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(15);
        $pdf->Cell(55, 7, $user['usr_jabatan'], 1, 0, 'C');
        $pdf->Cell(55, 7, '', 1, 0, 'C');
        $pdf->Cell(50, 7, $pemberi['jabatan'], 1, 0, 'C');



        $pdf->Output();
    }

    function cuti()
    {
        $id = $this->uri->segment(3);
        $where = "id_cuti = $id";
        $where2 = "$id";
        $this->load->library('CustomPDF');
        $pdf = new FPDF('P', 'mm', 'Letter');

        $pdf->AddPage();

        // Image


        $pdf->Image('https://i.ibb.co/T2rVr3B/ppinfra.png', 90, 10, 30, 22, 'PNG');

        // Set Y position for the title below the image
        $pdf->SetY(32);  // Adjust the value as needed

        // Title
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 7, 'Izin Pelaksanaan Cuti', 0, 1, 'C');

        // Your data
        $pdf->SetFont('Arial', '', 10);

        $spd = $this->db->where($where)->where('id_user', $this->session->userdata('usr_id'))->get('cuti')->row_array();
        $user =  $this->db->where('usr_id', $this->session->userdata('usr_id'))->get('user')->row_array();



        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Profil Pengajuan Cuti ;", 40, 1, "L");
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 10);
        // Set font
        $pdf->SetFont('Arial', '', 10);

        // Nama
        $pdf->Cell(20, 7, "Nama", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_nama'], 0, 1, "L");


        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "NRP", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_username'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Jabatan", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_jabatan'], 0, 1, "L");

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Unit / Departemen", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $user['usr_unit'], 0, 1, "L");
        $pdf->Ln();

        $pdf->Cell(15);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(4, 7, "Rincian Cuti ;", 40, 1, "L");
        $pdf->Cell(20);
        $pdf->SetFont('Arial', '', 10);
        // Set font
        $pdf->SetFont('Arial', '', 10);

        // // Nama
        // $pdf->Cell(20, 7, "Tanggal Awal Cuti", 0, 0, "L");
        // $pdf->Cell(20);
        // $pdf->Cell(45, 7,': '.format_indo ($spd['tgl_awal']), 0, 1, "L");

        // // SetX for alignment
        // $pdf->SetX(30);
        // // Isan
        // $pdf->Cell(20, 7, "Tanggal Akhir Cuti", 0, 0, "L");
        // $pdf->Cell(20);
        // $pdf->Cell(45, 7,': '.format_indo ($spd['tgl_akhir']), 0, 1, "L");
        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Tanggal Awal Cuti", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . format_indo($spd['tgl_awal']), 0, 1, "L");
        // SetX for alignment

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Tanggal Akhir Cuti", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . format_indo($spd['tgl_akhir']), 0, 1, "L");
        // SetX for alignment

        // SetX for alignment
        $pdf->SetX(30);
        // Isan
        $pdf->Cell(20, 7, "Keterangan", 0, 0, "L");
        $pdf->Cell(20);
        $pdf->Cell(45, 7, ': ' . $spd['keterangan'], 0, 1, "L");
        // SetX for alignment
        $pdf->SetX(30);
        // Isan

        $tgl = date('Y-m-d');

        // $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(0, 10, format_indo($tgl), 0, 1, "C");
        $pdf->Ln(0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 0, "Pemohon", 0, 1, "L");
        $pdf->Cell(0, 0, "Menyetujui", 0, 1, "R");
        $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 0, "............................", 0, 1, "R");
        $pdf->Cell(0, 0, $user['usr_nama'], 0, 1, "L");




        $pdf->Output();
    }
}
