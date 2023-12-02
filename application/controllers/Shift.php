<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shift extends CI_Controller
{
    private static $_table = 'shift';
    private static $_primaryKey = 'shf_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('shift_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Jenis Shift - e-Schedule';

        $data['content'] = 'vadmin/shift';
        $this->load->view('vadmin/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'shf_id', 'dt' => 'shf_id'),
         
                array('db' => 'shf_deskripsi', 'dt' => 'shf_deskripsi'),
                array('db' => 'pesan', 'dt' => 'pesan'),
                array(
                    'db' => 'shf_id',
                    'dt' => 'action',
                    'formatter' => function ($id) {
                        return '<a href="' . site_url('shift/edit/' . $id) . '" class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i>Edit</a>
                                <a onclick="deleteConfirm(' . "'" . site_url('shift/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash"></i>Hapus</a>';
                    }
                )
            );

            $sql_details = [
                'user' => $this->db->username,
                'pass' => $this->db->password,
                'db' => $this->db->database,
                'host' => $this->db->hostname
            ];

            echo json_encode(
                Datatables_ssp::simple($_GET, $sql_details, self::$_table, self::$_primaryKey, $columns)
            );
        }
    }

    public function add()
    {
        if (isset($_POST['simpan'])) {

            $des_shift = $this->input->post('des_shift', TRUE);
            $pesan = $this->input->post('pesan', TRUE);
            $created_at = date('Y-m-d H:i:s');

            $data = [
                'shf_deskripsi' => $des_shift,
                'pesan' => $pesan,
                'created_at' => $created_at
            ];


            $this->shift_model->insert($data);
            $this->session->set_flashdata('success', 'Shift berhasil ditambahkan.');
            redirect('shift');
        } else {
            $data['title'] = 'Tambah Shift - e-Laporan';
            $data['form_title'] = 'Tambahkan Shift';
            $data['content'] = 'vadmin/shift_form';
            $this->load->view('vadmin/index', $data);
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $where = "shf_id = $id";
        $data['shift'] = $this->shift_model->get_shift($where);
        $updated_at = date('Y-m-d H:i:s');

        if (isset($_POST['simpan'])) {
            $data = [
                'shf_deskripsi' => $this->input->post('des_shift', TRUE),
                'pesan ' => $this->input->post('pesan', TRUE),
                'updated_at' => $updated_at
            ];

            $this->shift_model->update($data, $id);
            $this->session->set_flashdata('success', 'Shift berhasil diperbarui.');
            redirect('shift');
        } else {
            $data['title'] = 'Edit Shift - eLaporan';
            $data['form_title'] = 'Edit Shift';
            $data['content'] = 'vadmin/shift_edit_form';
            $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            $this->load->view('vadmin/index', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->shift_model->delete($id);
        $this->session->set_flashdata('success', 'Shift Kerja berhasil dihapus.');
        redirect('shift');
    }
}
