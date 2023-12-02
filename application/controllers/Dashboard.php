<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->auth->restrict();
    }

    public function index()
    {
        //User
        $data['user'] = count($this->dashboard_model->get_user());
        $data['name'] = 'Yantok';
        //unit
        // $data['unit'] = count($this->dashboard_model->get_unit());
        
        //laporan
        // $data['laporan'] = count($this->dashboard_model->get_laporan());
        $data['spd'] = $this->dashboard_model->get_spd(null, true);
        $data['cuti'] = $this->dashboard_model->get_cuti(null, true);
        $data['get_total_user'] = $this->dashboard_model->get_total_user();
        $data['get_total_shift'] = $this->dashboard_model->get_total_shift();
        $data['get_total_spd'] = $this->dashboard_model->get_total_spd();
        $data['total_cuti'] = $this->dashboard_model->total_cuti();
        $grafik_spd = $this->dashboard_model->get_grafik_spd();
        $grafik_cuti = $this->dashboard_model->get_grafik_cuti();

        $spd_label = [];
        $spd_total = [];
        foreach($grafik_spd as $row){
            $spd_label[]=$row['bulan'];
            $spd_total[]=$row['total'];
        }

        $cuti_label=[];
        $cuti_total=[];
        foreach($grafik_cuti as $cuti){
            $cuti_label[]=$cuti['bulan'];
            $cuti_total[]=$cuti['total'];
        }

        $data['cuti_label'] = json_encode($cuti_label) ;
        $data['cuti_total'] = json_encode($cuti_total) ;

        $data['spd_label'] = json_encode($spd_label) ;
        $data['spd_total'] = json_encode($spd_total);

        // $this->output->set_content_type('application/json');
        // $this->output->set_output(json_encode($data['spd_label']));
        
        if ($this->session->userdata('usr_level') === 'Admin') {
            $data['title'] = 'Dashboard - ELaporan';
            $data['content'] = 'vadmin/home';
            $this->load->view('vadmin/index', $data);
        }  elseif ($this->session->userdata('usr_level') === 'User') {
            $data['title'] = 'Dashboard - ELaporan';
            $user_id = $this->session->userdata('usr_id');
            $data['total_user_spd'] = $this->dashboard_model->get_user_spd($user_id);
            $data['total_user_cuti'] = $this->dashboard_model->get_user_cuti($user_id);
            
            $data['content'] = 'vuser/home';
            $this->load->view('vuser/index', $data);
        }
    }
}
