<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model
{
	
	private static $_table = 'jadwal';
    private static $_pk = 'jwl_id';
	

	public function get_jadwal()
	{
		$tglhariini=date('Y/m/d');
		$tglhari=date('Y/m/d',strtotime("+3 day"));
		$query = $this->db
			
			->select('jadwal.id_user as id_user, user.usr_nama as usr_nama, user.unit as unit,shift.shf_deskripsi as shf_deskripsi, shift.jam as jam, jadwal.tgl_jadwal as tgl_jadwal')
			->from(self::$_table)
			->join('user', 'user.usr_id = jadwal.id_user', 'inner')
			->join('shift', 'shift.shf_id = jadwal.id_shift', 'inner')
			->where('tgl_jadwal BETWEEN"'. $tglhariini. '" and "'.$tglhari.'"')
			->order_by('tgl_jadwal', 'ASC')
			->get();
			if ($query) {
				return $query->result_array();
			} else {
				return false;
			}
	}

	
	
 
	public function get_jadwal_detail()
	{
		// return $this->db->get('jadwal')->result_array();
		$query = $this->db
			->select('jadwal.id_user as id_user, user.usr_nama as usr_nama')
			->from(self::$_table)
			->join('user', 'user.usr_id = jadwal.id_user', 'inner')
			->join('shift', 'shift.shf_id = jadwal.id_shift', 'inner')
			->group_by('jadwal.id_user')
			->get();

	if ($query->num_rows() > 0) {
		return $query->result_array();
	} else {
		return NULL;
	}
	}

	public function insert($data)
	{
		return $this->db->insert(self::$_table, $data);
	}

	public function update($data, $id)
	{
		return $this->db->set($data)->where(self::$_pk, $id)->update(self::$_table);
	}

	public function delete($id)
	{
		return $this->db->delete(self::$_table, array('un_id' => $id));
	}
}