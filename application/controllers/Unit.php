<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    private static $_table = 'unit';
    private static $_primaryKey = 'un_id';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('unit_model');
        $this->auth->restrict();
    }

    public function index()
    {
        $data['title'] = 'Unit Kerja - e-Schedule';

        $data['content'] = 'vadmin/unit';
        $this->load->view('vadmin/index', $data);
    }

    public function get_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $this->load->library('datatables_ssp');

            $columns = array(
                array('db' => 'un_id', 'dt' => 'un_id'),
                array('db' => 'un_nama', 'dt' => 'un_nama'),
                array(
                    'db' => 'un_id',
                    'dt' => 'action',
                    'formatter' => function ($id) {
                        return '<a href="' . site_url('unit/edit/' . $id) . '" class="btn btn-success btn-sm mb-1"><i class="fa fa-edit"></i>Edit</a>
                                <a onclick="deleteConfirm(' . "'" . site_url('unit/delete/' . $id) . "'" . ')" href="#!" class="btn btn-danger btn-sm mb-1"><i class="fa fa-trash"></i>Hapus</a>';
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

            $unit_kerja = $this->input->post('unit_kerja', TRUE);
            $created_at = date('Y-m-d H:i:s');

            $data = [
                'un_nama' => $unit_kerja,
                'created_at' => $created_at
            ];


            $this->unit_model->insert($data);
            $this->session->set_flashdata('success', 'Unit Kerja berhasil ditambahkan.');
            redirect('unit');
        } else {
            $data['title'] = 'Tambah Unit Kerja - e-Laporan';
            $data['form_title'] = 'Tambah Unit Kerja';
            $data['content'] = 'vadmin/unit_form';
            $this->load->view('vadmin/index', $data);
        }
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $where = "un_id = $id";
        $data['unit'] = $this->unit_model->get_unit($where);
        $updated_at = date('Y-m-d H:i:s');

        if (isset($_POST['simpan'])) {
            $data = [
                'un_nama' => $this->input->post('unit_kerja', TRUE),
                'updated_at' => $updated_at
            ];

            $this->unit_model->update($data, $id);
            $this->session->set_flashdata('success', 'Unit Kerja berhasil diperbarui.');
            redirect('unit');
        } else {
            $data['title'] = 'Edit Unit Kerja - eLaporan';
            $data['form_title'] = 'Edit Unit Kerja';
            $data['content'] = 'vadmin/unit_edit_form';
            $data['action'] = site_url(uri_string()); // Mengambil URL yang aktif
            $this->load->view('vadmin/index', $data);
        }
    }

    public function delete($id = NULL)
    {
        $this->unit_model->delete($id);
        $this->session->set_flashdata('success', 'Unit Kerja berhasil dihapus.');
        redirect('unit');
    }
}
