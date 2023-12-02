<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{

	private static $_table = 'laporan';

	public function get_program()
	{
		return $this->db->get('program')->result_array();
	}

	public function get_kegiatan()
	{
		return $this->db->get('kegiatan')->result_array();
	}

	public function get_subkegiatan()
	{
		return $this->db->get('subkegiatan')->result_array();
	}

	public function get_laporan()
	{
		return $this->db->get('laporan')->result_array();
	}

	// public function get_unit()
	// {
	// 	return $this->db->get('unit')->result_array();
	// }

	public function get_user()
	{
		return $this->db->get('user')->result_array();
	}

	public function get_spd($bulan=null,$from_dashboard=false){
		if($bulan){
			$start = date("Y-m-1", strtotime("2023-$bulan-01"));
			$end = date("Y-m-t", strtotime("2023-$bulan-01"));
			$this->db->where("tanggal >=", $start);
			$this->db->where("tanggal <=", $end);
			
		}
		if($from_dashboard){
			$start = date("Y-m-1");
			$end = date("Y-m-t");
			$this->db->where("tanggal >=", $start);
			$this->db->where("tanggal <=", $end);
		}
		$this->db->select('spd.*, user_penerima.usr_nama as spd_penerima, user_pemberi.usr_nama as spd_pemberi');
		$this->db->from('spd');
		$this->db->join('user as user_penerima', 'user_penerima.usr_id = spd.penerima');
		$this->db->join('user as user_pemberi', 'user_pemberi.usr_id = spd.pemberi');
		$query = $this->db->get();

		$result = $query->result();
		return $result;
	}
	public function get_cuti($bulan=null,$from_dashboard=false){
		if($bulan){
			$start = date("Y-m-1", strtotime("2023-$bulan-01"));
			$end = date("Y-m-t", strtotime("2023-$bulan-01"));
			$this->db->where("tgl_akhir >=", $start);
			$this->db->where("tgl_akhir <=", $end);
		}
		if($from_dashboard){
			$start = date("Y-m-1");
			$end = date("Y-m-t");
			$this->db->where("tgl_akhir >=", $start);
			$this->db->where("tgl_akhir <=", $end);
		}
		$this->db->select('cuti.*, user.usr_nama as user_cuti');
		$this->db->from('cuti');
		$this->db->join('user', 'user.usr_id = cuti.id_user');
		$query = $this->db->get();

		$result = $query->result();
		return $result;
	}

	public function total_cuti(){
		$this->db->select('*');
		$this->db->from('cuti');
		$total_rows = $this->db->count_all_results();

		return $total_rows;
	}

	public function get_total_user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('usr_level', 'User');
		
		$total_rows = $this->db->count_all_results();
		return $total_rows;
	}

	
	public function get_total_shift()
	{
		$this->db->select('*');
		$this->db->from('shift');
		$total_rows = $this->db->count_all_results();
		return $total_rows;
	}
	public function get_total_spd()
	{
		$this->db->select('*');
		$this->db->from('spd');
		$total_rows = $this->db->count_all_results();
		return $total_rows;
	}
	public function get_grafik_spd()
	{
		$query = $this->db->select('MONTHNAME(tanggal) AS bulan, COUNT(*) AS total')
                  ->from('spd')
                  ->group_by('MONTHNAME(tanggal)')
				  ->order_by('MONTH(tanggal)')
                  ->get();

		$result = $query->result_array();
		return $result;
	}
	public function get_grafik_cuti()
	{
		$query = $this->db->select('MONTHNAME(tgl_awal) AS bulan, COUNT(*) AS total')
                  ->from('cuti')
                  ->group_by('MONTHNAME(tgl_awal)')
				  ->order_by('MONTH(tgl_awal)')
                  ->get();

		$result = $query->result_array();
		return $result;
	}
	public function get_user_spd($user_id)
	{
		$this->db->select('*');
		$this->db->where('penerima',$user_id);
		$this->db->from('spd');
		$total_rows = $this->db->count_all_results();
		return $total_rows;
	}
	public function get_user_cuti($user_id)
	{
		$this->db->select('*');
		$this->db->where('id_user',$user_id);
		$this->db->from('cuti');
		$total_rows = $this->db->count_all_results();
		return $total_rows;
	}

	



	// public function masuk($mas)
	// {
	// 	return $this->db->where($mas)->get(self::$_table)->result();
	// }

	// public function keluar($kel)
	// {
	// 	return $this->db->where($kel)->get(self::$_table)->result();
	// }
}	
